<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	if(!isset($_SESSION)) { session_start(); }

	$name = $_POST['inputName'];
	$nickname = $_POST['inputNickname'];
	$password = $_POST['inputPassword'];
	$mail = $_POST['inputEmail'];

	$student = new Student();
	$_SESSION["error"] = !$student->signUP($name, $nickname, $password, $mail);

	// If has an error, reload page
	if($_SESSION["error"] == TRUE){
		header("Location: /pages/signUp.php");
	}
	// if not go to student's profile page.
	else{
		$_SESSION['student'] = $student;
		header("Location: /pages/main.php");		
	}
?>