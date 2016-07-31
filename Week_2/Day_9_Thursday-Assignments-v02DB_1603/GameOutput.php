<?php
/*function that outputs any object that is passed to it*/
class GameOutput{

	public function PrintValue($value){
		echo 'Target: ' . $value . "\n";
	}
	public function PrintArray($array, $gamenum){
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

}
?>