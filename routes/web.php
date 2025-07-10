<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\ClientAuthController;
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



// Client Auth
// Route::prefix('client')->group(function () {
//     Route::get('login', [ClientAuthController::class, 'showLoginForm'])->name('client.login');
//     Route::post('login', [ClientAuthController::class, 'login']);
//     Route::get('register', [ClientAuthController::class, 'showRegisterForm'])->name('client.register');
//     Route::post('register', [ClientAuthController::class, 'register']);
// });

// Admin Auth
// Route::prefix('admin')->group(function () {
//     Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('login', [AdminAuthController::class, 'login']);
//     Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
//     Route::post('register', [AdminAuthController::class, 'register']);
// });
