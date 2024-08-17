
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
    <link rel="stylesheet" href="CSSFiles/NewACC.css">
    <title>HerafNEW</title>
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
                    <li><a href="index.php#about">About</a></li>
                </ul>
                <a href="login.php">
                    <i class="fa-solid fa-user"></i>
                </a>
            </div>
        </div>
    </header>
    <!-- end header -->


        <div class="background"></div>
        <div class="lay"></div>

    <div class="main-box center">
        <h2>Create new acount </h2>
        <?php include("codeNewAcc.php") ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="fname">First name : </label>
            <input name="first_name"  type="text" id="fname" placeholder="Enter First Name" maxlength="15" autofocus required oninvalid="this.setCustomValidity('error')" oninput="setCustomValidity('')">
            
            <label for="lname">Last name : </label>
            <input name="last_name" type="text" id="lname" placeholder="Enter Last Name" maxlength="15" required >
            
            <label for="photo">Your Profile Photo : </label>
            <input type="file" name="photo" id="photo" required accept="image/*">
            
            <label for="governorate">Governorate </label>
            <select name="governorate" id="governorate">
                <option value=""></option>
                <option value="Cairo" >Cairo</option>
                <option value="Alexandria">Alexandria</option>
                <option value="Giza">Giza</option>
                <option value="Luxor">Luxor</option>
                <option value="Aswan">Aswan</option>
                <option value="Qena">Qena</option>
                <option value="Sohag">Sohag</option>
            </select>
            
            
            <label for="Country">Your Country : </label>
            <select name="Country" id="Country">
                    <option value=""></option>
                <optgroup country="country" label="Cairo"style="display: none;">
                    <option value="Maadi">Maadi</option>
                    <option value="Zamalek">Zamalek</option>
                    <option value="Heliopolis">Heliopolis</option>
                    <option value="Nasr City">Nasr City</option>
                    <option value="Mohandessin">Mohandessin</option>
                <optgroup country="country"label="Alexandria"style="display:none;">
                    <option value="Al-Montaza">Al-Montaza</option>
                    <option value="Al-Ibrahimiyya">Al-Ibrahimiyya</option>
                    <option value="Al-Laban">Al-Laban</option>
                    <option value="Al-Gomrok">Al-Gomrok</option>
                    <option value="Al-Wardian">Al-Wardian</option>
                </optgroup>
                <optgroup country="country"label="Giza"style="display: none;">
                    <option value="6th of October City">6th of October City</option>
                    <option value="Sheikh Zayed City">Sheikh Zayed City</option>
                    <option value="Al-Haram">Al-Haram</option>
                    <option value="Dokki">Dokki</option>
                    <option value="Agouza">Agouza</option>
                </optgroup>
                <optgroup country="country" label="Luxor"style="display: none;">
                    <option value="Luxor City">Luxor City</option>
                    <option value="Al-Asasif">Al-Asasif</option>
                    <option value="Karnak">Karnak</option>
                    <option value="Al-Manshiya">Al-Manshiya</option>
                    <option value="Al-Gorna">Al-Gorna</option>
                </optgroup>
                <optgroup country="country"label="Aswan"style="display: none;">
                    <option value="Aswan City">Aswan City</option>
                    <option value="Elephantine Island">Elephantine Island</option>
                    <option value="New Kalabsha">New Kalabsha</option>
                    <option value="Edfu">Edfu</option>
                    <option value="Kom Ombo">Kom Ombo</option>
                </optgroup>
                <optgroup country="country" label="Qena" style="display: none;">
                    <option value="Luxor City">Luxor City</option>
                    <option value="Al-Asasif">Al-Asasif</option>
                    <option value="Karnak">Karnak</option>
                    <option value="Al-Manshiya">Al-Manshiya</option>
                    <option value="Al-Gorna">Al-Gorna</option>
                </optgroup>
                <optgroup country="country" label="Sohag" style="display: none;">
                    <option value="Sohag  City">Sohag City</option>
                    <option value="Akhmim">Akhmim</option>
                    <option value="Girga">Girga</option>
                    <option value="Tahta">Tahta</option>
                    <option value="Juhayna">Juhayna</option>
                </optgroup>
            </select>
            
			

            <label for="num">Your phone number</label>
            <input type="tel" name="phone" id="num" placeholder="01091532721" maxlength="11">
            
            <label for="ifemp">Are you an employee?</label>
            <select name="ifemp" id="ifemp" required    >
                <option value="yes">Yes</option>
                <option value="no" selected>No</option>
            </select>

            
            <label for="jobInfo" class="jobInfo" style="display: none;">your job : </label>
            <input type="text" name="jobInfo" id="jobInfo" class="jobInfo" style="display: none;">


            <label for="aboutyou" class="aboutwork" style="display: none;">About You</label>
            <input type="text" name="aboutyou" class="aboutwork" id="aboutyou" placeholder="Write about your work here" style="display: none;" >
            
            

            
            <label for="Email">Email : </label>
            <input name="email" type="text" id="Email" placeholder="yourmail@gmail.com" maxlength="25" required>
            
            <label for="pass">pass : </label>
            <input name="pass_word" type="pass" id="pass" placeholder="assd#dwss_10@dw40" maxlength="25"  minlength="5" required>
            
            <label for="cpass">Confirm pass : </label>
            <input type="pass" id="cpass" placeholder="assd#dwss_10@dw40" maxlength="25" minlength="5"required >
            
            <input class="sub" type="submit" value="sign up" >
            
            <div class="Error"></div>
        </form>
    </div>
</body>
    <script src="JSFILES/NewACC.js"></script>
</html>

