<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - TestFlight VIP</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #8b5cf6;
            --success: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --dark: #1e1e2e;
            --darker: #181825;
            --light: #cdd6f4;
            --muted: #6c7086;
            --card-bg: #313244;
            --border: #45475a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--darker);
            color: var(--light);
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            bottom: 0;
            width: 260px;
            background: var(--dark);
            border-right: 1px solid var(--border);
            padding: 20px 0;
            z-index: 100;
        }

        .sidebar-header {
            padding: 0 20px 20px;
            border-bottom: 1px solid var(--border);
            margin-bottom: 20px;
        }

        .sidebar-header h2 {
            color: var(--primary);
            font-size: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-nav {
            list-style: none;
        }

        .sidebar-nav li a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            color: var(--light);
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }

        .sidebar-nav li a:hover,
        .sidebar-nav li a.active {
            background: rgba(99, 102, 241, 0.1);
            border-left-color: var(--primary);
            color: var(--primary);
        }

        .sidebar-nav li a .icon {
            font-size: 18px;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 30px;
            min-height: 100vh;
        }

        /* Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .page-header h1 {
            font-size: 28px;
            font-weight: 600;
        }

        /* Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 24px;
            border: 1px solid var(--border);
        }

        .stat-card .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .stat-card .stat-icon.primary {
            background: rgba(99, 102, 241, 0.2);
        }

        .stat-card .stat-icon.success {
            background: rgba(16, 185, 129, 0.2);
        }

        .stat-card .stat-icon.danger {
            background: rgba(239, 68, 68, 0.2);
        }

        .stat-card .stat-icon.warning {
            background: rgba(245, 158, 11, 0.2);
        }

        .stat-card .stat-value {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .stat-card .stat-label {
            color: var(--muted);
            font-size: 14px;
        }

        /* Card */
        .card {
            background: var(--card-bg);
            border-radius: 12px;
            border: 1px solid var(--border);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 24px;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header h3 {
            font-size: 18px;
            font-weight: 600;
        }

        .card-body {
            padding: 24px;
        }

        /* Buttons */
        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
        }

        .btn-success {
            background: var(--success);
            color: white;
        }

        .btn-danger {
            background: var(--danger);
            color: white;
        }

        .btn-warning {
            background: var(--warning);
            color: white;
        }

        .btn-secondary {
            background: var(--border);
            color: var(--light);
        }

        .btn-sm {
            padding: 6px 12px;
            font-size: 12px;
        }

        /* Forms */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: var(--light);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            background: var(--darker);
            border: 1px solid var(--border);
            border-radius: 8px;
            color: var(--light);
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.2);
        }

        select.form-control {
            cursor: pointer;
        }

        /* DataTable Styling */
        .dataTables_wrapper {
            color: var(--light);
        }

        table.dataTable {
            border-collapse: collapse !important;
        }

        table.dataTable thead th {
            background: var(--darker);
            color: var(--light);
            border-bottom: 1px solid var(--border) !important;
            padding: 14px 16px !important;
            font-weight: 600;
        }

        table.dataTable tbody td {
            padding: 14px 16px !important;
            border-bottom: 1px solid var(--border) !important;
            background: var(--card-bg);
            color: var(--light);
        }

        table.dataTable tbody tr:hover td {
            background: rgba(99, 102, 241, 0.1) !important;
        }

        .dataTables_filter input,
        .dataTables_length select {
            background: var(--darker);
            border: 1px solid var(--border);
            color: var(--light);
            padding: 8px 12px;
            border-radius: 6px;
        }

        .dataTables_info,
        .dataTables_paginate {
            margin-top: 20px;
            color: var(--muted);
        }

        .dataTables_paginate .paginate_button {
            background: var(--card-bg) !important;
            border: 1px solid var(--border) !important;
            color: var(--light) !important;
            border-radius: 6px !important;
            margin: 0 2px !important;
        }

        .dataTables_paginate .paginate_button.current {
            background: var(--primary) !important;
            border-color: var(--primary) !important;
        }

        /* Status Badge */
        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-badge.open {
            background: rgba(16, 185, 129, 0.2);
            color: var(--success);
        }

        .status-badge.close {
            background: rgba(239, 68, 68, 0.2);
            color: var(--danger);
        }

        /* Alert */
        .alert {
            padding: 16px 20px;
            border-radius: 8px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background: rgba(16, 185, 129, 0.1);
            border: 1px solid rgba(16, 185, 129, 0.3);
            color: var(--success);
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: var(--danger);
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 8px;
        }

        /* Expiry colors */
        .expiry-danger {
            color: var(--danger);
        }

        .expiry-warning {
            color: var(--warning);
        }

        .expiry-success {
            color: var(--success);
        }

        /* Filter Buttons */
        .btn-filter {
            padding: 10px 18px;
            background: var(--card-bg);
            border: 1px solid var(--border);
            color: var(--light);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 14px;
        }

        .btn-filter:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        .btn-filter.active {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
        }

        /* Toggle Switch - iOS Style */
        .toggle-switch {
            position: relative;
            width: 70px;
            height: 34px;
            cursor: pointer;
            display: inline-block;
        }

        .toggle-switch input {
            display: none;
        }

        .toggle-slider {
            position: absolute;
            inset: 0;
            background: linear-gradient(145deg, #e0e0e0, #c5c5c5);
            border-radius: 34px;
            transition: 0.4s;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .toggle-slider:before {
            content: '';
            position: absolute;
            width: 28px;
            height: 28px;
            left: 3px;
            top: 3px;
            background: linear-gradient(145deg, #ffffff, #f0f0f0);
            border-radius: 50%;
            transition: 0.4s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .toggle-slider:after {
            content: 'OFF';
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 10px;
            font-weight: 700;
            color: #888;
            transition: 0.4s;
        }

        .toggle-switch input:checked+.toggle-slider {
            background: linear-gradient(145deg, #4cd964, #34c759);
        }

        .toggle-switch input:checked+.toggle-slider:before {
            transform: translateX(36px);
        }

        .toggle-switch input:checked+.toggle-slider:after {
            content: 'ON';
            left: 10px;
            right: auto;
            color: white;
        }

        .toggle-switch:hover .toggle-slider:before {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .main-content {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>

<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
            <h2>✦ TestFlight VIP</h2>
        </div>
        <ul class="sidebar-nav">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                    class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="icon">📊</span> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('admin.apis.index') }}"
                    class="{{ request()->routeIs('admin.apis.*') ? 'active' : '' }}">
                    <span class="icon">🔗</span> Quản lý Link
                </a>
            </li>
            <li>
                <a href="/" target="_blank">
                    <span class="icon">🌐</span> Xem Website
                </a>
            </li>
            <li>
                <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit"
                        style="width: 100%; background: none; border: none; cursor: pointer; text-align: left; padding: 12px 20px; color: #ef4444; display: flex; align-items: center; gap: 12px; font-size: 15px; transition: all 0.3s;">
                        <span class="icon">🚪</span> Đăng xuất
                    </button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success">
                <span>✓</span> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <span>✕</span> {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

    <script>
        // CSRF Token for AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @stack('scripts')
</body>

</html>