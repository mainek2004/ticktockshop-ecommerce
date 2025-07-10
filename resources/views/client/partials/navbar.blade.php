<div class="logo">
    <img src="{{ asset('images/logo2.jpg') }}" alt="logoShop">
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

<div class="header_other d-flex align-items-center gap-3">
    <li class="d-flex align-items-center position-relative" style="width: 100%; max-width: 300px;">
        <input class="form-control form-control-sm me-2 w-100" placeholder="Tìm kiếm" type="text">
        <i class="fas fa-search position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%);"></i>

        <div class="search-history bg-white border mt-2 rounded p-2 shadow position-absolute" style="top: 100%; left: 0; z-index: 1000; width: 100%;">
            <h6 class="search-heading mb-2">Lịch sử tìm kiếm</h6>
            <ul class="list-unstyled mb-0 search-history-list">
                <li class="item"><a href="#" class="dropdown-item">Casio</a></li>
                <li class="item"><a href="#" class="dropdown-item">Rolex</a></li>
            </ul>
        </div>
    </li>


    <li class="nav-item dropdown">
        @auth
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-user me-1"></i> {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="#">Tài khoản</a></li>
                <li><a class="dropdown-item" href="#">Đơn hàng</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="px-3">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger w-100">Đăng xuất</button>
                    </form>
                </li>
            </ul>
        @else
            <a title="Đăng nhập" class="nav-link" id="login-icon" href="{{ route('client.auth.login') }}">
                <i class="fa fa-user"></i>
            </a>
        @endauth
    </li>

    <li>
        <a class="nav-link" href="#">
            <i class="fa fa-shopping-bag"></i>
        </a>
    </li>
</div>
