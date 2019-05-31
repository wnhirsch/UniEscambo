<?php
	include $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	session_start();
	$_SESSION['error'] = FALSE;
	$_SESSION['student']->login($_POST['inputNickmail'], $_POST['inputPassword']);

	if($_SESSION['error'] == TRUE){
		header("Location: /pages/login.php");
	}
	else{
		header("Location: /pages/profile.php");		
	}
?>