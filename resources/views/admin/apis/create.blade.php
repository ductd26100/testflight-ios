@extends('admin.layout')

@section('title', 'Thêm API mới')

@section('content')
    <div class="page-header">
        <h1>➕ Thêm API mới</h1>
        <a href="{{ route('admin.apis.index') }}" class="btn btn-secondary">
            <span>←</span> Quay lại
        </a>
    </div>

    <div class="card" style="max-width: 600px;">
        <div class="card-header">
            <h3>Thông tin API</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.apis.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Tên *</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required
                        placeholder="Ví dụ: GunFree68">
                    @error('name')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="testflight_link">Link TESTFLIGHT</label>
                    <input type="url" name="testflight_link" id="testflight_link" class="form-control"
                        value="{{ old('testflight_link') }}" placeholder="https://testflight.apple.com/join/...">
                    @error('testflight_link')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="start_date">Ngày bắt đầu thuê</label>
                    <input type="date" name="start_date" id="start_date" class="form-control"
                        value="{{ old('start_date', date('Y-m-d')) }}">
                    @error('start_date')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="expiry_datetime">Ngày Hết hạn</label>
                    <input type="date" name="expiry_datetime" id="expiry_datetime" class="form-control"
                        value="{{ old('expiry_datetime') }}">
                    <small style="color: var(--muted);">Để trống nếu không giới hạn thời gian</small>
                    @error('expiry_datetime')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="status">Trạng thái *</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="open" {{ old('status', 'open') === 'open' ? 'selected' : '' }}>🟢 Mở (Open)</option>
                        <option value="close" {{ old('status') === 'close' ? 'selected' : '' }}>🔴 Đóng (Close)</option>
                    </select>
                    @error('status')
                        <small style="color: var(--danger);">{{ $message }}</small>
                    @enderror
                </div>

                <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid var(--border);">
                    <button type="submit" class="btn btn-primary">
                        <span>💾</span> Tạo API
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="card" style="max-width: 600px; margin-top: 20px;">
        <div class="card-body" style="padding: 16px 24px;">
            <p style="color: var(--muted); font-size: 14px;">
                💡 <strong>Lưu ý:</strong> Link API sẽ được tự động tạo theo ID sau khi lưu (ví dụ: /api/1, /api/2...)
            </p>
        </div>
    </div>
@endsection