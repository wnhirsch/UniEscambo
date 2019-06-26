<?php
	// Import necessary files
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	if(!isset($_SESSION)) { session_start(); }

	// Catch all values to can edit student info
	$name 		= $_POST['inputName'];
	$password 	= $_POST['inputPassword'];
	$mail 		= $_POST['inputMail'];
	$link 		= $_POST['inputLink'];
	$about 		= $_POST['inputAbout'];
	$university = $_POST['inputUni'];
	$program 	= $_POST['inputProg'];
	$actualPass = $_POST['actualPassword'];
	unset($_POST);

	// edit student
	$_SESSION["error"] = !$_SESSION['student']->edit($name, $password, $mail, $link,
							$about, $university, $program, $actualPass);

	// If has an error, reload page
	if($_SESSION["error"] == TRUE){
		header("Location: /index.php?page=profile&&edit=true#confirm");
	}
	// if not, go to the student's profile page
	else{
		// Expire in 1 day
		setcookie("user", $_SESSION['student']->getCookie(), time() + (86400 * 30), "/");
		header("Location: /index.php?page=profile");
	}
?>