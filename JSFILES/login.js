    //start to show pass
  let pass = document.getElementById("pass");
  let iconShow = document.getElementsByClassName("fa-solid fa-eye")[0]
    iconShow.onclick = () => {
      if (pass.type === "password") {
    pass.type = "text";
        setTimeout(() => {pass.type = "password"}, 3000)
      }
  else {
    pass.type = "password";
      }
    }
  //end to show pass
  let btn = document.getElementsByTagName("button")[0]
  //console.log(btn)
  btn.onclick = function () {
    location.href = "newacount.php"
  }

