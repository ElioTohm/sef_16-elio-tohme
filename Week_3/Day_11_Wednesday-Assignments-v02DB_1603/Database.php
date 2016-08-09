<?php
require_once "Table.php";

class  DataBase extends Table
{
/*main folder in which the class database will create the databases IOW creates folders with the name of the given database*/
	private $DATABASE_RELATIVE_LOCATION = "~/Day_11_Wednesday-Assignments-v02DB_1603/DB" 
	private $DATABASE_FOLDER = "DB";

/*checks if directory already exists if not creates it*/
	function createDataBase($DB_name)
	{
		self::goToDBPool();
	 	if(!file_exists("$DB_name")){
		 	mkdir("$DB_name");
		 	chdir("$DB_name");
		 	echo "$DB_name CREATED \n";
	 	}else{
	 		echo "Database already exists \n";
	 	}
	}
/*checks wethere the folder exists and then deletes it*/
	function deleteDataBase($DB_name)
	{	
		self::goToDBPool();		
		if(file_exists($DB_name)){
			foreach(glob($DB_name . '/*') as $file){ 
				// if(is_dir($file)) rrmdir($file); else 
				unlink($file); 
			} 
			rmdir($DB_name); 
			echo "$DB_name DELETED \n";
		}else{
			echo "Databse does not exists \n";
		}
	}
/*change directory to DB folder in which all the databases resides*/
	private function goToDBPool(){
		if(file_exists($this->DATABASE_FOLDER)){
			chdir($this->DATABASE_FOLDER);
		}else{
			chdir(dirname(getcwd()));
			self::goToDBPool();
		}
	}
/*switch between folder of the corresponding name*/
	function changeDatabase($DB_name){
		self::goToDBPool();
		if(file_exists($DB_name)){
			chdir($DB_name);
		}else{
			chdir(dirname(getcwd()));
			self::goToDBPool();
		}
		if(basename(getcwd())!=$DB_name){
			echo "Database $DB_name does NOT exist \n";
		}
	}
}

?>