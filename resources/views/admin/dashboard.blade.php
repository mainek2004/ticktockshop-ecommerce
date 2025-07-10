<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TickTock_Shop-ADMIN</title>
    <link rel="icon" type="image/png" href="{{ asset('storage/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link rel="stylesheet" href="{{ asset('css/client/home.css') }}">


</head>
<body>
    <header>
        <div class="logo">
            <img src="{{ asset('storage/logo2.png')}}" alt="logoShop">
        </div>

        <div class="header_menu">
            <li> <a href="">QUẢN LÝ SẢN PHẨM</a>
                <!-- <ul class="sub_TH">
                    <li><a href="">Casio </a></li>
                    <li><a href="">Rolex </a></li>
                    <li><a href="">Citizen </a></li>
                    <li><a href="">Rado </a></li>
                    <li><a href="">Seiko </a></li>
                </ul> -->
            </li>
            <li> <a href="">XỬ LÝ ĐƠN HÀNG</a>
                <!-- <ul class="sub_Nu">
                    <li><a href="">Casio nữ</a></li>
                    <li><a href="">Rolex nữ</a></li>
                    <li><a href="">Citizen nữ</a></li>
                    <li><a href="">Rado nữ</a></li>
                    <li><a href="">Seiko nữ</a></li>
                </ul> -->
            </li>
            <li> <a title="Phụ kiện" href="">PHỤ KIỆN</a> </li>
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
            <!-- <li> <a title="Đăng nhập" class="fa fa-user" id="login-icon" href=""></a>
                <div class="overlay" id="login-overlay">

                    <------------------------------------Đăng nhập/ Đăng ký---------------------


                </div>
 
            </li> -->

            <!-- <li> <a title="Đăng nhập" class="fa fa-user" id="login-icon" href="javascript:void(0);"></a> -->
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

    TRANG ADMIN



</body>
<script src="{{ asset('js/layouts/header.js') }}"></script>
<script>
    const IS_AUTHENTICATED = {{ auth()->check() ? 'true' : 'false' }};
</script>
<script src="{{ asset('js/layouts/auth.js') }}"></script>




</html>