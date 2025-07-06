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