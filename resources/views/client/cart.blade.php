@extends('client.layouts.app')

@section('title', 'Giỏ hàng - TickTock Shop')

@section('content')
<section class="cart">
    <div class="container">
        {{-- Tiến trình 3 bước (Cart → Địa chỉ → Thanh toán) --}}
        <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                    <i class="fa-solid fa-cart-shopping"></i>
                </div>
                <div class="cart-top-adress cart-top-item">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                    <i class="fa-solid fa-money-check-dollar"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="cart-content row">
            <div class="cart-content-left">
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <!-- <th>Màu</th> -->
                        <!-- <th>Size</th> -->
                        <th>SL</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>

                    @forelse($cartItems as $item)
                        <tr>
                            <td><img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}"></td>
                            <td><p>{{ $item->name }}</p></td>
                            <td><i class="fa-solid fa-square" style="color: {{ $item->color }}"></i></td>
                            <td><p>{{ $item->size }}</p></td>
                            <td>
                                <input type="number" value="{{ $item->quantity }}" min="1" data-id="{{ $item->id }}" class="cart-quantity-input">
                            </td>
                            <td><p>{{ number_format($item->price * $item->quantity, 0, ',', '.') }} <sub>đ</sub></p></td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="remove-btn">X</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="7">Giỏ hàng trống.</td></tr>
                    @endforelse
                </table>
            </div>

            {{-- Bên phải: Tóm tắt đơn hàng --}}
            <div class="cart-content-right">
                <table>
                    <tr>
                        <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                    </tr>
                    <tr>
                        <td>Tổng sản phẩm</td>
                        <td>{{ $cartItems->sum('quantity') }}</td>
                    </tr>
                    <tr>
                        <td>TỔNG TIỀN HÀNG</td>
                        <td><p>{{ number_format($cartTotal, 0, ',', '.') }} <sub>đ</sub></p></td>
                    </tr>
                    <tr>
                        <td>Tạm tính</td>
                        <td><p style="color: black; font-weight: bold;">{{ number_format($cartTotal, 0, ',', '.') }} <sub>đ</sub></p></td>
                    </tr>
                </table>

                <div class="cart-content-right-text">
                    <p>Bạn sẽ được miễn phí ship nếu tổng đơn hàng đủ điều kiện</p>
                    <p style="color: red; font-weight: bold;">
                        Mua thêm <span style="font-size: 18px;">
                            {{ number_format(max(0, 8900000 - $cartTotal), 0, ',', '.') }}
                        </span> để được miễn phí
                    </p>
                </div>

                <div class="cart-content-right-button">
                    <a href="{{ route('products.filter') }}"><button>Tiếp tục mua sắm</button></a>
                    <a href="{{ route('checkout.index') }}"><button>Thanh Toán</button></a>
                </div>

                <div class="cart-content-right-dangnhap">
                    @auth
                        <p>Tài khoản: {{ auth()->user()->name }}</p>
                        <p>Chào mừng bạn quay lại! Bạn sẽ được tích điểm thành viên.</p>
                    @else
                        <p>Hãy <a href="{{ route('login') }}"; style ="color: blue; font-weight: bold;" >Đăng nhập</a> để được tích điểm thành viên</p>
                    @endauth
                </div>
            </div>
        </div>

        @if(method_exists($cartItems, 'links'))
            <div class="pagination-wrapper">
                {{ $cartItems->links() }}
            </div>
        @endif
