<?php 
class DataBase
{
	private $CONN;

	function __construct ($ServerName, $UserName, $Password, $DBName)
	{
		// Create connection
		$this->CONN = mysqli_connect($ServerName, $UserName, $Password, $DBName);

		//check if connection 
		if (mysqli_connect_errno()) {
	        die( "Could not open connection to server" );
	    }else{
	    	echo "sdbfbdshf <br>";
	    }
	}
	
	function __destruct ()
	{
		// $this->CONN->close();
	}

}
?>
