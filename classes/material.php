<?php
include_once $_SERVER['DOCUMENT_ROOT']."/db/database.php";

class Material{
	private $id;
	private $title;
	private $info;
	private $publish;
	private $student;
	private $university = null;
	private $program = null;
	private $course = null;

	# Getters
	public function getId(){ return $this->id; }
	public function getTitle(){ return $this->title; }
	public function getInfo(){ return $this->info; }
	public function getDate(){ return date("d/m/Y H:i", strtotime($this->publish)); }
	public function getStudent(){ return $this->student; }
	public function getUniversity() { return $this->university; }
	public function getProgram() { return $this->program; }
	public function getCourse() { return $this->course; }

	public function load($id){
		$command = "SELECT * FROM Material WHERE id = $id";
		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE && $result->num_rows == 1){
			$courseDB = $result->fetch_assoc();
			$this->id = $courseDB['id'];
			$this->title = $courseDB['title'];
			$this->info = $courseDB['info'];
			$this->publish = $courseDB['publish'];
			$this->student = $courseDB['student'];
			$this->university = $courseDB['university'];
			$this->program = $courseDB['program'];
			$this->course = $courseDB['course'];

			return TRUE;
		}

		return FALSE;
	}

	public function upload($title, $info, $student, $university, $program, $course){
		$auxStu = ($student == null) ? "NULL" : $student;
		$auxUni = ($university == null) ? "NULL" : $university;
		$auxPro = ($program == null) ? "NULL" : $program;
		$auxCou = ($course == null) ? "NULL" : $course;

		$command = "INSERT INTO Material
		(title, info, publish, student, university, program, course)
		VALUES
		('$title', '$info', NOW(), '$auxStu', $auxUni, $auxPro, $auxCou)";
		$db = new Database();
		$returnedId = $db->insert($command);

		if($returnedId != FALSE){
			$this->id = $returnedId;
			$this->title = $title;
			$this->info = $info;
			$this->student = $student;
			$this->university = $university;
			$this->program = $program;
			$this->course = $course;
			return TRUE;
		}

		return FALSE;
	}

}
?>