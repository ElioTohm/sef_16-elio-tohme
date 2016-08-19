<?php 
require_once "Config.php";

class DataBase
{
	private $CONN;
	private $CONFIG;

	function __construct() {
		$this->CONFIG = new Config();
   	}

	function connect()
	{
		// Create connection
		$this->CONN = new mysqli($servername, $username, $password, $dbname);
		// Check connection

		if ($this->CONN->connect_error) {
			die("Connection failed: " . $conn->connect_error);
			} 
		}
	
	function disconect()
	{
		$this->CONN->close();
	}

	function executequery()
	{
		
	}
}
?>
