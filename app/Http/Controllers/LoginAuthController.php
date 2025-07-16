<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginAuthController extends Controller
{
    
    public function showLoginForm()
    {
        return view('client.auth.login'); // hiển thị form như ảnh
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password'); // KHÔNG thêm role

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'user') {
                return redirect()->route('client.home');
            } else {
                Auth::logout();
                return back()->with('error', 'Tài khoản không có quyền truy cập');
            }
        }
        return back()->with('error', 'Email hoặc mật khẩu không đúng');

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|regex:/@gmail\.com$/i|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ], [
        'email.regex' => 'Email phải có đuôi @gmail.com',
        'password.confirmed' => 'Xác nhận mật khẩu không khớp'
    ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with('register_error', true);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user', // gán role mặc định
        ]);

        Auth::login($user); // tự đăng nhập sau khi đăng ký

        return redirect()->route('client.home');
    }


}