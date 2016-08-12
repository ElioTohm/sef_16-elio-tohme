<?php 
require_once "InputHandler.php";

$InputHandler = new InputHandler();
while(true) {
	$user_input = readline();
	// print_r($user_input);
	$InputHandler->AnalyseLine($user_input);
}

?>