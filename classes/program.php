<?php
include_once $_SERVER['DOCUMENT_ROOT']."/db/database.php";

class Program{
	private $id = null;
	private $name;
	private $about;

	# Getters
	public function getName() { return $this->name; }
	public function getAbout() { return $this->about; }

	public function load($id){
		$command = "SELECT * FROM Program WHERE id = $id";
		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE && $result->num_rows == 1){
			$programDB = $result->fetch_assoc();
			$this->id = $programDB['id'];
			$this->name = $programDB['name'];
			$this->about = $programDB['about'];

			return TRUE;
		}
		
		return FALSE;
	}
}
?>