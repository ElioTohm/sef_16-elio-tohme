<?php 
class Config
{
	private $SERVERNAME = "localhost";
	private $USERNAME = "sakila";
	private $PASSWORD = "user_sakila";
	private $DBNAME = "sakila";

	function _getServerName()
	{
		return $this->SERVERNAME;
	}

	function _getUserName()
	{
		return $this->USERNAME;
	}

	function _getPassword()
	{
		return $this->PASSWORD;
	}

	function _getDBName()
	{
		return $this->DBNAME;
	}
}
?>
