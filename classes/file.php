<?php
include_once $_SERVER['DOCUMENT_ROOT']."/db/database.php";

class File{
	private $id = null;
	private $material;
	private $filedir;
	private $filename;

	# Getters
	public function getId(){ return $this->id; }
	public function getFilename(){ return $this->filename; }
	public function getLocation(){
		$file_format = substr($this->filename, stripos($this->filename, ".") - strlen($this->filename));
		return $this->filedir . "$this->material" . "-" . "$this->id" . $file_format;
	}
	public function getLink(){
		$file_format = substr($this->filename, stripos($this->filename, ".") - strlen($this->filename));
		$filelink = "http://".$_SERVER['SERVER_NAME']."/uploads/";
		return $filelink . "$this->material" . "-" . "$this->id" . $file_format;
	}

	public function load($id){
		$command = "SELECT * FROM File WHERE id = $id";
		$db = new Database();
		$result = $db->runCommand($command);

		if($result == TRUE && $result->num_rows == 1){
			$fileDB = $result->fetch_assoc();
			$this->id = $fileDB['id'];
			$this->material = $fileDB['material'];
			$this->filedir = $fileDB['filedir'];
			$this->filename = $fileDB['filename'];

			return TRUE;
		}

		return FALSE;
	}

	public function upload($material, $filedir, $filename){
		$command = "INSERT INTO File (material, filedir, filename) VALUES ($material, '$filedir', '$filename')";
		$db = new Database();
		$returnedID = $db->insert($command);

		if($returnedID != FALSE){
			$this->id = $returnedID;
			$this->material = $material;
			$this->filedir = $filedir;
			$this->filename = $filename;
			return TRUE;
		}

		return FALSE;
	}





}
?>