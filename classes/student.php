<?php
include $_SERVER['DOCUMENT_ROOT']."/db/database.php";

class Student{
	private $name;
	private $nickname;
	private $mail;
	private $link;
	private $about;
	private $university;
	private $program;
	private $photo;
	public $isOnline = FALSE;

	function getName() { return $this->name; }

	# Verify if this user already exists on the database
	function alreadyExists($nickname, $mail){
		$db = new Database();
		$command = "SELECT * FROM Student WHERE nickname = '$nickname' || mail = '$mail'";
		$result = $db->runCommand($command);

		if($result == TRUE && $result->num_rows == 1){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	function login($nickmail, $password){
		if(stripos($nickmail, "@") == FALSE){
			$command = "SELECT * FROM Student WHERE nickname = '$nickmail' && password = '$password'";
		}
		else{
			$command = "SELECT * FROM Student WHERE mail = '$nickmail' && password = '$password'";
		}

		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE && $result->num_rows == 1){
			$studentDB = $result->fetch_assoc();
			$this->name = $studentDB['name'];
			$this->nickname = $studentDB['nickname'];
			$this->mail = $studentDB['mail'];
			$this->link = $studentDB['link'];
			$this->about = $studentDB['about'];
			$this->university = $studentDB['university'];
			$this->program = $studentDB['program'];
			$this->photo = $studentDB['photo'];
			$this->isOnline = TRUE;
		}
		else{
			$_SESSION['error'] = TRUE;
		}
	}

	function signUp($name, $nickname, $password, $mail){
		if($this->alreadyExists($nickname, $mail) == FALSE){
			$db = new Database();
			$command = "INSERT INTO Student(name,nickname,password,mail) VALUES"
		 		 	 . "('$name','$nickname','$password','$mail')";
		 	$db->runCommand($command);

			$this->nickname = $nickname;
			$this->password = $password;
			$this->name = $name;
			$this->mail = $mail;
		 	$this->isOnline = TRUE;
		}
		else{
			$_SESSION['error'] = TRUE;
		}
	}
}
?>
