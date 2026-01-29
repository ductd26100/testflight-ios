@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
    <div class="page-header">
        <h1>📊 Dashboard</h1>
        <a href="{{ route('admin.apis.create') }}" class="btn btn-primary">
            <span>➕</span> Thêm Link mới
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon primary">🔗</div>
            <div class="stat-value">{{ $stats['total_apis'] }}</div>
            <div class="stat-label">Tổng số Link</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon success">✓</div>
            <div class="stat-value">{{ $stats['open_apis'] }}</div>
            <div class="stat-label">Link đang hoạt động</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon danger">✕</div>
            <div class="stat-value">{{ $stats['closed_apis'] }}</div>
            <div class="stat-label">Link đã đóng</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: #ef4444;">📅</div>
            <div class="stat-value">{{ $stats['expiring_today'] }}</div>
            <div class="stat-label">Hết hạn hôm nay</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon warning">⏰</div>
            <div class="stat-value">{{ $stats['expiring_soon'] }}</div>
            <div class="stat-label">Sắp hết hạn (3 ngày)</div>
        </div>
    </div>

    <!-- Recent Links -->
    <div class="card">
        <div class="card-header">
            <h3>⚠️ Link sắp hết hạn (dưới 3 ngày)</h3>
            <a href="{{ route('admin.apis.index') }}" class="btn btn-secondary btn-sm">Xem tất cả</a>
        </div>
        <div class="card-body">
            @if($recent_apis->count() > 0)
                <table class="dataTable" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Link TESTFLIGHT</th>
                            <th>Trạng thái</th>
                            <th>Ngày thuê</th>
                            <th>Hết hạn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recent_apis as $api)
                            <tr>
                                <td>{{ $api->name }}</td>
                                <td>
                                    @if($api->testflight_link)
                                        <a href="{{ $api->testflight_link }}" target="_blank"
                                            style="color: var(--primary); word-break: break-all;">{{ $api->testflight_link }}</a>
                                    @else
                                        <span style="color: var(--muted);">-</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="status-badge {{ $api->status }}">
                                        {{ $api->status === 'open' ? 'Mở' : 'Đóng' }}
                                    </span>
                                </td>
                                <td>{{ $api->start_date ? $api->start_date->format('d/m/Y') : '-' }}</td>
                                <td>
                                    @if($api->expiry_datetime)
                                        @php
                                            $days = $api->remaining_days;
                                        @endphp
                                        <span
                                            class="{{ $days <= 0 ? 'expiry-danger' : ($days <= 7 ? 'expiry-warning' : 'expiry-success') }}">
                                            {{ $api->expiry_datetime->format('d/m/Y H:i') }}
                                            @if($days <= 0)
                                                (Đã hết hạn)
                                            @else
                                                (Còn {{ $days }} ngày)
                                            @endif
                                        </span>
                                    @else
                                        <span class="expiry-success">Không giới hạn</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p style="text-align: center; color: var(--muted); padding: 40px;">
                    Chưa có Link nào. <a href="{{ route('admin.apis.create') }}" style="color: var(--primary);">Tạo Link đầu
                        tiên</a>
                </p>
            @endif
        </div>
    </div>
@endsection