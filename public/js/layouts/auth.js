// //login
// const loginIcon = document.getElementById("login-icon");
// const loginOverlay = document.getElementById("login-overlay");
// const loginForm = document.getElementById("login-form");
// const registerForm = document.getElementById("register-form");
// const toRegisterBtn = document.getElementById("to-register");
// const toLoginBtn = document.getElementById("to-login");

// // Click vào icon người dùng => hiện form đăng nhập
// loginIcon.addEventListener("click", function (e) {
//   e.preventDefault();
//   loginOverlay.style.display = "flex";
//   loginForm.style.display = "block";
//   registerForm.style.display = "none";
// });

// // Click vào vùng nền tối => ẩn form
// loginOverlay.addEventListener("click", function (e) {
//   if (e.target === loginOverlay) {
//     loginOverlay.style.display = "none";
//   }
// });

// // Click nút "Đăng ký" => chuyển sang form đăng ký
// toRegisterBtn.addEventListener("click", function () {
//   loginForm.style.display = "none";
//   registerForm.style.display = "block";
  
// });

// // Click nút "Đăng nhập" => chuyển lại form đăng nhập
// toLoginBtn.addEventListener("click", function () {
//   registerForm.style.display = "none";
//   loginForm.style.display = "block";
// });



document.addEventListener("DOMContentLoaded", function () {
    if (typeof IS_AUTHENTICATED === "undefined" || IS_AUTHENTICATED) {
        // Nếu đã đăng nhập → không làm gì
        return;
    }

    const loginIcon = document.getElementById("login-icon");
    const loginOverlay = document.getElementById("login-overlay");
    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const toRegisterBtn = document.getElementById("to-register");
    const toLoginBtn = document.getElementById("to-login");

    loginIcon.addEventListener("click", function (e) {
        e.preventDefault();
        loginOverlay.style.display = "flex";
        loginForm.style.display = "block";
        registerForm.style.display = "none";
    });

    loginOverlay.addEventListener("click", function (e) {
        if (e.target === loginOverlay) {
            loginOverlay.style.display = "none";
        }
    });

    toRegisterBtn.addEventListener("click", function () {
        loginForm.style.display = "none";
        registerForm.style.display = "block";
    });

    toLoginBtn.addEventListener("click", function () {
        registerForm.style.display = "none";
        loginForm.style.display = "block";
    });
});
