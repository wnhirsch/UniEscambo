<?php
	include $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	session_start();

	// Activate error checking and perform student's signUp
	$_SESSION['error'] = FALSE;
	$_SESSION["student"]->signUp($_POST['inputName'],
								$_POST['inputNickname'],
								$_POST['inputPassword'],
								$_POST['inputEmail']);

	// If has an error, reload page
	if($_SESSION['error'] == TRUE){
		header("Location: /pages/signUp.php");
	}
	// if not go to student's profile page.
	else{
		header("Location: /pages/profile.php");		
	}
?>