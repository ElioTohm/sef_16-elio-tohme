<?php 
require_once "InputHandler.php";

$InputHandler = new InputHandler();
while(true) {
	$user_input = readline();
	$InputHandler->AnalyseLine($user_input);
}

?>