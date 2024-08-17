<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <link rel="icon" type="image/x-icon" href="images/IMG_20231105_202217_434-removebg.png">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="CSSFiles/Normalize.css" />
  <!-- Font Awesome Library -->
  <link rel="stylesheet" href="CSSFiles/all.min.css" />
  <!-- Main Template CSS File (stylesheet) -->
  <link rel="stylesheet" href="CSSFiles/index.css">
  <title>Heraf</title>
  <style>

  </style>

</head>

<body>
  <!-- start header -->
  <header>
    <div class="container">
      <!-- left -->
      <div class="logo">
        <img src="images/IMG_20231105_202217_434-removebg.png" alt="Logo">
      </div>
      <i class="fas fa-bars toggle-menu"></i>
      <div class="links">
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#sur">Survices</a></li>
          <li><a href="#about">About</a></li>
        </ul>
        <a href="<?php if (session_status() == PHP_SESSION_NONE) {session_start();} if (isset($_SESSION['user'])){echo "profile.php";} else {echo "login.php";} ?>">
          <i class="fa-solid fa-user" ></i>
        </a>
      </div>
    </div>
  </header>
  <!-- end header -->
  
  <!-- start section 1  -->
  <section>
    <div class="lay"></div>
    <div class="content center">
      <h1>Repair and
        Maintenance
        Services</h1>
      <p>A platform to help you find a suitable craftsman</p>
      <div class="search">
        <i class="fa-solid fa-magnifying-glass"></i>
        
      
	  <form action="search.php" method="post">
			<input type="search" class="center" name="name" placeholder="   electrician ,Computer engineer ,Mechanical ,carpenter,Broker,............................................ ">
			<button type="submit">Search</button>
		</form>
		</div>
    </div>
  </section>
  <!-- end section 1  -->

  <!-- start section 2 -->
  <div class="section2" id="sur">
    <div class="container">
      <h2 class="special-heading">our Services</h2>
      <div class="content">
        <!-- =================================================================== -->
        <div class="card">
		<form action="search.php" method="post">
			<input type="text" id="inputData" name="name" value="Carpenter">
			<button class="button" type="submit" style="background-image: url('images/carpenter-4015109.jpg');"></button>
		</form>
          <div class="info">
            <h3>Carpenters Department</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Ipsa nobis magnam aperiam quis! Quae possimus repudiandae perspiciatis voluptate,
              excepturi dignissimos, harum totam ipsum, facilis deserunt ab explicabo unde vitae fugit!</p>
          </div>
        </div>
        <!-- =================================================================== -->
        <div class="card">
		<form action="search.php" method="post">
			<input type="text" id="inputData" name="name" value="Mechanical">
			<button class="button" type="submit" style="background-image: url('images/man-362150.jpg');"></button>
		</form>
          <div class="info">
            <h3>Mechanical Department</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Ipsa nobis magnam aperiam quis! Quae possimus repudiandae perspiciatis voluptate,
              excepturi dignissimos, harum totam ipsum, facilis deserunt ab explicabo unde vitae fugit!</p>
          </div>
        </div>
        <!-- =================================================================== -->
        <div class="card">
		<form action="search.php" method="post">
			<input type="text" id="inputData" name="name" value="Electrician">
			<button class="button" type="submit" style="background-image: url('images/electrician-2755683.jpg');"></button>
		</form>
          <div class="info">
            <h3>Electricians Department</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Ipsa nobis magnam aperiam quis! Quae possimus repudiandae perspiciatis voluptate,
              excepturi dignissimos, harum totam ipsum, facilis deserunt ab explicabo unde vitae fugit!</p>
          </div>
        </div>
        <!-- =================================================================== -->
        <div class="card">
		<form action="search.php" method="post">
			<input type="text" id="inputData" name="name" value="Blacksmith">
			<button class="button" type="submit" style="background-image: url('images/pexels-tima-miroshnichenko-5846143.jpg');"></button>
		</form>
          <div class="info">
            <h3>blacksmith</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Ipsa nobis magnam aperiam quis! Quae possimus repudiandae perspiciatis voluptate,
              excepturi dignissimos, harum totam ipsum, facilis deserunt ab explicabo unde vitae fugit!</p>
          </div>
        </div>
        <!-- =================================================================== -->
        <div class="card">
		<form action="search.php" method="post">
			<input type="text" id="inputData" name="name" value="Painter">
			<button class="button" type="submit" style="background-image: url('images/pexels-blue-bird-7218525.jpg');"></button>
		</form>
          <div class="info">
            <h3>painter</h3>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
              Ipsa nobis magnam aperiam quis! Quae possimus repudiandae perspiciatis voluptate,
              excepturi dignissimos, harum totam ipsum, facilis deserunt ab explicabo unde vitae fugit!</p>
          </div>
        </div>
        <!-- =================================================================== -->


      </div>
    </div>
  </div>
  <!-- end section 2 -->



  <!-- start footer  -->
  <footer>
    <div class="container">
      <div class="content">

        <div class="card">
          <h3>Connect with us</h3>
          <p></p>
          <div class="ourMail">
            <i class="fa-solid fa-envelope"></i>
            <span>Heraf@gmail.com</span>
          </div>
        </div>
        <!-- =================================================================== -->
        <div class="card">
          <h3>Our service</h3>
          <p><span style="font-weight: bold;">Heraf :</span> is a platform that provides a space for artisans of all
            shapes and professions to offer their services</p>
        </div>
        <!-- =================================================================== -->
        <div id="about" class="card">
          <h3>About US</h3>
          <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            Ipsa nobis magnam aperiam quis! Quae possimus repudiandae perspiciatis voluptate,
            excepturi dignissimos, harum totam ipsum, facilis deserunt ab explicabo unde vitae fugit!</p>
        </div>
        <!-- =================================================================== -->
      </div>
      <hr>
      <h2>ERROR 404 TEAM </h2>
      <p style="font-size: 0.9em;">
        <i class="fa-solid fa-copyright"></i> 2023
      </p>
    </div>
  </footer>
  <!-- end footer  -->
</body>
</html>
