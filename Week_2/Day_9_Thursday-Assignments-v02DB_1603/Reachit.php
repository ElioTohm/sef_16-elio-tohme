<?php 

require_once "GameOutput.php";
require_once "GameGenerator.php";

$game =  new GameGenerator();
$target = $game->GetGenerateRandomTarget();
$array =  $game->getGeneratedArray();
$output = new GameOutput();
$output->PrintArray($array, 1);
$output->PrintValue($target);
?>