<?php
include("codeprof.php");
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
        <a href="login.php" id="loginLink">
		    <i class="fa-solid fa-right-from-bracket"></i>
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
          <h3><?php echo $emp1['first_name'] . " " . $emp1['last_name']; ?></h3>
          <p><?php if (isset($emp1['elherfa'])) {echo $emp1['elherfa']; 
            echo "<ul>";
			for ($i = 0; $i < sizeof($skil); $i++) {
				echo "<li>" . $skil[$i]['skill'] . "</li>";
			}
            echo "</ul>";
			
echo "</p>";}
			?>
			<?php if (isset($emp1['elherfa'])) {
            echo "<button class=\"btn-skill\">
              Add skill 
            </button>
            <form class=\"Newskill\" style=\"display: none;\" action=\"\" method=\"post\">
              <label for=\"Nskill\"  >Write your skill : </label>
              <input type=\"text\" id=\"Nskill\" class=\"Nskill\" name=\"addskill\">
              <input type=\"submit\" name=\"\" id=\"\" value=\"Add\" add=\"add\">
            </form>";}?>
            
            <br>
			<?php if (isset($emp1['elherfa'])) {
			
echo "<p>" . $emp1['about'] . "</p>";}
			?>
            <p><span>My phone : </span><?php echo $emp1['phone'] ?></p>
            <?php if (isset($emp1['elherfa'])) {
			echo "<p>Total Reviews :</p>
            <i class=\"fa-solid fa-star one\"></i>
            <i class=\"fa-solid fa-star two\"></i>
            <i class=\"fa-solid fa-star three\"></i>
            <i class=\"fa-solid fa-star four\"></i>
            <i class=\"fa-solid fa-star five\"></i>
          </div>"
		  ;}?>
		  <?php if(!isset($emp1['elherfa'])){echo "</div>";}?>
        <!-- part right => photo -->
        <div class="right">
          <div class="photo">
            <img src="images/<?php echo $emp1['photo'] ?>" alt="">
          </div>
        </div>
      </div>
    </section>
    <!-- end section 1  -->

	<?php if (isset($emp1['elherfa'])) {
		echo "<!-- start section 2 -->
		<div class=\"projects\">";
		 if (sizeof($proj) > 0) {echo "<h2>Some of my works :</h2>";}
		  echo "<div class=\"container\">
	
			<!-- start card -->";
			 for ($i = 0; $i < sizeof($proj); $i++) echo " <div class=\"card\">
			  <!-- left => img -->
			  <div class=\"left\">
				<div class=\"img-proj\">
				  <img src=\"images/" . $proj[$i]['photo'] . "\" alt=\"\">
				</div>
			  </div>
			  <!-- right => text  -->
			  <div class=\"right\">
				<h4>" . $proj[$i]['project_name'] . "</h4>
				<p>" . $proj[$i]['details'] . "</p>
				</div>
			  </div>";}?>
        <!-- end card -->
        <!--form to add project -->
		<?php if (isset($emp1['elherfa'])) {
        echo "<div class=\"lay addlay\"></div>
        <form class=\"addForm\" action=\"\" method=\"post\" enctype=\"multipart/form-data\">
          <label for=\"photoProj\">image of new project : </label>
          <input type=\"file\" name=\"photoProj\" accept=\"image/*\" required>

          <label for=\"projName\">Name of your new project : </label>
          <input type=\"text\" name=\"projName\" required>

          <label for=\"info\">information of your new project :</label>
          <textarea id=\"info\" name=\"infoproj\" rows=\"4\" cols=\"50\" required></textarea>

          <input type=\"submit\" class=\"sub\" value=\"add my new project\" >
        </form>

        <div class=\"add\">
          <p>Add new project</p>
          <i class=\"fa-solid fa-plus\"></i>
        </div>";}?>
      </div>
    </div>
    <!-- end section 2 -->
    
    <!-- start comments -->
<!-- start comments -->
	<?php if (isset($emp1['elherfa'])) { 
	echo "<div class=\"comments\"> <div class=\"container contComnt\">";
  
	for ($i=0; $i < sizeof($rev); $i++){
		$client_id = $rev[$i]['client_id'];
		$run = "SELECT * FROM clients WHERE id = $client_id";
		$clie = $pdo->prepare($run);
		$clie->execute();
		$clie = $clie->fetch(PDO::FETCH_ASSOC);
    
	if ($i == 0){echo "<h2>Ratings : </h2>";}
      echo "
        <!-- ======== -->
        <div class=\"card fornum\">
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
    ";}}?>
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
      <script src="JSFILES/prof.js"></script>
  </body>
  </html>