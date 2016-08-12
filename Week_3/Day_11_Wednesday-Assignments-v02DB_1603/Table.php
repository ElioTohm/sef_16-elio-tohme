<?php

class Table 
{

/*checks i files exists and than create a file in with the name of the table and write first lines as header of the table*/
	function createTable($table_name_array,$DB_name)
	{	if(self::checkIfInDB()){
			if (!file_exists($DB_name."/$table_name_array[0].csv")) {
				$tablename = $table_name_array[0];
				array_shift($table_name_array);
		 		$table = fopen("$tablename.csv", "w");
		 		$header = implode(",",$table_name_array);
		 		fwrite($table, $header."\n");
		 		fclose($table);
		 		echo "$tablename CREATED \n";
	 		} else {
	 			echo "Table already exists \n";
	 		}
		} else {
			echo "Please enter a database to use \n";
		}
	}
/*checks if file exists and than deletes it*/
	function deleteTable($table_name,$DB_name)
	{
		if (file_exists($DB_name."/$table_name.csv")) {
			unlink("$table_name.csv");
			echo "$table_name DELETED \n";
		} else {
			echo "$table_name does not exists \n";
		}
	}
/*check if files exists in the current database*/
	private function checkIfInDB($DB_name){
		if (empty($DB_name)) {
			return false;
		} else {
			return true;
		}
	}
}
?>