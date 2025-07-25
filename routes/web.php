<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\WarrantyController;
use App\Http\Controllers\CartController;





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
Route::get('/accessories/quick-view/{type}/{id}', [AccessoriesController::class, 'quickView']);


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


Route::get('/products/filter', [ProductController::class, 'filterProducts'])->name('products.filter');


Route::get('/accessories/straps', [AccessoriesController::class, 'showStraps'])->name('accessories.straps');
Route::get('/accessories/boxes', [AccessoriesController::class, 'showBoxes'])->name('accessories.boxes');
Route::get('/accessories/glasses', [AccessoriesController::class, 'showGlasses'])->name('accessories.glasses');


// Trang bảo hành khách
Route::get('/warranty', [WarrantyController::class, 'showClient'])->name('warranty.form');

// Trang bảo hành admin
Route::get('/admin/warranty', [WarrantyController::class, 'showAdmin'])->middleware(['auth', 'role:admin'])->name('admin.warranty');

// Xử lý tra cứu từ form
Route::post('/warranty/lookup', [WarrantyController::class, 'lookup'])->name('warranty.lookup');

// Giỏ hàng
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::delete('/cart/remove/{key}', [CartController::class, 'remove'])->name('cart.remove');
// Xóa giỏ hàng 
Route::get('/cart/clear', function () {
    session()->forget('cart');
    return 'Đã xoá giỏ hàng';
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
// Lịch sử tìm kiếm
Route::get('/search', [ProductController::class, 'unifiedSearch'])->name('search.all');

