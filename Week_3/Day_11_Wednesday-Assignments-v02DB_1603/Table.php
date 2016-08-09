<?php
require_once "Records.php";

class Table extends Records
{
/*main folder in which the class database will create the databases IOW creates folders with the name of the given database*/
	private $DATABASE_FOLDER = "DB";

/*checks i files exists and than create a file in with the name of the table and write first lines as header of the table*/
	function createTable($table_name_array)
	{	if(self::checkCurrentDB()){
			if(!file_exists("$table_name_array[0].csv")){
				$tablename = $table_name_array[0];
				array_shift($table_name_array);
		 		$table = fopen("$tablename.csv", "w");
		 		$header = implode(",",$table_name_array);
		 		fwrite($table, $header."\n");
		 		fclose($table);
		 		echo "$tablename CREATED \n";
	 		}else{
	 			echo "Table already exists \n";
	 		}
		}else{
			echo "Please enter a database to use \n";
		}
	}
/*checks if file exists and than deletes it*/
	function deleteTable($table_name)
	{
		if(file_exists("$table_name.csv")){
			unlink("$table_name.csv");
			echo "$table_name DELETED \n";
		}else{
			echo "$table_name does not exists \n";
		}
	}
/*check if files exists in the current database*/
	private function checkCurrentDB(){
		if(basename(getcwd()) == $this->DATABASE_FOLDER){
			return false;
		}elseif(!file_exists($this->DATABASE_FOLDER)){
			return true;
		}
	}
}
?>