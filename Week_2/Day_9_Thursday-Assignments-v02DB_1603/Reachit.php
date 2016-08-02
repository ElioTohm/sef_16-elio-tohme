<?php 

require_once "GameOutput.php";
require_once "GameGenerator.php";
require_once "OperatorArray.php";
require_once "GameSolver.php";
 
$numberofgames = readline("How many games would you like me to play today? \n");
/*since the operators are the same their combination will be the same so we do it once*/
for($i = 1; $i <= $numberofgames; $i++){
	$operatorcombos = new OperatorArray();
	$game =  new GameGenerator();
	$solver =  new GameSolver();
	$output = new GameOutput();
	$operatorcombos->createOperatorCombos();
	$target = $game->GetGenerateRandomTarget();
	$array =  $game->getGeneratedArray();
	$operatorcombos->setArraynumbers($array);
	$operatorcombos->createArray();
	$output->PrintGameinfo($array, $i);
	$output->PrintValue("Target: $target");
	$Best = $solver->CheckBestResult($operatorcombos->getarraarraytocalculate());
	$key = $solver->getClosest($Best, $target);
	$solution  = $solver->GetSolutionInfo($key, $Best,$operatorcombos->getarraarraytocalculate(), $target);
	$output->PrintValue($solution[0]);
	$output->PrintValue($solution[1]); 
}
?>