<?php
	// Import necessary files
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	if(!isset($_SESSION)) { session_start(); }

	// Catch all values to can singUp a student
	$name = $_POST['inputName'];
	$nickname = $_POST['inputNickname'];
	$password = $_POST['inputPassword'];
	$mail = $_POST['inputMail'];
	unset($_POST);

	// singUp a student
	$student = new Student();
	$_SESSION["error"] = !$student->signUP($name, $nickname, $password, $mail);

	// If has an error, reload page
	if($_SESSION["error"] == TRUE){
		header("Location: /index.php?page=signUp");
	}
	// if not, go to the main page.
	else{
		$_SESSION['student'] = $student;
		header("Location: /index.php?page=main");		
	}
?>