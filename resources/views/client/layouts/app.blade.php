<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TickTock Shop')</title>
    <link rel="stylesheet" href="{{ asset('css/client/products.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('storage/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/client/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/client/cart.css') }}">

</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('storage/logo2.png') }}" alt="logoShop">
        </div>

        <div class="header_menu">
            <li> <a href="#">THƯƠNG HIỆU</a>
                <ul class="sub_TH">
                    <li><a href="#">Casio</a></li>
                    <li><a href="#">Rolex</a></li>
                    <li><a href="#">Citizen</a></li>
                    <li><a href="#">Rado</a></li>
                    <li><a href="#">Seiko</a></li>
                </ul>
            </li>
            <li><a href="#">NỮ</a>
                <ul class="sub_Nu">
                    <li><a href="{{ route('products.filter', ['category' => 'nu', 'brand' => 'casio']) }}">Casio nữ</a></li>
                    <li><a href="{{ route('products.filter', ['category' => 'nu', 'brand' => 'rolex']) }}">Rolex nữ</a></li>
                    <li><a href="{{ route('products.filter', ['category' => 'nu', 'brand' => 'rado']) }}">Rado nữ</a></li>
                    <li><a href="{{ route('products.filter', ['category' => 'nu', 'brand' => 'citizen']) }}">Citizen nữ</a></li>
                    <li><a href="{{ route('products.filter', ['category' => 'nu', 'brand' => 'seiko']) }}">Seiko nữ</a></li>
                </ul>
            </li>
            <li> <a href="#">NAM</a> 
                <ul class="sub_Nam">
                    <li><a href="#">Casio nam</a></li>
                    <li><a href="#">Rolex nam</a></li>
                    <li><a href="#">Citizen nam</a></li>
                    <li><a href="#">Rado nam</a></li>
                    <li><a href="#">Seiko nam</a></li>
                </ul>
            </li>
            <li> <a href="#">CẶP ĐÔI</a>
                <ul class="sub_Doi">
                    <li><a href="#">Casio cặp</a></li>
                    <li><a href="#">Rolex cặp</a></li>
                    <li><a href="#">Citizen cặp</a></li>
                    <li><a href="#">Rado cặp</a></li>
                    <li><a href="#">Seiko cặp</a></li>
                </ul>
            </li>
            <li> <a href="#">PHỤ KIỆN</a> </li>
            <li> <a href="#">THÔNG TIN</a> </li>
        </div>

        <div class="header_other">
            <li> 
                <input placeholder="Tìm kiếm" type="text"> 
                <i class="fas fa-search"></i>
                <div class="search-history">
                    <h3 class="search-heading">Lịch sử tìm kiếm</h3>
                    <ul class="search-history-list">
                        <li class="item"> <a href="#">Casio</a> </li>
                        <li class="item"> <a href="#">Rolex</a> </li>
                    </ul>
                </div>
            </li>
            <li> <a class="fa fa-user" href="#"></a> </li>
            <li> <a class="fa fa-shopping-bag" href="#"></a></li>
        </div>
    </header>
    <!-- <section id="slide">
        <div class="aspect-ratio-169">
            <img src="{{ asset('storage/slide1.jpg')}}" alt="">
            <img src="{{ asset('storage/slide2.jpg')}}" alt="">
            <img src="{{ asset('storage/slide3.png')}}" alt="">
            <img src="{{ asset('storage/slide4.png')}}" alt="">
            <img src="{{ asset('storage/slide5.jpg')}}" alt="">

        </div>
        <div class="dot-slide">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>
            <div class="dot"></div>


        </div>
    </section> -->

    <main style="margin-top: 100px">
        @yield('content')
    </main>

    <section class="footer">
        <div class="footer-container">
            <p>Tải ứng dụng TickTock_Shop</p>
            <div class="app-google">
                <a href="#"><img src="{{ asset('storage/appstore.png') }}" alt="App Store"></a>
                <a href="#"><img src="{{ asset('storage/googleplay.png') }}" alt="Google Play"></a>
            </div>
            <p>Nhận bản tin TickTock_Shop</p>
            <div class="input-email">
                <input type="text" placeholder="Nhập email của bạn">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="footer-items">
                <li><a href="#"><img src="{{ asset('client/image/dathongbao.png') }}" alt=""></a></li>
                <li><a href="#">Liên hệ</a></li>
                <li><a href="#">Tuyển dụng</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
            </div>
            <div class="footer-text">
                Công ty Cổ phần Dự Kim với số đăng ký kinh doanh: 0105777650 <br>
                Địa chỉ đăng ký: Tổ dân phố Tháp, P.Đại Mỗ, Q.Nam Tứ Liêm, TP.Hà Nội, Việt Nam - 0243 205 2222 <br>
                Đặt hàng online: <b>0246 662 3434</b>
            </div>
            <div class="footer-bottom">
                © TickTock_Shop All rights reserved
            </div>
        </div>
    </section>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/client/home.js') }}"></script>
</body>
</html>
