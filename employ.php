<?php
include("codeEmploy.php");
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
    <!-- Main Template CSS File (stylesheet) -->
    <link rel="stylesheet" href="CSSFiles/prof.css">

  <title>Hreaf Profile</title>
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
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#sur">Survices</a></li>
          <li><a href="#about">About</a></li>
        </ul>
        <a href="<?php if (session_status() == PHP_SESSION_NONE) {session_start();} if (isset($_SESSION['user'])){echo "profile.php";} else {echo "login.php";} ?>">
          <i class="fa-solid fa-user"></i>
        </a>
      </div>
    </div>
  </header>
  <!-- end header -->

    <!-- strat section 1  -->
    <section class="sec1">
      <div class="container">
        <!-- part left => text -->
        <div class="left">
          <p>Hi there</p>
          <h3><?php echo $emp2['first_name'] . " " . $emp2['last_name']; ?></h3>
          <p>
            <?php
              if (isset($emp2['elherfa'])) {//for add skills from db
                echo $emp2['elherfa']; 
                echo "<ul>";
                for ($i = 0; $i < sizeof($skil); $i++) {
                  echo "<li>" . $skil[$i]['skill'] . "</li>";
                }
                echo "</ul>";
                echo "</p>";
              }
              if (isset($emp2['elherfa'])) {
                echo $emp2['about'] . "</p>";
              }
			      ?>
          <p><span>My phone : </span><?php echo $emp2['phone'] ?></p>
          <?php 
            if (isset($emp2['elherfa'])) {
			        echo "<p>Total Reviews :</p>
                <i class=\"fa-solid fa-star one total-rate\"></i>
                <i class=\"fa-solid fa-star two total-rate\"></i>
                <i class=\"fa-solid fa-star three total-rate\"></i>
                <i class=\"fa-solid fa-star four total-rate\"></i>
                <i class=\"fa-solid fa-star five total-rate\"></i>
          </div>";
          }?>
        <!-- part right => photo -->
        <div class="right">
          <div class="photo">
            <img src="images/<?php echo $emp2['photo'] ?>" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- end section 1  -->
<!-- to put projects fro database -->
	<?php 
  if (isset($emp2['elherfa']) and sizeof($proj) > 0) {
    // start section 2
		echo "<div class=\"projects\">";
		echo "<h2>Some of my works :</h2>";
		echo "<div class=\"container\">";
    // start card
		for ($i = 0; $i < sizeof($proj); $i++){
      echo " <div class=\"card\">";
      // left => img
        echo "<div class=\"left\">
                <div class=\"img-proj\">
                  <img src=\"images/" . $proj[$i]['photo'] . "\" alt=\"\">
                </div>
              </div>";
          //right => text 
          echo "<div class=\"right\">
                  <h4>" . $proj[$i]['project_name'] . "</h4>
                  <p>" . $proj[$i]['details'] . "</p>
                </div>
              </div>";
    }
  }
    echo "</div>
  </div>";
  // end card 
// end section 2 

  // start comments 

	  echo "<div class=\"comments\"> 
            <div class=\"container contComnt\">";
	  for ($i=0; $i < sizeof($rev); $i++){//for add comments from db
		  $client_id = $rev[$i]['client_id'];
		  $run = "SELECT * FROM clients WHERE id = $client_id";
		  $clie = $pdo->prepare($run);
		  $clie->execute();
		  $clie = $clie->fetch(PDO::FETCH_ASSOC);

    if ($i == 0){echo "<h2>Ratings : </h2>";}
      echo "<div class=\"card fornum\">
              <div class=\"person\">
                <img src=\"images/" . $clie['photo'] . "\" alt=\"\">
                <div class=\"name\">" . $clie['first_name'] . " " . $clie['last_name'] . "</div>
              </div>
              <div class=\"cmnt\">
                <div class=\"rating\">
                  <i class=\"fa-solid fa-star star \"></i>
                  <i class=\"fa-solid fa-star star \"></i>
                  <i class=\"fa-solid fa-star star \"></i>
                  <i class=\"fa-solid fa-star star \"></i>
                  <i class=\"fa-solid fa-star star  \"></i>
                </div>
                <p class=\"mycmnt\">" . $rev[$i]['review'] . "</p>
                <span class=\"numOfRateFromDB\" style=\"display:none\"> ". $rev[$i]['rate'] . "</span>
              </div>
            </div>
        <!-- ==== -->
    ";}?>
	<?php if (isset($emp2['elherfa']) and isset($emp1) ){//and !isset($emp1['elherfa'])) {
      
    echo "
        <!-- ======== --> 
        <div class=\"card fornum\">
          <div class=\"person\">
            <img src=\"images/" . $emp1['photo'] . "\" alt=\"\">
            <div class=\"name\">" . $emp1['first_name'] . " " . $emp1['last_name'] . "</div>
          </div>
          <div class=\"cmnt\">
            <form action=\"\" method=\"POST\">
              <input type=\"text\" name=\"comment\" placeholder=\"Write your comment here\">
              <input type=\"text\" name=\"numOfRateIn1Comm\" style=\"display:none;\">
              <input type=\"submit\" class=\"addcmnt\" name=\"\" id=\"\" value=\"add comment\" add=\"add\">
            </form>
          <div class=\"cmnt\">
            <div class=\"rating not\">
              <i class=\"fa-solid fa-star star\" onclick=\"rate(1)\" onmouseover=\"highlight(1)\" onmouseout=\"resetStars()\"></i>
              <i class=\"fa-solid fa-star star\" onclick=\"rate(2)\" onmouseover=\"highlight(2)\" onmouseout=\"resetStars()\"></i>
              <i class=\"fa-solid fa-star star\" onclick=\"rate(3)\" onmouseover=\"highlight(3)\" onmouseout=\"resetStars()\"></i>
              <i class=\"fa-solid fa-star star\" onclick=\"rate(4)\" onmouseover=\"highlight(4)\" onmouseout=\"resetStars()\"></i>
              <i class=\"fa-solid fa-star star\" onclick=\"rate(5)\" onmouseover=\"highlight(5)\" onmouseout=\"resetStars()\"></i>
            </div>
            <p class=\"mycmnt\"></p>
          </div>    
        </div>
        <!-- ==== -->
    </div>
  </div>
  </div>";}?>
    </div>
  </div>
      <!-- end comments -->
      
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
        <div id="sur" class="card">
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
  <script src="JSFILES/employ.js"></script>
  </html>
