@extends('admin.layout')

@section('title', 'Chỉnh sửa API')

@section('content')
    <div class="page-header">
        <h1>✏️ Chỉnh sửa API</h1>
        <a href="{{ route('admin.apis.index') }}" class="btn btn-secondary">
            <span>←</span> Quay lại
        </a>
    </div>

    <div class="card" style="max-width: 600px;">
        <div class="card-header">
            <h3>Thông tin API</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.apis.update', $api) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Link API</label>
                    <div style="display: flex; gap: 10px; align-items: center;">
                        <input type="text" class="form-control" value="{{ $api->api_link }}" id="api-link" readonly
                            style="background: var(--dark); flex: 1;">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="copyLink()">📋 Copy</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="name">Tên *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $api->name) }}"
                        required>
                    @error('name')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="testflight_link">Link TESTFLIGHT</label>
                    <input type="url" name="testflight_link" id="testflight_link" class="form-control"
                        value="{{ old('testflight_link', $api->testflight_link) }}"
                        placeholder="https://testflight.apple.com/join/...">
                    @error('testflight_link')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">Ngày bắt đầu thuê</label>
                    <input type="date" name="start_date" id="start_date" class="form-control"
                        value="{{ old('start_date', $api->start_date ? $api->start_date->format('Y-m-d') : '') }}">
                    @error('start_date')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="expiry_datetime">Ngày Hết hạn</label>
                    <input type="date" name="expiry_datetime" id="expiry_datetime" class="form-control"
                        value="{{ old('expiry_datetime', $api->expiry_datetime ? $api->expiry_datetime->format('Y-m-d') : '') }}">
                    <small style="color: var(--muted);">Để trống nếu không giới hạn thời gian</small>
                    @error('expiry_datetime')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái *</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="open" {{ old('status', $api->status) === 'open' ? 'selected' : '' }}>🟢 Mở (Open)
                        </option>
                        <option value="close" {{ old('status', $api->status) === 'close' ? 'selected' : '' }}>🔴 Đóng (Close)
                        </option>
                    </select>
                    @error('status')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border);">
                    <button type="submit" class="btn btn-primary">
                        <span>💾</span> Cập nhật
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Info Card -->
    <div class="card" style="max-width: 600px; margin-top: 20px;">
        <div class="card-body" style="padding: 16px 24px;">
            <p style="margin: 0;">
                <strong>Ngày tạo:</strong> {{ $api->created_at->format('d/m/Y H:i') }}
                @if($api->remaining_days !== null)
                    <br>
                    <strong>Thời gian còn lại:</strong>
                    @if($api->remaining_days <= 0)
                        <span style="color: var(--danger);">Đã hết hạn</span>
                    @else
                        <span style="color: {{ $api->remaining_days <= 7 ? 'var(--warning)' : 'var(--success)' }};">
                            {{ $api->remaining_days }} ngày
                        </span>
                    @endif
                @endif
            </p>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function copyLink() {
            const input = document.getElementById('api-link');
            input.select();
            document.execCommand('copy');
            alert('Đã copy: ' + input.value);
        }
    </script>
@endpush