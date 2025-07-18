<div class="register-form" id="register-form" style="display: none;">
    <form action="{{ route('client.register') }}" method="POST">
        @csrf
        <h3>Đăng ký</h3>
        <input type="text" name="name" placeholder="Họ tên" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <input type="password" name="confirm-password" placeholder="Xác nhận mật khẩu" required>

        <button class="btn-register" type="submit">Đăng ký</button>

        <div class="login-link">
            <span>Đã có tài khoản?</span>
            <button class="dn" type="button" id="to-login">Đăng nhập</button>
        </div>
    </form>
</div>
