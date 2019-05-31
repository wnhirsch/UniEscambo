<?php
	include $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	session_start();

	// Activate error checking and perform student's login
	$_SESSION['error'] = FALSE;
	$_SESSION['student']->login($_POST['inputNickmail'], $_POST['inputPassword']);

	// If has an error, reload page
	if($_SESSION['error'] == TRUE){
		header("Location: /pages/login.php");
	}
	// if not go to student's profile page.
	else{
		header("Location: /pages/profile.php");		
	}
?>