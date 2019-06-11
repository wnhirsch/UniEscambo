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
					? "title LIKE '%$word%' OR info LIKE '%$word%'"
					: "name LIKE '%$word%' OR about LIKE '%$word%'");
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

?>