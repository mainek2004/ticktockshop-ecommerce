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