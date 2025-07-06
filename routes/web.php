<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//use App\Http\Controllers\ClientAuthController;
//use App\Http\Controllers\AdminAuthController;


Route::get('/', function () {
    return view('client.home');
});


//Route::get('/user', [UserController::class, 'index']);


// // Client Auth
// Route::prefix('client')->group(function () {
//     Route::get('login', [ClientAuthController::class, 'showLoginForm'])->name('client.login');
//     Route::post('login', [ClientAuthController::class, 'login']);
//     Route::get('register', [ClientAuthController::class, 'showRegisterForm'])->name('client.register');
//     Route::post('register', [ClientAuthController::class, 'register']);
// });

// // Admin Auth
// Route::prefix('admin')->group(function () {
//     Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
//     Route::post('login', [AdminAuthController::class, 'login']);
//     Route::get('register', [AdminAuthController::class, 'showRegisterForm'])->name('admin.register');
//     Route::post('register', [AdminAuthController::class, 'register']);
// });

// use App\Http\Controllers\ClientAuthController;

 Route::post('/client/login', [ClientAuthController::class, 'login'])->name('client.login');
 Route::post('/client/register', [ClientAuthController::class, 'register'])->name('client.register');

