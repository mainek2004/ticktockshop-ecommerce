<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginAuthController;


Route::get('/', function () { 
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->role === 'user') {
            return redirect()->route('client.home');
        }
    }

    return view('client.home'); // fallback nếu chưa login
});

    //User routes
Route::get('/login', [LoginAuthController::class, 'showLoginForm'])->name('client.login');
Route::post('/login', [LoginAuthController::class, 'login'])->name('client.login');
Route::post('/client/register', [LoginAuthController::class, 'register'])->name('client.register');


// ✅ Route dành cho người dùng (sau khi đăng nhập)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('client.home');
    })->name('client.home');
});

// ✅ Route dành cho admin
//Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// ✅ Đăng xuất (áp dụng chung cho cả user và admin)
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');
