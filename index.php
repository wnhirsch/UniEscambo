<?php
	// "/home/grad/wnhirsch/UniEscambo"
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/material.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/course.php";
	if(!isset($_SESSION)) { session_start(); }

	// Init all important variables to a session
	$_SESSION["student"] = new Student();
	$_SESSION["admin"] = null;
	$_SESSION["error"] = FALSE;

	if($_GET["exit"] == "TRUE"){
		setcookie("user", "", time() - 3600); // Delete cookie
		header("Location: /pages/home.php");
	}
	else if(isset($_COOKIE["user"])){
		$login = explode(" ", $_COOKIE["user"]);
		$_SESSION["student"]->login($login[0], $login[1]);
		setcookie("user", $_COOKIE["user"], time() + (86400 * 30)); // Restart
		header("Location: /pages/main.php");
	}
	else {
		header("Location: /pages/home.php");
	}
?>

