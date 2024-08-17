<?php
include("DB.php");

if (isset($_SESSION['employ']))
	$empp = $_SESSION['employ'];


if (isset($_POST['name']) )
{
	if (isset($empp)){
		$_SESSION['employer'] = $empp[$_POST['name']];
	}
}
// ===
if (isset($_SESSION['user']))
	$emp1 = $_SESSION['user'];

if (isset($_POST['comment']))
{
	$client_id = $emp1['id'];
	$employer_id = $_SESSION['employer']['id'];
	$new_comment = $_POST['comment'];
	$rate1Comm = $_POST['numOfRateIn1Comm'];
	$comment = "INSERT INTO review (employer_id, review, rate, client_id) VALUES ($employer_id, \"$new_comment\", $rate1Comm, $client_id)";
	$add_comment = $pdo->prepare($comment);
	$add_comment->execute();
	header("refresh:0.0001; url=employ.php");
}
// =====

if (isset($_SESSION['employer']))
	$emp2 = $_SESSION['employer'];

if (isset($emp2))
{
	$employer_id = $emp2['id'];
	$proj = $pdo->prepare("SELECT * FROM projects WHERE employer_id = $employer_id");
	$proj->execute();
	$proj = $proj->fetchAll(PDO::FETCH_ASSOC);

	$skil = $pdo->prepare("SELECT skill FROM skills WHERE employer_id = $employer_id");
	$skil->execute();
	$skil = $skil->fetchAll(PDO::FETCH_ASSOC);

	$rev = $pdo->prepare("SELECT * FROM review WHERE employer_id = $employer_id");
	$rev->execute();
	$rev = $rev->fetchAll(PDO::FETCH_ASSOC);
  
}


?>