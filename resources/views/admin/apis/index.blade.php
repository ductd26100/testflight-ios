@extends('admin.layout')

@section('title', 'Quản lý Link')

@section('content')
    <div class="page-header">
        <h1>🔗 Quản lý Link</h1>
        <a href="{{ route('admin.apis.create') }}" class="btn btn-primary">
            <span>➕</span> Thêm Link mới
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h3>Danh sách Link</h3>
        </div>
        <div class="card-body">
            <!-- Filter Tabs -->
            <div class="filter-tabs" style="margin-bottom: 20px; display: flex; gap: 10px; flex-wrap: wrap;">
                <button class="btn btn-filter active" data-filter="all">📋 Tất cả</button>
                <button class="btn btn-filter" data-filter="active">✅ Đang hoạt động</button>
                <button class="btn btn-filter" data-filter="added_today">🆕 Thêm hôm nay</button>
                <button class="btn btn-filter" data-filter="expiring_2days">🟡 Còn 2 ngày</button>
                <button class="btn btn-filter" data-filter="expiring_today">🟠 Hết hạn hôm nay</button>
                <button class="btn btn-filter" data-filter="expired">🔴 Đã hết hạn</button>
            </div>
            <table id="apisTable" class="display responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Link TESTFLIGHT</th>
                        <th>Link API</th>
                        <th>Ngày bắt đầu thuê</th>
                        <th>Ngày Hết hạn</th>
                        <th>Trạng thái</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div id="deleteModal"
        style="display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.7); z-index: 1000; align-items: center; justify-content: center;">
        <div style="background: var(--card-bg); padding: 30px; border-radius: 12px; max-width: 400px; text-align: center;">
            <p style="font-size: 18px; margin-bottom: 20px;">Bạn có chắc muốn xóa Link này?</p>
            <div style="display: flex; gap: 10px; justify-content: center;">
                <button onclick="closeDeleteModal()" class="btn btn-secondary">Hủy</button>
                <button onclick="confirmDelete()" class="btn btn-danger">Xóa</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        let deleteApiId = null;
        const baseUrl = '{{ url('/') }}';
        let currentFilter = 'all';
        let apisTable;

        $(document).ready(function () {
            apisTable = $('#apisTable').DataTable({
                ajax: {
                    url: '{{ route("admin.apis.index") }}',
                    type: 'GET',
                    data: function (d) {
                        d.filter = currentFilter;
                    },
                    dataSrc: 'data',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                },
                columns: [
                    { data: 'name' },
                    {
                        data: 'testflight_link',
                        render: function (data) {
                            if (data) {
                                return '<a href="' + data + '" target="_blank" style="color: var(--primary); word-break: break-all;">' + data + '</a>';
                            }
                            return '<span style="color: var(--muted);">-</span>';
                        }
                    },
                    {
                        data: 'id',
                        render: function (data) {
                            const link = baseUrl + '/api/' + data;
                            return '<a href="' + link + '" target="_blank" style="color: var(--success);">/api/' + data + '</a>';
                        }
                    },
                    {
                        data: 'start_date',
                        render: function (data) {
                            if (!data) return '<span style="color: var(--muted);">-</span>';
                            const date = new Date(data);
                            return date.toLocaleDateString('vi-VN', { day: '2-digit', month: '2-digit', year: 'numeric' });
                        }
                    },
                    {
                        data: 'expiry_datetime',
                        render: function (data) {
                            if (!data) {
                                return '<span style="color: var(--success);">∞</span>';
                            }
                            const expiry = new Date(data);
                            const now = new Date();
                            now.setHours(0, 0, 0, 0);
                            expiry.setHours(0, 0, 0, 0);
                            const diffDays = Math.ceil((expiry - now) / (1000 * 60 * 60 * 24));

                            let color = 'var(--success)';
                            let daysText = '';

                            if (diffDays < 0) {
                                color = 'var(--danger)';
                                daysText = ' (Đã hết hạn)';
                            } else if (diffDays === 0) {
                                color = 'var(--warning)';
                                daysText = ' (Hết hạn hôm nay)';
                            } else if (diffDays === 1) {
                                color = 'var(--warning)';
                                daysText = ' (Còn 1 ngày)';
                            } else if (diffDays <= 7) {
                                color = 'var(--warning)';
                                daysText = ' (Còn ' + diffDays + ' ngày)';
                            } else {
                                daysText = ' (Còn ' + diffDays + ' ngày)';
                            }

                            const dateStr = new Date(data).toLocaleDateString('vi-VN', {
                                day: '2-digit',
                                month: '2-digit',
                                year: 'numeric'
                            });
                            return '<span style="color: ' + color + ';">' + dateStr + daysText + '</span>';
                        }
                    }, {
                        data: 'status', render: function (data, type, row) {
                            const
                                checked = data === 'open' ? 'checked' : ''; return ` <label class="toggle-switch">
                                                    <input type="checkbox" ${checked} onchange="toggleStatus(${row.id})">
                                                    <span class="toggle-slider"></span>
                                                    </label>
                                                    `;
                        }
                    },
                    {
                        data: 'id',
                        render: function (data, type, row) {
                            let deleteBtn = row.status === 'close'
                                ? `<button onclick="deleteApi(${data})" class="btn btn-danger btn-sm" title="Xóa">🗑️</button>`
                                : '';
                            return `
                                                    <div class="actions">
                                                        <button onclick="renewApi(${data})" class="btn btn-success btn-sm" title="Gia hạn 30 ngày">🔄</button>
                                                        <a href="/admin/apis/${data}/edit" class="btn btn-primary btn-sm" title="Sửa">✏️</a>
                                                        ${deleteBtn}
                                                    </div>
                                                    `;
                        }
                    }
                ],
                order: [[0, 'asc']],
                responsive: true,
                language: {
                    search: "Tìm kiếm:",
                    lengthMenu: "Hiển thị _MENU_ mục",
                    info: "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
                    paginate: {
                        first: "Đầu",
                        last: "Cuối",
                        next: "→",
                        previous: "←"
                    },
                    emptyTable: "Không có dữ liệu",
                    zeroRecords: "Không tìm thấy kết quả"
                }
            });

            // Filter button click handler
            $('.btn-filter').on('click', function () {
                $('.btn-filter').removeClass('active');
                $(this).addClass('active');
                currentFilter = $(this).data('filter');
                apisTable.ajax.reload();
            });
        });

        function toggleStatus(id) {
            $.post('/admin/apis/' + id + '/toggle-status', function (response) {
                if (response.success) {
                    showNotification(response.message, 'success');
                }
            }).fail(function () {
                showNotification('Có lỗi xảy ra!', 'error');
                $('#apisTable').DataTable().ajax.reload();
            });
        }

        function deleteApi(id) {
            deleteApiId = id;
            document.getElementById('deleteModal').style.display = 'flex';
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').style.display = 'none';
            deleteApiId = null;
        }

        function confirmDelete() {
            if (deleteApiId) {
                $.ajax({
                    url: '/admin/apis/' + deleteApiId,
                    type: 'DELETE',
                    success: function (response) {
                        closeDeleteModal();
                        showNotification(response.message, 'success');
                        $('#apisTable').DataTable().ajax.reload();
                    },
                    error: function () {
                        showNotification('Có lỗi xảy ra!', 'error');
                    }
                });
            }
        }

        function showNotification(message, type) {
            const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
            const icon = type === 'success' ? '✓' : '✕';
            const alert = $(`<div class="alert ${alertClass}"><span>${icon}</span> ${message}</div>`);

            $('.main-content').prepend(alert);

            setTimeout(function () {
                alert.fadeOut(300, function () { $(this).remove(); });
            }, 3000);
        }

        function renewApi(id) {
            if (confirm('Gia hạn link này thêm 30 ngày?')) {
                $.ajax({
                    url: '/admin/apis/' + id + '/renew',
                    type: 'POST',
                    success: function (response) {
                        if (response.success) {
                            showNotification(response.message + ' (Hết hạn: ' + response.new_expiry + ')', 'success');
                            $('#apisTable').DataTable().ajax.reload();
                        }
                    },
                    error: function () {
                        showNotification('Có lỗi xảy ra!', 'error');
                    }
                });
            }
        }
    </script>
@endpush