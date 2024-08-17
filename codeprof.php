<?php
include("DB.php");

if (isset($_SESSION['user']))
	$emp1 = $_SESSION['user'];


if (isset($emp1))
{
	$employer_id = $emp1['id'];
	$skil = $pdo->prepare("SELECT skill FROM skills WHERE employer_id = $employer_id");
	$skil->execute();
	$skil = $skil->fetchAll(PDO::FETCH_ASSOC);

	$found = false;

	if (isset($_POST['addskill'])){
		foreach ($skil as $s) {
			if ($s['skill'] === $_POST['addskill']) {
				$found = true;
				break;
			}
		}
	}
	if (isset($_POST['addskill']) and !$found){
		$new = $_POST['addskill'];
	$adding = "INSERT INTO skills (employer_id, skill) VALUES ($employer_id, \"$new\")";
	$add = $pdo->prepare($adding);
	$add->execute();
	header("refresh:0.0001; url=profile.php");
	}

	if (isset($_POST['projName']) and isset($_POST['infoproj']) and isset($_FILES["photoProj"])){

		$targetDirectory = "images/";
		$originalFileName = $_POST['projName'] . $employer_id . ".jpg";
		$targetFilePath = $targetDirectory . $originalFileName;
		$check = getimagesize($_FILES["photoProj"]["tmp_name"]);
		if ($check !== false) {
        	move_uploaded_file($_FILES["photoProj"]["tmp_name"], $targetFilePath);
        } else {
            echo "File is not an image.";
        }

		$photoProj = $_POST['projName'] . $employer_id . ".jpg";
		$projName = $_POST['projName'];
		$infoproj = $_POST['infoproj'];
		$adding_project = "INSERT INTO projects (employer_id, project_name, photo, details) VALUES ($employer_id, \"$projName\", \"$photoProj\", \"$infoproj\")";
		$add_project = $pdo->prepare($adding_project);
		$add_project->execute();
		header("refresh:0.0001; url=profile.php");
	}	
// ==========================================

	$proj = $pdo->prepare("SELECT * FROM projects WHERE employer_id = $employer_id");
	$proj->execute();
	$proj = $proj->fetchAll(PDO::FETCH_ASSOC);

  // ======================

  if (isset($emp1['elherfa']))
{
	$rev = $pdo->prepare("SELECT * FROM review WHERE employer_id = $employer_id");
	$rev->execute();
	$rev = $rev->fetchAll(PDO::FETCH_ASSOC);	
}
}
?>