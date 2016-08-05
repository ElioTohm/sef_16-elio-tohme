<?php

class Records
{
	function addRecord($table_name, $records)
	{	
		$checkColumnNumberResult = self::checkColumnNumber($table_name, sizeof($records));
		if($checkColumnNumberResult == 0){
			$table = fopen("$table_name.csv", "a+");
			fputcsv($table, $records);
			fclose($table);
		}elseif($checkColumnNumberResult > 0){
			echo "You have added $checkColumnNumberResult more than it's needed \n";
		}else{
			echo "You have added " . abs($checkColumnNumberResult) . " less than it's needed \n";
		}
		
	}

	function deleteRecord()
	{

	}

	function readRecord($table_name)
	{
		$table = fopen("$table_name.csv", "r");
		self::file_get_contents_chunked($table,2);
		fclose($table_name);
	}

	private function checkColumnNumber($table_name, $sizeofinput)
	{
		$table = fopen("$table_name.csv", "r");
		$numberOfColmuns = sizeof(fgetcsv($table));
		fclose($table);
		return $numberOfColmuns - $sizeofinput;
	}

	private function fetchRecord()
	{
		$table_to_array = array();
		$table_file = fopen("$table_name.csv","r");
		while ($line = fgetcsv($table_file)){
			$key = array_shift($line);
			$table_to_array[$key] = $line;
		}
		fclose($table_file);
	}

	private function searchForRecord($recordarray,$searchable)
	{
		if(array_key_exists($searchable, $recordarray)){
			return true;
		}else{
			return false;
		}
	}

	function file_get_contents_chunked($handle,$chunk_size)
	{
	    try
	    {
	        // $handle = fopen($file, "r");
	        $i = 0;
	        $x = 0;

	        $chunk = array();
	        while (!feof($handle)) {
	            while ($row = fgets($handle)) {
	                // can parse further $row by usingstr_getcsv
	                $x ++;
	                $chunk[] = $row;
	                if ($x == $chunk_size) {          
	 					print_r($chunk);
	                    // call_user_func_array($callback, array($chunk, &$handle, $i));
	                    // unset($chunk);
	                    // $x = 0;
	                }         
	            }
	        }
	        // fclose($handle);
	    }
	    catch(Exception $e)
	    {
	         trigger_error("file_get_contents_chunked::" . $e->getMessage(),E_USER_NOTICE);
	         return false;
	    }
	    return true;
	}

}

?>