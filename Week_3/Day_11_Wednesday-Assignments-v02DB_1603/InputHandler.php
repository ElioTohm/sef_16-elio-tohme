<?php 

require_once "DataBase.php";
require_once "Table.php";
require_once "Record.php";

class InputHandler
{
	private $DATABASE;
	private $TABLE;
	private $RECORD; 

	function __construct()
	{
		$this->DATABASE = new Database();
		$this->TABLE = new Table();
		$this->RECORD = new Record(); 		
	}
	
	/*function analyseLine takes the line into array and analyse the input of the user by calling the functions of database object respectively*/
	function AnalyseLine($userInput)
	{	
		$inputArray = explode(",",$userInput);
		switch($inputArray[0]) {
			case "CREATE":
				if (sizeof($inputArray) > 2 and $inputArray[1] == "DATABASE") {
					$this->DATABASE->createDataBase($inputArray[2]);
				} elseif (sizeof($inputArray) > 3 and $inputArray[1] == "TABLE") {
					$this->TABLE->createTable(array_slice($inputArray, 2), $this->DATABASE->_getDataBaseFolder().$this->DATABASE->_getDataBaseName());
				}else{
					echo "Unknown/Missing command please try again \n";
				}
				break;
			case "DELETE":
				if (sizeof($inputArray) > 2 and $inputArray[1] == "DATABASE" ) {
					$this->DATABASE->deleteDataBase($inputArray[2]);
				} elseif (sizeof($inputArray) > 2 and $inputArray[1] == "TABLE") {
					$this->TABLE->deleteTable($inputArray[2]);
				} elseif (sizeof($inputArray) > 2 and $inputArray[1] == "ROW") {
					$this->RECORD->deleteRecord($inputArray[2],$inputArray[3]);
				} else {
					echo "Unknown command please try again \n";
				}
				break;
			case "ADD":
				if (sizeof($inputArray) > 3) {
					array_shift($inputArray);
					$tablename = $inputArray[0];
					array_shift($inputArray);
					$this->RECORD->setTableName($this->DATABASE->_getDataBaseFolder());
					$this->RECORD->addRecord($tablename, $inputArray);
				} else {
					echo "Missing parameters \n";
				}
				break;
			case "USE":
				if (sizeof($inputArray) > 1) {
						$this->DATABASE->setDataBaseName($inputArray[1]);
				} else {
					echo "WRONG command please try again \n";
				}
				break;
			case "GET":
				if (sizeof($inputArray) == 2) {
					print_r($this->RECORD->readRecord($inputArray[1],""));
				} elseif (sizeof($inputArray) == 3) {
					print_r($this->RECORD->readRecord($inputArray[1], $inputArray[2]));
				} else {
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
