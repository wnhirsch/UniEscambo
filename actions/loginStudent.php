<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	if(!isset($_SESSION)) { session_start(); }

	$nickmail = $_POST['inputNickmail'];
	$password = $_POST['inputPassword'];
	
	$student = new Student();
	$_SESSION["error"] = !$student->login($nickmail, $password);

	// If has an error, reload page
	if($_SESSION["error"] == TRUE){
		header("Location: /pages/login.php");
	}
	// if not go to student's profile page.
	else{
		$_SESSION['student'] = $student;
		if(isset($_POST['remember'])){
			// Expire in 1 day
			setcookie("user", $student->getCookie(), time() + (86400 * 30), "/");
		}
		header("Location: /pages/main.php");
	}
?>