<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginAuthController;
use App\Http\Controllers\ProductController;




Route::get('/', function () { 
    if (auth()->check()) {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif (auth()->user()->role === 'user') {
            return redirect()->route('client.home');
        }
    }

    return view('client.home'); // fallback nếu chưa login
    })->name('home');
    
Route::get('/products', [ProductController::class, 'filterProducts'])->name('products.filter');
Route::get('/quick-view/{slug}', [ProductController::class, 'quickView']);


    //User routes
Route::get('/login', [LoginAuthController::class, 'showLoginForm'])->name('client.login');
Route::post('/login', [LoginAuthController::class, 'login'])->name('client.login');
Route::post('/client/register', [LoginAuthController::class, 'register'])->name('client.register');


Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard', function () {
        return view('client.home');
    })->name('client.home');
});

//Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

