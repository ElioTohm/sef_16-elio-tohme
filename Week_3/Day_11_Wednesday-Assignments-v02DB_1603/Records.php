<?php

class Records
{
	private $DATABASE_FOLDER = "DB";

	function addRecord($table_name, $records)
	{	
		$infoarray = self::fetchRecord($table_name);
		if(!self::searchForRecord($infoarray, $records[0])){
			$checkColumnNumberResult = self::checkColumnNumber($table_name, sizeof($records));
			if($checkColumnNumberResult == 0){
				$table = fopen("$table_name.csv", "a+");
				fputcsv($table, $records);
				fclose($table);
			}elseif($checkColumnNumberResult < 0){
				echo "You have added $checkColumnNumberResult more than it's needed \n";
			}else{
				echo "You have added " . abs($checkColumnNumberResult) . " less than it's needed \n";
			}
		}else{
			echo "Record already exists \n";
		}
	}

	function deleteRecord()
	{

	}

	function readRecord($table_name,$searchable)
	{
		$infoarray = self::fetchRecord($table_name);
		if($searchable != ""){
			if(self::searchForRecord($infoarray, $searchable)){
				print_r($infoarray[$searchable]);				
			}else{
				echo "Record not found \n";
			}
		}else{
			return $infoarray;
		}
	}

	private function checkColumnNumber($table_name, $sizeofinput)
	{
		$table = fopen("$table_name.csv", "r");
		$numberOfColmuns = sizeof(fgetcsv($table));
		fclose($table);
		return $numberOfColmuns - $sizeofinput;
	}

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
			return $table_to_array;	
		}elseif(basename(getcwd()) == $this->DATABASE_FOLDER){
			echo "Table does NOT exist \n";
		}else{
			echo "No database is selected USE database before reading \n";
		}
		
	}

	private function searchForRecord($recordarray,$searchable)
	{
		return array_key_exists($searchable, $recordarray);
	}
	// function file_get_contents_chunked($handle,$chunk_size)
	// {
	//     try
	//     {
	//         // $handle = fopen($file, "r");
	//         $i = 0;
	//         $x = 0;

	//         $chunk = array();
	//         while (!feof($handle)) {
	//             while ($row = fgets($handle)) {
	//                 // can parse further $row by usingstr_getcsv
	//                 $x ++;
	//                 $chunk[] = $row;
	//                 if ($x == $chunk_size) {          
	//  					print_r($chunk);
	//                     // call_user_func_array($callback, array($chunk, &$handle, $i));
	//                     // unset($chunk);
	//                     // $x = 0;
	//                 }         
	//             }
	//         }
	//         // fclose($handle);
	//     }
	//     catch(Exception $e)
	//     {
	//          trigger_error("file_get_contents_chunked::" . $e->getMessage(),E_USER_NOTICE);
	//          return false;
	//     }
	//     return true;
	// }

}

?>