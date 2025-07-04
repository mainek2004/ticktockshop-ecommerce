<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TickTock_Shop</title>
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
            <li> <a href="">THƯƠNG HIỆU</a>
                <ul class="sub_TH">
                    <li><a href="">Casio </a></li>
                    <li><a href="">Rolex </a></li>
                    <li><a href="">Citizen </a></li>
                    <li><a href="">Rado </a></li>
                    <li><a href="">Seiko </a></li>
                </ul>
            </li>
            <li> <a href="">NỮ</a>
                <ul class="sub_Nu">
                    <li><a href="">Casio nữ</a></li>
                    <li><a href="">Rado nữ</a></li>
                    <li><a href="">Citizen nữ</a></li>
                    <li><a href="">Rado nữ</a></li>
                    <li><a href="">Seiko nữ</a></li>
                </ul>
            </li>
            <li> <a href="">NAM</a> 
                <ul class="sub_Nam">
                    <li><a href="">Casio nam</a></li>
                    <li><a href="">Rado nam</a></li>
                    <li><a href="">Citizen nam</a></li>
                    <li><a href="">Rado nam</a></li>
                    <li><a href="">Seiko nam</a></li>
                </ul>
            </li>
            <li> <a href="">CẶP ĐÔI</a>
                <ul class="sub_Doi">
                    <li><a href="">Casio cặp</a></li>
                    <li><a href="">Rado cặp</a></li>
                    <li><a href="">Citizen cặp</a></li>
                    <li><a href="">Rado cặp</a></li>
                    <li><a href="">Seiko cặp</a></li>
                </ul>
            </li>
            <li> <a title="Phụ kiện" href="">PHỤ KIỆN</a> </li>
            <li> <a href="">THÔNG TIN</a> </li>
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
            <li> <a title="Đăng nhập" class="fa fa-user" id="login-icon" href=""></a>
                <div class="overlay" id="login-overlay">

                    <!-- ------------------------------------Đăng nhập/ Đăng ký---------------------- -->
                    <div class="login-form" id="login-form">
                        <form>
                            <h3>Đăng nhập</h3>
                            <!-- required bắt buộc nhập  -->
                            <input type="text" placeholder="Tên đăng nhập" required>     
                            <input type="password" placeholder="Mật khẩu" required>
                            <button class="btn-login" type="submit">Đăng nhập</button>
                            <div class="register-link">
                                <span>Chưa có tài khoản ?</span>
                                <button class="dk" type="button" id="dangky">Đăng ký</button>
                            </div>
                        </form>
                    </div>

                    <div class="register-form" id="register-form">
                        <form>
                            <h3>Đăng ký</h3>
                            <input type="text" placeholder="Tên đăng ký" required>
                            <input type="password" placeholder="Mật khẩu" required>
                            <input type="password" placeholder="Xác nhận mật khẩu" required>
                            <input type="email" placeholder="Gmail" required>
                            <button class="btn-register">Đăng ký</button>
                            <div class="login-link">
                                <span>Quay lại đăng nhập ?</span>
                                <button class="dn" type="button" id="dangnhap">Đăng nhập</button>
                            </div>
                        </form>
                    </div>

                </div>
 
            </li>
            <li> <a  class="fa fa-shopping-bag" href=""></a></li>
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


</html>