<?php
include("DB.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' )
{
	$herfa = $_POST['name'];
	$sqll = "SELECT * FROM employer WHERE elherfa = \"$herfa\"";
	$heraf = $pdo->prepare($sqll);
	$heraf->execute();
	$heraf = $heraf->fetchAll(PDO::FETCH_ASSOC);
	$_SESSION['employ'] = $heraf;
}
?>