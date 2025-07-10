<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;


class ClientAuthController extends Controller
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

        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'user';

        if (Auth::attempt($credentials)) {
            return redirect()-> route('client.home'); // tốt hơn nếu redirect về nơi người dùng đang cố truy cập
        }

        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng',
        ]);
    }


}

