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
		$result = $this->db->query("select * from " . strtolower($table[0]));
		while($row = $result->fetch_array(MYSQL_ASSOC)) {
            $myArray[] = $row;
    	}
    	return $myArray;
	}

	public function Insert ()
	{

	}

	public function Delete ()
	{

	}

	public function Update ()
	{

	} 
	
}	

?>
