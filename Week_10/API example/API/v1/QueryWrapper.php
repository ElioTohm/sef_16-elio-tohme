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
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
    	}
    	return $myArray;
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

	private function getCondition($arg = "")
	{
		if ($arg != "") {
			$condition = " where ";
			foreach ($arg as $key => $value) {
				if($key == count($arg) - 1 || $key != "rquest"){
					$condition .= " " . $key . " = '" . $value . "'";	
				}
			}
			return $condition;		
		}
	}
	
}	

?>
