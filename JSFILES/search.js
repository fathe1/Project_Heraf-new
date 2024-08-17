  //script for click on fas fa-bars toggle-menu in phone screen
  let BtnList = document.getElementsByClassName("fas fa-bars toggle-menu")[0]
  let links = document.querySelector('[class="links"]')


  window.addEventListener("resize", function () {
    if (window.innerHeight <= 768) {
      links.style.display = "none"
      BtnList.onclick = () => {
        links.style.cssText = "display: flex; flex-direction: column; position:absolute; top:100%; left:0; width: 100%;background-color: #00000075; "
      }
      links.onmouseleave = () => {
        links.style.display = "none"
      }
    }
    if (window.innerWidth > 768) {
      links.style.cssText = "display: flex; position: relative; "
      links.onmouseleave = () => {
        links.style.display = "display: flex; position: relative; "
      }
    }
  })
