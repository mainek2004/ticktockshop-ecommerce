<div class="login-form" id="login-form">
    <form action="{{ route('client.login') }}" method="POST">
        @csrf
        <h3>Đăng nhập</h3>
         @if (session('error'))
            <div style="color: red; margin-bottom: 10px">
                {{ session('error') }}
            </div>
        @endif
        <input type="text" name="email" placeholder="Email đăng nhập" required>
        <input type="password" name="password" placeholder="Mật khẩu" required>
        <button class="btn-login" type="submit">Đăng nhập</button>

        <div class="register-link">
            <span>Chưa có tài khoản?</span>
            <button class="dk" type="button" id="to-register">Đăng ký</button>
        </div>
    </form>
</div>