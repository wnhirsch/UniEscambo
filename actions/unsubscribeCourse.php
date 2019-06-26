<?php
	// Import necessary files
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	if(!isset($_SESSION)) { session_start(); }

	// Catch all values to unsubscribe the student to a course
	$id = $_POST['id'];
	unset($_POST);

	// unsubscribe course
	$_SESSION["error"] = !$_SESSION["student"]->remCourse($id);

	// If has an error, go to the main page
	if($_SESSION["error"] == TRUE){
		header("Location: /index.php?page=main");
	}
	// if not, go to the student's courses page
	else{
		header("Location: /index.php?page=user_course");
	}
?>