<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Giả sử lấy giỏ hàng từ session
       $cartItems = collect(session()->get('cart', []));

        $cartTotal = $cartItems->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('client.cart', compact('cartItems', 'cartTotal'));
    }
}