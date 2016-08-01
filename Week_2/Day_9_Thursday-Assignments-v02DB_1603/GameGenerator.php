<?php 
// require_once "GameSolver.php";

class GameGenerator{
	private	$BigNumberArr = array(25, 50, 75, 100);
	private	$SmallNumberArr = array(1, 1, 2, 2, 3, 3, 4, 4, 5, 5, 6, 6, 7, 7, 8, 8, 9, 9, 10, 10);
	private	$TotalNumberInGame = 6;
	private	$NumTakenFirstArray;
	private	$NumTakenSecondArray;
	private $GeneratedArray = array();
	private $RandomTargetNumber;

/*Generate random number taken from the first array, calculate the numbers to take fromt he second array and shuffle the 2 arrays for randomness*/
	public function __construct(){
		$this->NumTakenFirstArray = mt_rand(1, 4);
		$this->NumTakenSecondArray = $this->TotalNumberInGame - $this->NumTakenFirstArray;
		shuffle($this->BigNumberArr);
		shuffle($this->SmallNumberArr);
		$this->RandomTargetNumber =  mt_rand(101,999);
	}
	
/*push values from the shuffled arrays in a new array that will be returned*/
 	public function getGeneratedArray(){
 		for($i = 0; $i < $this->NumTakenFirstArray; $i++){			
			array_push($this->GeneratedArray, $this->BigNumberArr[$i]);
		}
		for($i = 0; $i < $this->NumTakenSecondArray; $i++){
			array_push($this->GeneratedArray, $this->SmallNumberArr[$i]);
		}
 		return $this->GeneratedArray;
 	}
 
/*Generate random number between 101 and 999 inclusive*/
	public function GetGenerateRandomTarget(){
		return $this->RandomTargetNumber;
	}


}
?>
