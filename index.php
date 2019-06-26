<?php
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/student.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/material.php";
	include_once $_SERVER['DOCUMENT_ROOT']."/classes/course.php";

	if(!isset($_SESSION)) { session_start(); }

	if(!isset($_SESSION["student"])){
		$_SESSION["student"] = new Student();

		if(isset($_COOKIE["user"])){
			$login = explode(" ", $_COOKIE["user"]);
			$_SESSION["student"]->login($login[0], $login[1]);
			setcookie("user", $_COOKIE["user"], time() + (86400 * 30)); // Restart
		}
		else{
			setcookie("user", "", time() - 3600); // Delete cookie
		}

	}
	if(!isset($_SESSION["error"])){ $_SESSION["error"] = FALSE; }

	if ($_SESSION["student"]->isOnline()) {
		if(!isset($_GET["page"])){
			include $_SERVER['DOCUMENT_ROOT']."/pages/main.php";
			return;
		}

		switch ($_GET["page"]) {
			case "profile":
				include $_SERVER['DOCUMENT_ROOT']."/pages/profile.php";
				break;
			case "main":
				include $_SERVER['DOCUMENT_ROOT']."/pages/main.php";
				break;
			case "upload":
				include $_SERVER['DOCUMENT_ROOT']."/pages/upload.php";
				break;
			case "user_material":
				include $_SERVER['DOCUMENT_ROOT']."/pages/user_material.php";
				break;
			case "show_material":
				include $_SERVER['DOCUMENT_ROOT']."/pages/show_material.php";
				break;
			case "user_course":
				include $_SERVER['DOCUMENT_ROOT']."/pages/user_course.php";
				break;
			case "exit":
				setcookie("user", "", time() - 3600); // Delete cookie
				$_SESSION["student"] = new Student();
				include $_SERVER['DOCUMENT_ROOT']."/pages/home.php";
				break;
			default:
				include $_SERVER['DOCUMENT_ROOT']."/pages/main.php";
				break;
		}

		return;
	}

	if(!isset($_GET["page"])){
		include $_SERVER['DOCUMENT_ROOT']."/pages/home.php";
		return;
	}

	switch ($_GET["page"]) {
		case "login":
			include $_SERVER['DOCUMENT_ROOT']."/pages/login.php";
			break;
		case "signUp":
			include $_SERVER['DOCUMENT_ROOT']."/pages/signUp.php";
			break;
		default:
			include $_SERVER['DOCUMENT_ROOT']."/pages/home.php";
			break;
	}

	return;
?>

