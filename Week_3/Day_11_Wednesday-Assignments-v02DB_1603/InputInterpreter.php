<?php

class InputInterpreter
{

	function AnalyseLine($userInput,Database $db)
	{	
		$inputArray = explode(",",$userInput);
		switch($inputArray[0]) {
			case "CREATE":
				if(sizeof($inputArray) > 2 and $inputArray[1] == "DATABASE"){
					$db->createDataBase($inputArray[2]);
				}elseif(sizeof($inputArray) > 2 and $inputArray[1] == "TABLE"){
					$db->createTable(array_slice($inputArray, 2));
				}elseif(sizeof($inputArray) > 2 and $inputArray[1] == "ROW"){
					
				}else{
					echo "Unknown command please try again \n";
				}
				break;
			case "DELETE":
				if(sizeof($inputArray) > 2 and $inputArray[1] == "DATABASE" ){
					$db->deleteDataBase($inputArray[2]);
				}elseif(sizeof($inputArray) > 2 and $inputArray[1] == "TABLE"){
					$db->deleteTable($inputArray[2]);
				}else{
					echo "Unknown command please try again \n";
				}
				break;
			case "ADD":
				if(sizeof($inputArray) > 3){
					array_shift($inputArray);
					$tablename = $inputArray[0];
					array_shift($inputArray);
					$db->addRecord($tablename, $inputArray);
				}else{
					echo "Missing parameters \n";
				}
				break;
			case "USE":
				if(sizeof($inputArray) > 1){
						$db->changeDatabase($inputArray[1]);
				}else{
					echo "WRONG command please try again \n";
				}
				break;
			case "GET":
				if(sizeof($inputArray) == 2){
					print_r($db->readRecord($inputArray[1],""));
				}elseif(sizeof($inputArray) == 3){
					print_r($db->readRecord($inputArray[1], $inputArray[2]));
				}else{
					echo "Unknown command please try again \n";
				}
				break;
			case "test":
				
				break;
			default:
				echo "Unknown command please try again \n";
				break;
		}
	}

}

?>