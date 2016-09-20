<?php
class ApiHandler
{
	public function __construct() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			echo 'its a post request';
		}	
	}
}
?>
