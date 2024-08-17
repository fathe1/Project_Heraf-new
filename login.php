<?php
session_start();
unset($_SESSION['user']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="icon" type="image/x-icon" href="images/IMG_20231105_202217_434-removebg.png">

  <link rel="stylesheet" href="CSSFiles/Normalize.css" />
  <!-- Font Awesome Library -->
  <link rel="stylesheet" href="CSSFiles/all.min.css" />
  <link rel="stylesheet" href="CSSFiles/login.css">
  <title>HeraflOGIN</title>
</head>

<body>
  <div class="container">
    <!-- left -->
    <div class="sign-in">
      <div class="logo">
        <img src="images/IMG_20231105_202217_434-removebg.png" alt="logo">
      </div>
      <div class="text center">
        <h1>Login To Your Account</h1>
        <?php include("codelogin.php"); ?>  
      </div>
      <form action="" method="post">
        <input type="email" id="email" placeholder="Email" required
          title="Enter your Email EXample : Heraf123@gmail.com" name="email"><br>
        <input type="password" id="pass" placeholder="Password" required title="Enter your password" name="password"><br>
        <input type="submit" id="sub" value="Sign In" >
        <i class="fa-solid fa-eye" style="cursor:pointer;"></i>
      </form>
    </div>

    <!-- right -->
    <div class="sign-up">
      <div class="lay"></div>
      <div class="text center">
        <h1>New Here ?</h1>
        <p>Sign up and discover a great amount of new opportunities</p>
        <button>Sign Up</button>
      </div>
    </div>
  </div>

  <!-- start Java Script -->
  
  <!-- End Java Script -->
  <script src="JSFILES/login.js"></script>
</body>

</html>