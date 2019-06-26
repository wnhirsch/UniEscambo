<?php
include_once $_SERVER['DOCUMENT_ROOT']."/db/database.php";

function search($text, $option){
	if($option < 1 || $option > 4){
		return FALSE;
	}

	$aux  = "SELECT id FROM ";
	$aux .= ($option == 1) ? "Material WHERE "   : "";
	$aux .= ($option == 2) ? "Course WHERE "     : "";
	$aux .= ($option == 3) ? "Program WHERE "    : "";
	$aux .= ($option == 4) ? "University WHERE " : "";
	$db = new Database();

	$result = array();
	$wordList = explode(" ", $text);
	foreach($wordList as $key => $word) {
		if(strlen($word) > 2){
			$command = $aux . (($option == 1)
					? "title LIKE '%$word%'"
					: "name LIKE '%$word%'");
			$conn = $db->runCommand($command);
			if($conn == TRUE){
				for($i = 0; $i < $conn->num_rows; $i++) {
					$returnDB = $conn->fetch_assoc();
					$id = $returnDB['id'];
					if (isset($result[$id]))
						$result[$id]++;
					else
						$result[$id] = 10;
				}
			}
			$command = $aux . (($option == 1)
					? "info LIKE '%$word%'"
					: "about LIKE '%$word%'");
			$conn = $db->runCommand($command);
			if($conn == TRUE){
				for($i = 0; $i < $conn->num_rows; $i++) {
					$returnDB = $conn->fetch_assoc();
					$id = $returnDB['id'];
					if (isset($result[$id]))
						$result[$id]++;
					else
						$result[$id] = 1;
				}
			}
		}
	}

	arsort($result);
	return $result;
}

function getAll_Uni(){
	$command = "SELECT id, name FROM University";
	$db = new Database();
	$conn = $db->runCommand($command);

	$result = array();
	if($conn == TRUE){
		for($i = 0; $i < $conn->num_rows; $i++) {
			$returnDB = $conn->fetch_assoc();
			$id   = $returnDB['id'];
			$name = $returnDB['name'];
			$result[$id] = $name;
		}
	}

	return $result;
}

function getAll_Program(){
	$command = "SELECT id, name FROM Program";
	$db = new Database();
	$conn = $db->runCommand($command);

	$result = array();
	if($conn == TRUE){
		for($i = 0; $i < $conn->num_rows; $i++) {
			$returnDB = $conn->fetch_assoc();
			$id   = $returnDB['id'];
			$name = $returnDB['name'];
			$result[$id] = $name;
		}
	}

	return $result;
}

function getAll_Course(){
	$command = "SELECT id, name FROM Course";
	$db = new Database();
	$conn = $db->runCommand($command);

	$result = array();
	if($conn == TRUE){
		for($i = 0; $i < $conn->num_rows; $i++) {
			$returnDB = $conn->fetch_assoc();
			$id   = $returnDB['id'];
			$name = $returnDB['name'];
			$result[$id] = $name;
		}
	}

	return $result;
}

function getUser_Materials($nickname){
	$command = "SELECT id FROM Material WHERE student = '$nickname' ORDER BY publish DESC";
	$db = new Database();
	$conn = $db->runCommand($command);

	$result = array();
	if($conn == TRUE){
		for($index = 0; $index < $conn->num_rows; $index++) {
			$returnDB = $conn->fetch_assoc();
			$result[$returnDB['id']] = 1;
		}
	}

	return $result;
}

function getMaterialFiles($material){
	$command = "SELECT * FROM File WHERE material = $material";
	$db = new Database();
	$conn = $db->runCommand($command);

	$result = array();
	if($conn == TRUE){
		for($i = 0; $i < $conn->num_rows; $i++) {
			$returnDB = $conn->fetch_assoc();
			$id   = $returnDB['id'];
			$file = new File();
			$file->load($id);
			$result[$id] = $file;
		}
	}

	return $result;
}

?>
