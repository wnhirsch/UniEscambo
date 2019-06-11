<?php
include_once $_SERVER['DOCUMENT_ROOT']."/db/database.php";

class Material{
	private $id;
	private $title;
	private $info;
	private $publish;
	private $student;
	private $university;
	private $program;
	private $course;

	# Getters
	public function getTitle(){ return $this->title; }
	public function getInfo(){ return $this->info; }

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

		echo "Error loading the Material.";
		return FALSE;
	}

	public function upload($title, $info, $student, $university, $program, $course){
		$auxStu = ($student == null) ? "NULL" : '$student';
		$auxUni = ($university == null) ? "NULL" : $university;
		$auxPro = ($program == null) ? "NULL" : $program;
		$auxCou = ($course == null) ? "NULL" : $course;
		$auxPub = date("Y-m-d H:i:s");

		$command = "INSERT INTO Material
		(title, info, publish, student, university, program, course)
		VALUES
		('$title', '$info', '$auxPub', $auxStu, $auxUni, $auxPro, $auxCou)";
		$db = new Database();
		$returnedId = $db->insert($command);

		if($returnedId != FALSE){
			$this->id = $returnedId;
			$this->title = $title;
			$this->info = $info;
			$this->publish = $auxPub;
			$this->student = $student;
			$this->university = $university;
			$this->program = $program;
			$this->course = $course;
			return TRUE;
		}
		return FALSE;
	}

	public function search($text, $student, $university, $program, $course){
		$command = "SELECT id FROM Material WHERE ";
		$command .= ($student == null)    ? "" : "student = '$student' AND ";
		$command .= ($university == null) ? "" : "university = $university AND ";
		$command .= ($program == null)    ? "" : "program = $program AND ";
		$command .= ($course == null)     ? "" : "course = $course AND ";

		$db = new Database();

		$materials = array();
		$wordList = explode(" ", $text);
		foreach($wordList as $key => $word) {
			if(strlen($word) > 2){
				$result = $db->runCommand($command
						. "(title LIKE '%$word%' OR info LIKE '%$word%')");
				if($result == TRUE){
					for($i = 0; $i < $result->num_rows; $i++) { 
						$materialDB = $result->fetch_assoc();
						$id = $materialDB['id'];
						if (isset($materials[$id]))
							$materials[$id]++;
						else
							$materials[$id] = 1;
					}
				}
			}
		}

		arsort($materials);
		return $materials;
	}


}
?>