<?php

use App\Http\Controllers\admin\AdminAuthController;
use App\Http\Controllers\client\ClientAuthController;
use App\Http\Controllers\client\ClientSearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client.home');
});

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.auth.login');

Route::get('/login', [ClientAuthController::class, 'showLoginForm'])->name('client.auth.login');
Route::post('/login', [ClientAuthController::class, 'login'])->name('login');
Route::post('logout', [ClientAuthController::class, 'logout'])->name('logout');

Route::get('/register', [ClientAuthController::class, 'showRegisterForm'])->name('client.auth.register');

Route::get('/forgot', [ClientAuthController::class, 'showForgotForm'])->name('client.auth.forgot');

Route::get('/reset', [ClientAuthController::class, 'showResetForm'])->name('client.auth.reset');

Route::get('/tim-kiem', [ClientSearchController::class, 'search'])->name('tim-kiem');

