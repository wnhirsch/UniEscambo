<?php
include_once $_SERVER['DOCUMENT_ROOT']."/db/database.php";

class Course{
	private $id = null;
	private $name;
	private $about;

	# Getters
	public function getName() { return $this->name; }
	public function getAbout() { return $this->about; }

	public function create($name, $about){
		$command = "INSERT INTO Course (name, about) VALUES ('$name', '$about')";
		$db = new Database();
		$returnedId = $db->insert($command);

		if($returnedId != FALSE){
			$this->id = $returnedId;
			$this->name = $name;
			$this->about = $about;
			return TRUE;
		}

		echo "Error creating a new Course.";
		return FALSE;
	}

	public function editName($name){
		if($this->id == null){
			echo "Course no initialized.";
			return FALSE;
		}

		$command = "UPDATE Course SET name = '$name' WHERE id = $this->id";
		$db = new Database();
		$db->runCommand($command);

		return TRUE;
	}

	public function editAbout($about){
		if($this->id == null){
			echo "Course no initialized.";
			return FALSE;
		}

		$command = "UPDATE Course SET about = '$about' WHERE id = $this->id";
		$db = new Database();
		$db->runCommand($command);

		return TRUE;
	}

	public function load($id){
		$command = "SELECT * FROM Course WHERE id = $id";
		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE && $result->num_rows == 1){
			$courseDB = $result->fetch_assoc();
			$this->id = $courseDB['id'];
			$this->name = $courseDB['name'];
			$this->about = $courseDB['about'];

			return TRUE;
		}

		echo "Error loading the Course.";
		return FALSE;
	}

}
?>