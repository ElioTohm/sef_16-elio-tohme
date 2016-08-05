<?php
require_once "Table.php";

class  DataBase extends Table
{
	private $DATABASE_FOLDER = "DB";

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

	private function goToDBPool(){
		if(file_exists($this->DATABASE_FOLDER)){
			chdir($this->DATABASE_FOLDER);
		}else{
			chdir(dirname(getcwd()));
			self::goToDBPool();
		}
	}

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