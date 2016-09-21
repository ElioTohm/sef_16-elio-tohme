<?php
require_once 'QueryWrapper.php';

class Actor 
{
	public function Read ($tables, $args = []) 
	{
		$sqlwrapper = new QueryWrapper();
		return $sqlwrapper->Read($tables);
	}

}

?>