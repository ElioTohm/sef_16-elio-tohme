<?php 

require_once "GameOutput.php";
require_once "GameGenerator.php";
require_once "OperatorArray.php";
require_once "GameSolver.php";
 
$numberofgames = readline("How many games would you like me to play today? \n");
$operatorcombos = new OperatorArray();
$operatorArrays = $operatorcombos->createOperatorCombos();
for($i = 1; $i <= $numberofgames; $i++){
	$game =  new GameGenerator();
	$solver =  new GameSolver();
	$output = new GameOutput();
	$target = $game->GetGenerateRandomTarget();
	$array =  $game->getGeneratedArray();
	$operatorcombos->setArraynumbers($array);
	$operatorcombos->createArray();
	// var_dump($operatorcombos->getarraarraytocalculate();
	
	// var_dump($array);
	// $solverarray = $solver->CheckBestResult();
	// var_dump($operatorcombos->getarraarraytocalculate());
	$output->PrintGameinfo($array, $i);
	$output->PrintValue($target);
	$Best = $solver->CheckBestResult($operatorcombos->getarraarraytocalculate());
	$key = $solver->getClosest($Best, $target);
	print_r($solver->GetSolutionInfo($key, $Best,$operatorcombos->getarraarraytocalculate()));
}
?>