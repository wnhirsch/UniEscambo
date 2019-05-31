<?php
	include $_SERVER['DOCUMENT_ROOT']."/classes/student.php";

	session_start();
	$_SESSION["student"]->signUp($_POST['inputName'],
								$_POST['inputNickname'],
								$_POST['inputPassword'],
								$_POST['inputEmail']);

	header("Location: /pages/profile.php");
?>