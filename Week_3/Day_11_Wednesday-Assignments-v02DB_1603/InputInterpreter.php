<?php

class InputInterpreter
{

/*function analyseLine takes the line into array and analyse the input of the user by calling the functions of database object respectively*/
	function AnalyseLine($userInput,Database $db)
	{	
		$inputArray = explode(",",$userInput);
		switch($inputArray[0]) {
			case "CREATE":
				if(sizeof($inputArray) > 2 and $inputArray[1] == "DATABASE"){
					$db->createDataBase($inputArray[2]);
				}elseif(sizeof($inputArray) > 3 and $inputArray[1] == "TABLE"){
					$db->createTable(array_slice($inputArray, 2));
				}elseif(sizeof($inputArray) > 2 and $inputArray[1] == "ROW"){
					
				}else{
					echo "Unknown/Missing command please try again \n";
				}
				break;
			case "DELETE":
				if(sizeof($inputArray) > 2 and $inputArray[1] == "DATABASE" ){
					$db->deleteDataBase($inputArray[2]);
				}elseif(sizeof($inputArray) > 2 and $inputArray[1] == "TABLE"){
					$db->deleteTable($inputArray[2]);
				}elseif(sizeof($inputArray) > 2 and $inputArray[1] == "ROW"){
					$db->deleteRecord($inputArray[2],$inputArray[3]);
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
			default:
				echo "Unknown command please try again \n";
				break;
		}
	}

}

?>