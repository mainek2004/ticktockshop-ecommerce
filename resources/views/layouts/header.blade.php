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
                    <li><a href="">Rolex nữ</a></li>
                    <li><a href="">Citizen nữ</a></li>
                    <li><a href="">Rado nữ</a></li>
                    <li><a href="">Seiko nữ</a></li>
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
            <!-- <li> <a title="Đăng nhập" class="fa fa-user" id="login-icon" href=""></a>
                <div class="overlay" id="login-overlay">

                    <------------------------------------Đăng nhập/ Đăng ký---------------------


                </div>
 
            </li> -->

            <li> <a title="Đăng nhập" class="fa fa-user" id="login-icon" href="javascript:void(0);"></a>
                <div class="overlay" id="login-overlay">
        {{-- Form đăng nhập --}}
        @include('client.auth.login')

        {{-- Form đăng ký --}}
        @include('client.auth.register')
                </div>
</li>


            <li> <a  class="fa fa-shopping-bag" href=""></a></li>
        </div>
    </header>