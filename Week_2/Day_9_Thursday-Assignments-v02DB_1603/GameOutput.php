<?php
/*function that outputs any object that is passed to it*/
class GameOutput{

	public function PrintValue($value){
		echo  $value . "\n";
	}
	
	public function PrintGameinfo($array, $gamenum){
		echo "Game $gamenum:" . "\n{ " ;
		foreach ($array as $key => $value) {
			if($key == 0){
				echo $value;
			}else{
				echo ', ' . $value;
			}
		}
		echo ' }'. "\n";
	}
	public function printAnswer($array){
		echo "{ " ;
		foreach($array as $key => $value) {
			if($key == 0){
				echo $value;
			}else{
				echo ', ' . $value;
			}
		}
		echo ' }'. "\n";
	}
}
?>