<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ClientAuthController;
use App\Http\Controllers\AdminAuthController;


// Route::get('/', function () {
//     // return view('client.home');
//     return view('admin.dashboard');
//     //return view('admin.auth.dashboard');
// });

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





// Route::post('/client/login', [ClientAuthController::class, 'login'])->name('client.login');
Route::post('/client/register', [ClientAuthController::class, 'register'])->name('client.register');



    //User routes
Route::get('/login', [ClientAuthController::class, 'showLoginForm'])->name('client.login');
Route::post('/login', [ClientAuthController::class, 'login']);

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('client.home'); // hoặc dashboard riêng nếu có
    })->name('client.home');
});



// Admin routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');



