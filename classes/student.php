<?php
include_once $_SERVER['DOCUMENT_ROOT']."/db/database.php";

class Student{
	private $name;
	private $nickname;
	private $password;
	private $mail;
	private $link = "";
	private $about = "";
	private $university = null;
	private $program = null;
	private $courses = array();
	private $status = FALSE;

	# Getters
	public function getName() { return $this->name; }
	public function getNickname() { return $this->nickname; }
	public function getMail() { return $this->mail; }
	public function getLink() { return $this->link; }
	public function getAbout() { return $this->about; }
	public function getUniversity() { return $this->university; }
	public function getProgram() { return $this->program; }
	public function getCourses() { return $this->courses; }
	public function getCookie(){ return "$this->nickname $this->password"; }
	public function isOnline() { return $this->status; }

	public function login($nickmail, $password){
		if(stripos($nickmail, "@") == FALSE){
			$command = "SELECT * FROM Student
			WHERE nickname = '$nickmail' AND password = '$password'";
		}
		else{
			$command = "SELECT * FROM Student
			WHERE mail = '$nickmail' AND password = '$password'";
		}

		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE && $result->num_rows == 1){
			$studentDB = $result->fetch_assoc();
			$this->name = $studentDB['name'];
			$this->nickname = $studentDB['nickname'];
			$this->password = $studentDB['password'];
			$this->mail = $studentDB['mail'];
			$this->link = $studentDB['link'];
			$this->about = $studentDB['about'];
			$this->university = $studentDB['university'];
			$this->program = $studentDB['program'];
			$this->photo = $studentDB['photo'];
			$this->status = TRUE;
			$this->loadCourses();
			return TRUE;
		}
		return FALSE;
	}

	public function signUp($name, $nickname, $password, $mail){
		if($this->alreadyExists($nickname, $mail) == FALSE){
			$command = "INSERT INTO Student(name,nickname,password,mail) 
			VALUES ('$name','$nickname','$password','$mail')";
			$db = new Database();
		 	$result = $db->runCommand($command);

		 	if($result == TRUE){
				$this->nickname = $nickname;
				$this->password = $password;
				$this->name = $name;
				$this->mail = $mail;
			 	$this->status = TRUE;
			 	return TRUE;
		 	}
		}
		return FALSE;
	}

	public function lessInfo(){
		if($this->link == null || $this->about == null || $this->university == null
			|| $this->program == null || $this->photo == null){
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	# Verify if this user already exists on the database
	private function alreadyExists($nickname, $mail){
		$command = "SELECT * FROM Student
		WHERE nickname = '$nickname' OR mail = '$mail'";
		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE && $result->num_rows == 1){
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function isSubscribed($course){
		if(isset($this->courses[$course]))
			return TRUE;
		else
			return FALSE;
	}

	public function loadCourses(){
		$command = "SELECT course FROM Student_Course
		WHERE student = '$this->nickname'";

		$db = new Database();
		$result = $db->runCommand($command);
		for ($i = 0; $i < $result->num_rows; $i++) {
			$row = $result->fetch_assoc();
			$this->courses[$row['course']] = TRUE;
		}
	}

	public function addCourse($id){
		$command = "INSERT INTO Student_Course (course, student)
		VALUES ($id, '$this->nickname')";
		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE){
			$this->courses[$id] = TRUE;
			return TRUE;
		}
		return FALSE;
	}

	public function remCourse($id){
		$command = "DELETE FROM Student_Course
		WHERE (course = $id AND student = '$this->nickname')";
		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE){
			unset($this->courses[$id]);
			return TRUE;
		}
		return FALSE;
	}

}
?>
