<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return response()->file(public_path('landing/index.html'));
});

// Contact form route
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// Check Link page
Route::get('/check-link', function () {
    return response()->file(public_path('check-link.html'));
});

// API kiểm tra link TestFlight
Route::post('/check-testflight', function (\Illuminate\Http\Request $request) {
    $link = $request->input('link');

    // Tìm API theo testflight_link
    $api = \App\Models\Api::where('testflight_link', $link)->first();

    if (!$api) {
        return response()->json([
            'success' => false,
            'found' => false,
            'message' => 'Link không tồn tại trong hệ thống'
        ]);
    }

    // Tính số ngày còn lại
    $remainingDays = $api->remaining_days;
    $isExpired = $api->isExpired();

    return response()->json([
        'success' => true,
        'found' => true,
        'data' => [
            'name' => $api->name,
            'start_date' => $api->start_date ? $api->start_date->format('d/m/Y') : 'Chưa có',
            'expiry_date' => $api->expiry_datetime ? $api->expiry_datetime->format('d/m/Y') : 'Không giới hạn',
            'remaining_days' => $remainingDays,
            'status' => $api->status,
            'is_expired' => $isExpired
        ],
        'message' => 'Tìm thấy link trong hệ thống!'
    ]);
});

// Route mặc định của Laravel (nếu cần)
Route::get('/welcome', function () {
    return view('welcome');
});

// Public API Route - Return API information as JSON
Route::get('/api/{id}', function ($id) {
    $api = \App\Models\Api::find($id);

    // Không tìm thấy API
    if (!$api) {
        return response()->json([
            'success' => false,
            'message' => 'API không tồn tại'
        ], 404);
    }

    // API đã đóng
    if ($api->status === 'close') {
        return response()->json([
            'success' => false,
            'message' => 'API đã bị đóng',
            'api_id' => $api->api_id
        ], 403);
    }

    // API đã hết hạn
    if ($api->isExpired()) {
        return response()->json([
            'success' => false,
            'message' => 'API đã hết hạn',
            'api_id' => $api->api_id,
            'expired_at' => $api->expiry_datetime->format('d/m/Y H:i')
        ], 403);
    }

    // Trả về thông tin API
    return response()->json([
        'success' => true,
        'data' => [
            'api_id' => $api->api_id,
            'name' => $api->name,
            'testflight_link' => $api->testflight_link,
            'status' => $api->status,
            'start_date' => $api->start_date ? $api->start_date->format('d/m/Y') : null,
            'expiry_datetime' => $api->expiry_datetime ? $api->expiry_datetime->format('d/m/Y H:i') : null,
            'remaining_days' => $api->remaining_days,
        ]
    ]);
})->name('api.info');

// Admin Routes
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ApiController;
use App\Http\Controllers\Admin\AuthController;

// Admin Auth Routes (no middleware)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin Protected Routes (with middleware)
Route::prefix('admin')->name('admin.')->middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // APIs Resource
    Route::resource('apis', ApiController::class);

    // Toggle API Status
    Route::post('apis/{api}/toggle-status', [ApiController::class, 'toggleStatus'])->name('apis.toggle-status');

    // Renew API (gia hạn 30 ngày)
    Route::post('apis/{api}/renew', [ApiController::class, 'renewApi'])->name('apis.renew');
});
