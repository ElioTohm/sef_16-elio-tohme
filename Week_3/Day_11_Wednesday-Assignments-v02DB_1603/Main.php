<?php
require_once "InputInterpreter.php";
require_once "Database.php";

/*create database object which will handle the calls of the user*/
$db = new Database();
/*create InputInterpreter which interpret the input of the user and execute the corresponding commands*/
$InputInterpreter = new InputInterpreter();
while (true){
	$line = readline();
	$InputInterpreter->AnalyseLine($line,$db);
}

?>