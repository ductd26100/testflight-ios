<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Simple hardcoded admin credentials
        // You can change these or use database later
        $adminUsername = 'admin';
        $adminPassword = 'admin123';

        if ($request->username === $adminUsername && $request->password === $adminPassword) {
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard')->with('success', 'Đăng nhập thành công!');
        }

        return back()->withErrors(['login' => 'Tên đăng nhập hoặc mật khẩu không đúng!']);
    }

    public function logout()
    {
        session()->forget('admin_logged_in');
        return redirect()->route('admin.login')->with('success', 'Đã đăng xuất!');
    }
}
