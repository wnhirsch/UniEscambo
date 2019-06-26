<?php
	// Import necessary files
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/material.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/file.php";
	if(!isset($_SESSION)) { session_start(); }

	// Catch all values to upload a material
	$title 		= $_POST['inputTitle'];
	$info 		= $_POST['inputInfo'];
	$student 	= $_SESSION["student"]->getNickname();
	$university = $_POST['inputUni'];
	$program 	= $_POST['inputProgram'];
	$course 	= $_POST['inputCourse'];
	unset($_POST);

	// upload material
	$material = new Material();
	$_SESSION["error"] = !$material->upload($title, $info, $student, $university, $program, $course);

	// upload files
	if(isset($_FILES["inputFiles"])){
		$target_dir = $_SERVER['DOCUMENT_ROOT']."/uploads/";
		$matID = $material->getId();
		for ($index = 0; $index < count($_FILES["inputFiles"]["name"]); $index++) { 
			$file = new File();
			$file_name = $_FILES["inputFiles"]['name'][$index];
			$_SESSION["error"] = $_SESSION["error"] ||
								!$file->upload($matID, $target_dir, $file_name);

			$file_tmp = $_FILES["inputFiles"]['tmp_name'][$index];
			move_uploaded_file($file_tmp, $file->getLocation());
			echo $file->getLocation() . "<br>";
		}
	}

	// If has an error, reload page
	if($_SESSION["error"] == TRUE){
		header("Location: /index.php?page=upload");
	}
	// if not go to this material page.
	else{
		$matID = $material->getId();
		header("Location: /index.php?page=show_material&&id=$matID&&now=");
	}
?>