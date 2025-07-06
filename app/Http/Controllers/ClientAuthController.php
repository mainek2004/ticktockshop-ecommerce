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
        return view('client.auth.login');
    }

    public function showRegisterForm()
    {
        return view('client.auth.register');
    }




// public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');

//     if (Auth::attempt($credentials)) {
//         // Đăng nhập thành công
//         return redirect()->intended('/client/home'); // hoặc route dashboard
//     } else {
//         // Sai thông tin
//         return back()->withErrors([
//             'login' => 'Sai tên đăng nhập hoặc mật khẩu',
//         ])->withInput();
//     }
// }

}

