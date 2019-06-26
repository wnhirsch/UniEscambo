<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	if(!isset($_SESSION)) { session_start(); }

	$id = $_POST['id'];

	$_SESSION["error"] = !$_SESSION["student"]->addCourse($id);

	if($_SESSION["error"] == TRUE){
		header("Location: /index.php?page=main");
	}
	else{
		header("Location: /index.php?page=user_course");
	}
?>