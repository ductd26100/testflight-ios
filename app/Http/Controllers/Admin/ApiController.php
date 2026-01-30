<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Api;
use App\Exports\ApisExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Check if it's an AJAX request for DataTable
        if ($request->ajax()) {
            $filter = $request->input('filter', 'all');
            $query = Api::query();

            $today = now()->startOfDay();

            switch ($filter) {
                case 'added_today':
                    $query->whereDate('created_at', $today->toDateString());
                    break;
                case 'active':
                    // Đang hoạt động: status = open VÀ (không có expiry HOẶC expiry >= today)
                    $query->where('status', 'open')
                        ->where(function ($q) use ($today) {
                            $q->whereNull('expiry_datetime')
                                ->orWhereDate('expiry_datetime', '>=', $today->toDateString());
                        });
                    break;
                case 'expiring_today':
                    // Hết hạn hôm nay: expiry_datetime = today
                    $query->whereNotNull('expiry_datetime')
                        ->whereDate('expiry_datetime', $today->toDateString());
                    break;
                case 'expiring_2days':
                    // Còn 2 ngày: expiry_datetime = tomorrow hoặc ngày sau (trong 1-2 ngày tới)
                    $query->whereNotNull('expiry_datetime')
                        ->whereDate('expiry_datetime', '>', $today->toDateString())
                        ->whereDate('expiry_datetime', '<=', $today->copy()->addDays(2)->toDateString());
                    break;
                case 'expired':
                    // Đã hết hạn: expiry_datetime < today
                    $query->whereNotNull('expiry_datetime')
                        ->whereDate('expiry_datetime', '<', $today->toDateString());
                    break;
            }

            $apis = $query->orderBy('created_at', 'desc')->get();
            return response()->json(['data' => $apis]);
        }

        return view('admin.apis.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.apis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'testflight_link' => 'nullable|url|max:500',
            'start_date' => 'nullable|date',
            'expiry_datetime' => 'nullable|date',
            'status' => 'required|in:open,close',
        ]);

        // Nếu không nhập ngày hết hạn, tự động = ngày bắt đầu + 30 ngày
        if (empty($validated['expiry_datetime']) && !empty($validated['start_date'])) {
            $validated['expiry_datetime'] = \Carbon\Carbon::parse($validated['start_date'])->addDays(30);
        } elseif (empty($validated['expiry_datetime']) && empty($validated['start_date'])) {
            // Nếu cả 2 đều trống, lấy hôm nay + 30 ngày
            $validated['expiry_datetime'] = now()->addDays(30);
        }

        $api = Api::create($validated);

        return redirect()->route('admin.apis.index')
            ->with('success', 'API đã được tạo thành công! ID: ' . $api->api_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Api $api)
    {
        return view('admin.apis.show', compact('api'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Api $api)
    {
        return view('admin.apis.edit', compact('api'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Api $api)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'testflight_link' => 'nullable|url|max:500',
            'start_date' => 'nullable|date',
            'expiry_datetime' => 'nullable|date',
            'status' => 'required|in:open,close',
        ]);

        // Nếu chuyển status từ open sang close, set expiry_datetime = yesterday
        if ($api->status === 'open' && $validated['status'] === 'close') {
            $validated['expiry_datetime'] = now()->subDay();
        }

        $api->update($validated);

        return redirect()->route('admin.apis.index')
            ->with('success', 'API đã được cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Api $api)
    {
        $api->delete();

        return response()->json(['success' => true, 'message' => 'API đã được xóa!']);
    }

    /**
     * Toggle API status
     */
    public function toggleStatus(Api $api)
    {
        $api->status = $api->status === 'open' ? 'close' : 'open';

        // Nếu đóng, set expiry_datetime = yesterday
        if ($api->status === 'close') {
            $api->expiry_datetime = now()->subDay();
        }

        $api->save();

        return response()->json([
            'success' => true,
            'status' => $api->status,
            'message' => 'Trạng thái đã được cập nhật!'
        ]);
    }

    public function renewApi(Api $api)
    {
        $remainingDays = $api->remaining_days;

        if ($remainingDays !== null && $remainingDays > 0) {
            // Còn hạn: cộng thêm 30 ngày từ ngày hết hạn hiện tại
            $api->expiry_datetime = $api->expiry_datetime->addDays(30);
        } else {
            // Hết hạn hoặc không có ngày hết hạn: tính từ ngày hiện tại + 30 ngày
            $api->expiry_datetime = now()->addDays(30);
        }

        $api->status = 'open'; // Mở lại nếu đang đóng
        $api->save();

        return response()->json([
            'success' => true,
            'new_expiry' => $api->expiry_datetime->format('d/m/Y H:i'),
            'message' => 'Đã gia hạn thêm 30 ngày!'
        ]);
    }

    /**
     * Export APIs to Excel
     */
    public function export()
    {
        $filename = 'apis_export_' . now()->format('Y-m-d') . '.xlsx';
        return Excel::download(new ApisExport(), $filename);
    }
}
