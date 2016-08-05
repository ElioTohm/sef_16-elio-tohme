<?php
require_once "InputInterpreter.php";
require_once "Database.php";

$db = new Database();
$InputInterpreter = new InputInterpreter();
while (true){
	$line = readline();
	$InputInterpreter->AnalyseLine($line,$db);
}

?>