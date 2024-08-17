<?php
include("DB.php");
//page login
if ($_POST)
{
	$email = $_POST['email'];
	$password = $_POST['password'];
	$sql = "SELECT * FROM employer WHERE email = \"$email\" AND pass_word = \"$password\"";

	$stmt = $pdo->prepare($sql);
	$stmt->execute();
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	// check if the user is client or employ
	if (!$user)
	{
		$sql = "SELECT * FROM clients WHERE email = \"$email\" AND pass_word = \"$password\"";
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
	}

	if (session_status() == PHP_SESSION_NONE)
		session_start();
	$_SESSION['user'] = $user;

	if ($user and $email == $user['email'] and $password == $user['pass_word']) {
		header('Location: profile.php');
		exit;
	} else if ($_POST) {
		echo "<p style='color: red;position: relative;bottom: -15px;'>Invalid email or password</p>";
	}
}

?>