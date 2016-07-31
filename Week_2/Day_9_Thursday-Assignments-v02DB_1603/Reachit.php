<?php 

require_once "GameOutput.php";
require_once "GameGenerator.php";
$numberofgames = readline("How many games would you like me to play today? \n");

for($i = 1; $i <= $numberofgames; $i++){
	$game =  new GameGenerator();
	$target = $game->GetGenerateRandomTarget();
	$array =  $game->getGeneratedArray();
	$output = new GameOutput();
	$output->PrintArray($array, $i);
	$output->PrintValue($target);
}
?>