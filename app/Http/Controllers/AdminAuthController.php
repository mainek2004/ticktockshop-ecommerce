<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class AdminAuthController extends Controller
{
        public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // ✅ Kiểm tra role ngay sau khi đăng nhập
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            Auth::logout(); // 🚫 Không phải admin thì buộc đăng xuất
            return redirect()->route('admin.login')->withErrors([
                'email' => 'Tài khoản không có quyền truy cập'
            ]);
        }
    }

    return back()->withErrors(['email' => 'Sai thông tin đăng nhập']);
}


}
