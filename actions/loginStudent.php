<?php
	// Import necessary files
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	if(!isset($_SESSION)) { session_start(); }

	// Catch all values to can login a student
	$nickmail = $_POST['inputNickmail'];
	$password = $_POST['inputPassword'];
	unset($_POST);
	
	// login a student
	$student = new Student();
	$_SESSION["error"] = !$student->login($nickmail, $password);

	// If has an error, reload page
	if($_SESSION["error"] == TRUE){
		header("Location: /index.php?page=login");
	}
	// if not, go to the main page.
	else{
		$_SESSION['student'] = $student;
		if(isset($_POST['remember'])){
			// Expire in 1 day
			setcookie("user", $student->getCookie(), time() + (86400 * 30), "/");
		}
		header("Location: /index.php?page=main");
	}
?>