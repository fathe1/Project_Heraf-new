<?php
include("DB.php");

if ($_POST)
{
	$emps = $pdo->prepare("SELECT email FROM employer");
	$emps->execute();
	$clis = $pdo->prepare("SELECT email FROM clients");
	$clis->execute();
	$emps = $emps->fetchAll(PDO::FETCH_ASSOC);
	$clis = $clis->fetchAll(PDO::FETCH_ASSOC);
	$found = false;

	if (isset($_POST['email'])){
		foreach ($emps as $s) {
			if ($s['email'] === $_POST['email']) {
				$found = true;
				break;
			}
		}
	}

	if (isset($_POST['email'])){
		foreach ($clis as $s) {
			if ($s['email'] === $_POST['email']) {
				$found = true;
				break;
			}
		}
	}

	if (!$found)
	{
		$targetDirectory = "images/";
		$originalFileName = $_POST['email'] . ".jpg";
		$targetFilePath = $targetDirectory . $originalFileName;
		$check = getimagesize($_FILES["photo"]["tmp_name"]);
		if ($check !== false) {
			move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFilePath);
		} else {
			echo "File is not an image.";
		}

		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$pass_word = $_POST['pass_word'];
		$country = $_POST['Country'];
		$governorate = $_POST['governorate'];
		$photo = $_POST['email'] . ".jpg";
		$phone = $_POST['phone'];
		if ($_POST['ifemp'] == "yes")
		{
			$elherfa = $_POST['jobInfo'];
			$about = $_POST['aboutyou'];
			$new_acc = "INSERT INTO employer (first_name, last_name, email, pass_word, country, governorate, photo, phone, elherfa, about) VALUES (\"$first_name\", \"$last_name\", \"$email\", \"$pass_word\", \"$country\", \"$governorate\", \"$photo\", \"$phone\", \"$elherfa\", \"$about\")";
			$add_new_acc = $pdo->prepare($new_acc);
			$add_new_acc->execute();
		}
		else
		{
			$new_acc = "INSERT INTO clients (first_name, last_name, email, pass_word, country, governorate, photo, phone) VALUES (\"$first_name\", \"$last_name\", \"$email\", \"$pass_word\", \"$country\", \"$governorate\", \"$photo\", \"$phone\")";
			$add_new_acc = $pdo->prepare($new_acc);
			$add_new_acc->execute();
		}

		header('Location: login.php');
	}
	else{
		echo "<p style='z-index: 5;
    color: red;
    font-size: 25px;
    position: absolute;
    top: -103px;
    left: 50%;
    transform: translateX(-50%);
    font-weight: bold;'>Error: you already have account</p>";
	}
}


?>