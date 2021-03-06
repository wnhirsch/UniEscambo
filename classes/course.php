<?php
include_once $_SERVER['DOCUMENT_ROOT']."/db/database.php";

class Course{
	private $id = null;
	private $name;
	private $about;

	# Getters
	public function getName() { return $this->name; }
	public function getAbout() { return $this->about; }

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
		
		return FALSE;
	}

}
?>