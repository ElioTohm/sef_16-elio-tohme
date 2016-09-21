<?php
require_once 'QueryWrapper.php';

class Film
{
	private $sqlwrapper;

	public function __construct ()
	{
		$this->sqlwrapper = new QueryWrapper();
	}
	public function Read ($tables, $args = []) 
	{
		return $this->sqlwrapper->Read($tables);
	}
}


?>
