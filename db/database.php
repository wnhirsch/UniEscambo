<?php
class Database{
	private $servername;
	private $username;
	private $password;
	private $dbname;
	private $port;
	
	function Database(){
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->dbname = "UNIESCAMBO";
		// $this->servername = "remotemysql.com";
		// $this->username = "OcREbskFYD";
		// $this->password = "G3EhrbZIkG";
		// $this->dbname = "OcREbskFYD";
		// $this->port = 3306;
	}

	function runCommand($command){
		// Create connection
		$conn = new mysqli($this->servername, $this->username, $this->password,
			$this->dbname/*, $this->port*/);
		// Check connection
		if ($conn->connect_error){
	    	die("Connection failed: " . $conn->connect_error);
		}
		$conn->set_charset('utf8');


		$result = $conn->query($command);
		if ($result == FALSE){
		    echo "Error: " . $command . "<br>" . $conn->error;
		}

		$conn->close();
		return $result;
	}

	function insert($command){
		// Create connection
		$conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if ($conn->connect_error){
	    	die("Connection failed: " . $conn->connect_error);
		}
		$conn->set_charset('utf8');

		$result = $conn->query($command);
		if ($result == FALSE){
		    echo "Error: " . $command . "<br>" . $conn->error;
		}
		else{
			$result = $conn->insert_id;
		}

		$conn->close();
		return $result;
	}
}

?>