<?php 

class DataBase
{
/*main folder in which the class database will create the databases IOW creates folders with the name of the given database*/
	private $DATABASE_FOLDER = "DB/";
	private $DATABASE_NAME;

	function _getDataBaseName(){
		return $this->DATABASE_NAME;
	}

	private function setDataBaseName($DB_name){
	 	$this->DATABASE_NAME = $DB_name;
	}

/*checks if directory already exists if not creates it*/
	function createDataBase($DB_name)
	{
	 	if (!file_exists($this->DATABASE_FOLDER . $DB_name)) {
		 	mkdir($this->DATABASE_FOLDER . $DB_name);
		 	$this->setDataBaseName($this->DATABASE_FOLDER . $DB_name);
		 	printf("%s Created\n",$DB_name);
	 	} else {
	 		echo "Database already exists \n";
	 	}
	}
/*checks wethere the folder exists and then deletes it*/
	function deleteDataBase($DB_name)
	{	
		if (file_exists($DB_name)) {
			foreach(glob($DB_name . '/*') as $file){
				unlink($file); 
			}
			rmdir($DB_name); 
			printf("%s DELETED \n",$DB_name) ;
		} else {
			echo "Databse does not exists \n";
		}
	}

/*switch between folder of the corresponding name*/
	function changeDatabase($DB_name){
		
	}
}
?>