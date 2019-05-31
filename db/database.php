<?php
class Database{
	private $servername;
	private $username;
	private $password;
	private $dbname;
	
	function Database(){
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "UNIESCAMBO";
	}

	function runCommand($command){
		// Create connection
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if ($conn->connect_error){
	    	die("Connection failed: " . $conn->connect_error);
		}

		$result = $conn->query($command);
		if ($result == FALSE){
		    echo "Error: " . $command . "<br>" . $conn->error;
		}

		$conn->close();
		return $result;
	}
}

?>