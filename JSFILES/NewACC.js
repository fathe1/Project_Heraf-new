console.log("mmmmmmmmmmmmmmmmmmm")
let form = document.getElementsByTagName("form")[0];
let pass = document.getElementById("pass");
let cpass = document.getElementById("cpass");



document.addEventListener('DOMContentLoaded', function () {
  // var inputElement = document.querySelector('input[required]');
  // var pass = document.getElementById("pass");

  pass.addEventListener('invalid', function () {
    this.setCustomValidity('يرجى إدخال قيمة');
  });

  pass.addEventListener('input', function () {
    this.setCustomValidity('');
  });
});

  form.onsubmit = function (e) {
  if (checkConfirmPass(pass.value, cpass.value)) {
    return
  }
  else {
    e.preventDefault();
    window.alert("Wrong in confirm password ")
  }
}


function checkConfirmPass(pass, cpass) {
  console.log("don confirm")
  return pass === cpass ? true : false;
}

// ===========================
//script to check if emp or client
let ifemp = document.getElementById("ifemp");
ifemp.onchange = function () {
  if (ifemp.value == "yes") {
    console.log("00000000");
    let jobInfo = document.querySelectorAll('[class="jobInfo"]');

    jobInfo[0].style.display = "block";
    jobInfo[1].style.display = "block";
    jobInfo[1].setAttribute("required", "");

    let About = document.querySelectorAll('[class="aboutwork"]')
    About[0].style.display = "block";
    About[1].style.display = "block";

  }
  else {
    let jobInfo = document.querySelectorAll('[class="jobInfo"]');
    jobInfo[0].style.display = "none";
    jobInfo[1].style.display = "none";

    let About = document.querySelectorAll('[class="aboutwork"]')
    About[0].style.display = "none";
    About[1].style.display = "none";

  }
}

//script for country
let gov = document.getElementById("governorate");
let country = document.getElementById("Country");
let groups = document.querySelectorAll('[country="country"]');
gov.onchange = () => {
  for (let i = 0; i < groups.length; i++) {
    groups[i].value = " "
    groups[i].style.display = "none";
  }
  for (let i = 0; i < groups.length; i++) {
    if (gov.value == groups[i].getAttribute("label")) {
      groups[i].style.display = "inline-block";
    }
  }
}


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

// =====================
