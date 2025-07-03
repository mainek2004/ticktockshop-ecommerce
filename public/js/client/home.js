//header
const header  = document.querySelector("header")
window.addEventListener("scroll", function(){
  x = window.pageYOffset  //cuộn dọc
  //console.log(x)
  if (x>0){
    header.classList.add("sticky")
  }
  else{
    header.classList.remove("sticky")
  }
})


//login
const loginIcon = document.getElementById("login-icon");
const loginOverlay = document.getElementById("login-overlay");
const loginForm = document.getElementById("login-form");
const registerForm = document.getElementById("register-form");
const toRegisterBtn = document.getElementById("dangky");
const toLoginBtn = document.getElementById("dangnhap");

// Click vào icon người dùng => hiện form đăng nhập
loginIcon.addEventListener("click", function (e) {
  e.preventDefault();
  loginOverlay.style.display = "flex";
  loginForm.style.display = "block";
  registerForm.style.display = "none";
});

// Click vào vùng nền tối => ẩn form
loginOverlay.addEventListener("click", function (e) {
  if (e.target === loginOverlay) {
    loginOverlay.style.display = "none";
  }
});

// Click nút "Đăng ký" => chuyển sang form đăng ký
toRegisterBtn.addEventListener("click", function () {
  loginForm.style.display = "none";
  registerForm.style.display = "block";
  
});

// Click nút "Đăng nhập" => chuyển lại form đăng nhập
toLoginBtn.addEventListener("click", function () {
  registerForm.style.display = "none";
  loginForm.style.display = "block";
});







// slider
  const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
  const imgContainer = document.querySelector(".aspect-ratio-169")
  const dotItem = document.querySelectorAll(".dot")
  let imgNum = imgPosition.length
  let index = 0
//   console.log(imgPosition)
  imgPosition.forEach(function(image, index){
    // console.log(image, index)
    image.style.left = index*100 + "%"
    dotItem[index].addEventListener("click", function(){
        slider (index)
    })
  })
  function imgSlide()
  {
    index++;
    if (index >= imgNum){
        index=0
    }
    slider(index)
  }

  function slider(index){
    imgContainer.style.left = "-" +index*100+ "%"
    const dotActive = document.querySelector(".active")
    dotActive.classList.remove("active")
    dotItem[index].classList.add("active")

  }
  setInterval(imgSlide, 5000)