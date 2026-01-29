<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Api;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_apis' => Api::count(),
            'open_apis' => Api::where('status', 'open')->count(),
            'closed_apis' => Api::where('status', 'close')->count(),
            'expiring_today' => Api::whereNotNull('expiry_datetime')
                ->whereDate('expiry_datetime', now()->toDateString())
                ->count(),
            'expiring_soon' => Api::where('status', 'open')
                ->whereNotNull('expiry_datetime')
                ->where('expiry_datetime', '<=', now()->addDays(3))
                ->where('expiry_datetime', '>', now())
                ->count(),
        ];

        // Link sắp hết hạn (còn dưới 3 ngày)
        $recent_apis = Api::where('status', 'open')
            ->whereNotNull('expiry_datetime')
            ->where('expiry_datetime', '>', now())
            ->where('expiry_datetime', '<=', now()->addDays(3))
            ->orderBy('expiry_datetime', 'asc')
            ->get();

        return view('admin.dashboard', compact('stats', 'recent_apis'));
    }
}
