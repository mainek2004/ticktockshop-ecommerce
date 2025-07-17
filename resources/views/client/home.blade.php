<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TickTock_Shop</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/client/home.css') }}">

    @if (session('error'))
        <meta name="login-error" content="1">
    @endif
    @if (session('register_error'))
    <meta name="register-error" content="1">
    @endif


</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('storage/logo2.png')}}" alt="logoShop">
        </div>

        <div class="header_menu">
            <li> <a href="">THƯƠNG HIỆU</a>
                <ul class="sub_TH">
                    <li><a href="">Casio </a></li>
                    <li><a href="">Rolex </a></li>
                    <li><a href="">Citizen </a></li>
                    <li><a href="">Rado </a></li>
                    <li><a href="">Seiko </a></li>
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

            <li> <a href="">NAM</a> 
                <ul class="sub_Nam">
                    <li><a href="">Casio nam</a></li>
                    <li><a href="">Rolex nam</a></li>
                    <li><a href="">Citizen nam</a></li>
                    <li><a href="">Rado nam</a></li>
                    <li><a href="">Seiko nam</a></li>
                </ul>
            </li>
            <li> <a href="">CẶP ĐÔI</a>
                <ul class="sub_Doi">
                    <li><a href="">Casio cặp</a></li>
                    <li><a href="">Rolex cặp</a></li>
                    <li><a href="">Citizen cặp</a></li>
                    <li><a href="">Rado cặp</a></li>
                    <li><a href="">Seiko cặp</a></li>
                </ul>
            </li>
            <li> <a href="">PHỤ KIỆN</a> 
                <ul class="sub_pk">
                    <li><a href="">Dây đeo đồng hồ</a></li>
                    <li><a href="">Hộp đựng đồng hồ</a></li>
                    <li><a href="">Kính cường lực</a></li>

                </ul>
            </li>
            <li> <a href="">THÔNG TIN BẢO HÀNH</a> </li>
        </div>

        <div class="header_other">
            <li> <input placeholder="Tìm kiếm" type="text"> <i class="fas fa-search"></i>
                <div class="search-history">
                    <h3 class="search-heading">Lịch sử tìm kiếm</h3>
                    <ul class="search-history-list">
                        <li class="item"> <a href="">Casio</a> </li>
                        <li class="item"> <a href="">Rolex</a> </li>

                    </ul>
                </div>
            </li>
            
            <li class="header-user">
                    <i class="fa fa-user"></i>

                    @auth
                        <span class="user-name">{{ Auth::user()->name }}</span>
                    @else
                        <a title="Đăng nhập" id="login-icon" href="javascript:void(0);">Đăng nhập</a>
                    @endauth
                </li>



                <div class="overlay" id="login-overlay">
                        {{-- Form đăng nhập --}}
                        @include('client.auth.login')

                        {{-- Form đăng ký --}}
                        @include('client.auth.register')
                </div>
            </li>
            <li> <a  class="fa fa-shopping-bag" href=""></a></li>
            
            @auth
                <li class="logout-item">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fa fa-sign-out-alt"></i>
                        </button>
                    </form>
                </li>
            @endauth

        </div>
    </header>

    <section id="slide">
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
    </section>
<section class="footer">
        <div class="footer-container">
            <p>Tải ứng dụng TickTock</p>
            <div class="app-google">
                <a href=""><img src="{{ asset('storage/appstore.png')}}" alt=""></a>
                <a href=""><img src="{{ asset('storage/googleplay.png')}}" alt=""></a>
            </div>
            <p>Nhận bản tin TickTock</p>
            <div class="input-email">
                <input type="text" placeholder="Nhập email của bạn">
                <i class="fas fa-arrow-left"></i>
            </div>
            <div class="footer-items">
                <li><a href=""><img src="{{ asset('storage/dathongbao.png')}}" alt=""></a></li>
                <li><a href=""></a>Liên hệ</li>
                <li><a href=""></a>Tuyển dụng</li>
                <li><a href=""></a>Giới thiệu</li>
                <li>
                    <a href=""><i class="fab fa-facebook-f"></i></a>
                    <a href=""><i class="fab fa-youtube"></i></a>
                    <a href=""><i class="fab fa-twitter"></i></a>
                </li>
            </div>
            <div class="footer-text">
                Công ty Cổ phần Dự Kim với số đăng ký kinh doanh: 0105777650 <br>
                Địa chỉ đăng ký: Tổ dân phố Tháp, P.Đại Mỗ, Q.Nam Từ Liêm, TP.Hà Nội, Việt Nam - 0243 205 2222 <br>
                Đặt hàng online: <b>0246 662 3434</b>
            </div>
            <div class="footer-bottom">
                @Ivymoda All rights reserved
            </div>
        </div>
     </section>
</body>
<script src="{{ asset('js/client/home.js') }}"></script>
<script>
    const IS_AUTHENTICATED = {{ auth()->check() ? 'true' : 'false' }};
</script>
<script src="{{ asset('js/layouts/auth.js') }}"></script>



</html>