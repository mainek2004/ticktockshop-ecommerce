document.addEventListener("DOMContentLoaded", function () {
    const loginIcon = document.getElementById("login-icon");
    const loginOverlay = document.getElementById("login-overlay");
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const toRegisterBtn = document.getElementById("to-register");
    const toLoginBtn = document.getElementById("to-login");

    // Nếu đã đăng nhập thì không hiển thị login overlay
    if (typeof IS_AUTHENTICATED === "undefined" || IS_AUTHENTICATED) {
        return;
    }

    // Nếu có lỗi login từ session, tự động mở form login
    const hasLoginError = document.querySelector('meta[name="login-error"]');
    if (hasLoginError && loginOverlay && loginForm) {
        loginOverlay.style.display = "flex";
        loginForm.style.display = "block";
        if (registerForm) {
            registerForm.style.display = "none";
        }
    }

    const hasRegisterError = document.querySelector('meta[name=register-error]');
    if (hasRegisterError) {
    if (loginOverlay && registerForm) {
        loginOverlay.style.display = "flex";
        loginForm.style.display = "none";
        registerForm.style.display = "block";
    } 
    }

    // Khi người dùng click vào biểu tượng login
    if (loginIcon) {
        loginIcon.addEventListener("click", function (e) {
            e.preventDefault();
            loginOverlay.style.display = "flex";
            loginForm.style.display = "block";
            if (registerForm) {
                registerForm.style.display = "none";
            }
        });
    }

    // Click nền tối để đóng overlay
    if (loginOverlay) {
        loginOverlay.addEventListener("click", function (e) {
            if (e.target === loginOverlay) {
                loginOverlay.style.display = "none";
            }
        });
    }

    // Chuyển sang form đăng ký
    if (toRegisterBtn) {
        toRegisterBtn.addEventListener("click", function () {
            loginForm.style.display = "none";
            if (registerForm) registerForm.style.display = "block";
        });
    }

    // Chuyển lại form đăng nhập
    if (toLoginBtn) {
        toLoginBtn.addEventListener("click", function () {
            registerForm.style.display = "none";
            loginForm.style.display = "block";
        });
    }
});
