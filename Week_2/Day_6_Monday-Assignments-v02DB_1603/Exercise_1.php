<?php

/*we will be checking for pair in the color black the first person will call out the color black if the number of black hats is even and white if the number of black hats is odd*/

function callout_color($previousInfo, $numofBlackHatsInfront, $hint){
	/*check with the information provided by the other functions and deduce own color*/
	$info = $previousInfo + $numofBlackHatsInfront;
	if($hint == "Black"){
		if($info % 2 == 0){
			echo "Diz hat is: White" . "\n";
		}else{
			echo "Diz hat is: Black" . "\n";
		}
	}else{
		if($info % 2 != 0){
			echo "Diz hat is: White" . "\n";
		}else{
			echo "Diz hat is: Black" . "\n";	
		}
	}
}

function check_previous_info($currentindex, $input){
	/*this function will keep track of the information previously given by the subjects*/
	$count = 0;
		for($i = $currentindex - 1; $i > 0; $i--){
			if($input[$i] == "black"){
				$count++;
			}
	}
	return $count;
}

function count_black_hats_infront($currentindex, $input){
	/*here we will count the number of black hats in front of the current indiviual*/
	$count = 0; 
	for($i = $currentindex + 1; $i < sizeof($input); $i++){
		if($input[$i] == "black"){
			$count++;
		}
	}
	return $count;
}

$input = explode(",", $argv[1]);
$inputsize = sizeof($input);
$hint="";
foreach ($input as $key => $value) {
	if($key == 0){
		$iseven = count_black_hats_infront(0, $input) . "\n";
		// echo $iseven;
		if($iseven % 2 == 0){
			$hint = "Black";
		}else{
			$hint = "White";
		}
		echo "Diz hat is: " . $hint . "\n"; 
	}else{
		$numberofblackhats = count_black_hats_infront($key, $input);
		$previousinfo = check_previous_info($key, $input);
		// echo $numberofblackhats + $previousinfo . "\n";
		callout_color($previousinfo, $numberofblackhats, $hint) . "\n";
	}
}

?>