<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
