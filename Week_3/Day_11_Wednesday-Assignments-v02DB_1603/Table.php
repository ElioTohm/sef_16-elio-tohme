<?php
require_once "Records.php";

class Table extends Records
{
	private $DATABASE_FOLDER = "DB";

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

	function deleteTable($table_name)
	{
		if(file_exists("$table_name.csv")){
			unlink("$table_name.csv");
			echo "$table_name DELETED \n";
		}else{
			echo "$table_name does not exists \n";
		}
	}

	private function checkCurrentDB(){
		if(basename(getcwd()) == $this->DATABASE_FOLDER){
			return false;
		}elseif(!file_exists($this->DATABASE_FOLDER)){
			return true;
		}
	}
}
?>