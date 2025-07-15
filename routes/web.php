<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\AdminAuthController;

// ✅ Trang chủ chung (hiển thị cho cả người chưa login và user đã login)
Route::get('/', function () {
    return view('client.home'); // Trang landing hoặc home mặc định
});

// ✅ Đăng ký tài khoản người dùng
Route::post('/client/register', [ClientAuthController::class, 'register'])->name('client.register');

// ✅ Đăng nhập cho người dùng (user/customer)
Route::get('/login', [ClientAuthController::class, 'showLoginForm'])->name('client.login');
Route::post('/login', [ClientAuthController::class, 'login']);

// ✅ Route dành cho người dùng (sau khi đăng nhập)
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('client.home'); // hoặc dashboard riêng nếu có
    })->name('client.home');
});

// ✅ Đăng nhập cho admin
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// ✅ Route dành cho admin
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
