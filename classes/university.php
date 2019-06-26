<?php
include_once $_SERVER['DOCUMENT_ROOT']."/db/database.php";

class University{
	private $id = null;
	private $name;
	private $link;
	private $about;
	private $address;

	# Getters
	public function getName() { return $this->name; }
	public function getLink() { return $this->link; }
	public function getAbout() { return $this->about; }
	public function getAddress() { return $this->address; }

	public function load($id){
		$command = "SELECT * FROM University WHERE id = $id";
		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE && $result->num_rows == 1){
			$uniDB = $result->fetch_assoc();
			$this->id = $uniDB['id'];
			$this->name = $uniDB['name'];
			$this->link = $uniDB['link'];
			$this->about = $uniDB['about'];
			$this->address = $uniDB['address'];

			return TRUE;
		}
		
		return FALSE;
	}
}
?>