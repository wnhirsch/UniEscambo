<?php
	include $_SERVER['DOCUMENT_ROOT']."/classes/student.php";

	session_start();
	$_SESSION["student"] = new Student();
	$_SESSION["admin"] = null;
	$_SESSION['error'] = FALSE;

	header("Location: /pages/home.php");
?>