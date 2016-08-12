<?php 
class Records
{
/*main folder in which the class database will create the databases IOW creates folders with the name of the given database*/
	private $DATABASE_FOLDER = "DB/";

/*checks if line's ID already exists than write line to file*/
	function addRecord($table_name, $records)
	{	
		$infoarray = self::fetchRecord($table_name);
		if(sizeof($infoarray)>0){
			if(!self::searchForRecord($infoarray, $records[0])){
				$checkColumnNumberResult = self::checkColumnNumber($table_name, sizeof($records));
				if($checkColumnNumberResult == 0){
					$table = fopen("$table_name.csv", "a");
					fputcsv($table, $records);
					fclose($table);
				}elseif($checkColumnNumberResult < 0){
					echo "You have added " . abs($checkColumnNumberResult) . " more than it's 	needed \n";
				}else{	
					echo "You have added " . abs($checkColumnNumberResult) . " less than it's needed \n";
				}
			}else{
				echo "Record already exists \n";
			}
		}
	}

/*retrieve the file as an array search for the @$searchable and deletes it from the array than rewrite the update array in the file*/
	function deleteRecord($table_name,$searchable)
	{
		$tableinfo = self::fetchRecord($table_name);
		$resultarray = array();
		if($searchable != ""){
			if(self::searchForRecord($tableinfo, $searchable)){
				unset($tableinfo[$searchable]);
				foreach($tableinfo as $key => $value) {
					$valuetostring = implode(",", $value);
					array_push($resultarray, "$key,$valuetostring");
				}
				$table = fopen("$table_name.csv", "w");
				foreach($resultarray as $value){
					$line = explode(",", $value);
					fputcsv($table, $line);
				}
				fclose($table);
			}else{
				echo "Record not found \n";
			}
		}else{
			echo "Please specify a record to delete \n";;
		}
	}

/*uses fetchRecord & searchForRecord to retreive the searched record/line from the file/table*/
	function readRecord($table_name,$searchable)
	{
		$infoarray = self::fetchRecord($table_name);
		if($searchable != ""){
			if(self::searchForRecord($infoarray, $searchable)){
				return $infoarray[$searchable];				
			}else{
				echo "Record not found \n";
			}
		}else{
			return $infoarray;
		}
	}

/*checks the first line column number*/
	private function checkColumnNumber($table_name, $sizeofinput)
	{
		$table = fopen("$table_name.csv", "r");
		$numberOfColmuns = sizeof(fgetcsv($table));
		fclose($table);
		return $numberOfColmuns - $sizeofinput;
	}

/*read line by line the file given and puts the first column of the corresponding line as a key in the array*/
	private function fetchRecord($table_name)
	{
		$table_to_array = array();
		if(file_exists("$table_name.csv")){
			$table_file = fopen("$table_name.csv","r");
			while ($line = fgetcsv($table_file)){
				$key = array_shift($line);
				$table_to_array[$key] = $line;
			}
			fclose($table_file);
		}elseif(basename(getcwd()) == $this->DATABASE_FOLDER){
			echo "Table does NOT exist \n";
		}else{
			echo "Table does NOT exist \n";
		}
		return $table_to_array;		
	}

/*search if the searchable exists as a key in the given array*/
	private function searchForRecord($recordarray,$searchable)
	{
		return array_key_exists($searchable, $recordarray);
	}
}

?>
