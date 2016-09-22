<?php

/**
 * QueryWrapper will handle the information sent 
 * from the ApiHandler class and use the corresponding 
 * function to manipulate information in the database
 */	
class QueryWrapper
{
	private $db = NULL;

	/**
	 * connection to the database
	 */
	public function __construct ()
	{
		$this->dbConnect();
	}
	
	private function dbConnect ()
	{
        $this->db = mysqli_connect( DBSERVER, DBUSER, DBPASS, DBNAME);
        
        if (mysqli_connect_errno())
		{
			die ("Failed to connect to MySQL");
		}
	}

	public function Read ($table, $arg = [])
	{
		$myArray = array();
		$condition = $this->getCondition($arg);
		$result = $this->db->query("select * from " . strtolower($table[0]) . $condition);
		if(mysqli_num_rows($result) != 0){
			while($row = $result->fetch_array(MYSQL_ASSOC)) {
            	$myArray[] = $row;
    		}
    		return $myArray;	
		}else{
			return "no data found";
		}
		$result->free();
		$this->closeConnection();
	}

	public function Post ()
	{
		
	}

	public function Delete ()
	{

	}

	public function Update ()
	{

	} 

	/*
	 * Build the condition corresponding with the info sent
 	 */
	private function getCondition($arg = "")
	{
		end($arg);
		$Endkey = key($arg);
		$condition = "";
		if (count($arg) > 1 ) {
			$condition = " where ";
			foreach ($arg as $key => $value) {
				if($key != "rquest" && $key != $Endkey){
					$condition .= " " . $key . " = '" . $value . "' and";	
				}else{
					if($key != "rquest"){
						$condition .= " " . $key . " = '" . $value . "'";		
					}
					
				}

			}
		}
		return $condition;
	}

	public function closeConnection ()
	{
		$this->db->close();
	}
	
}	

?>
