<?php

$inputsize = readline("Number of words to search: ");
$input = array();
for ($i = 0; $i < $inputsize; $i++){
	array_push($input, readline());
}
$wordscrore = array();
$keyboardrow = array("qwertyuiop", "asdfghjkl", "zxcvbnm") ;
foreach ($keyboardrow as $key => $keyboardvalue) {
	$resultByrow =  array();
	foreach ($input as $key => $value) {
 			// checkforduplicates($value);
		$valuetoArray = str_split($value);
		$arr = array_unique( $valuetoArray );
		$strimedvalue = implode("" , $arr);
		$temp1 = $strimedvalue . $keyboardvalue;
		$splitstring = array_count_values(str_split($temp1));
		$score = 0;
		foreach ($splitstring as $subkey => $subvalue) {
				if($subvalue != 1){
					$score = $score + $subvalue - 1;
			}
		}
		array_push($resultByrow, $score);
	}
	array_push($wordscrore, $resultByrow);
}
var_dump($wordscrore);

// function checkforduplicates($input){
// 	$splitstring = array_count_values(str_split($input));
// 	foreach ($splitstring as $key => $value) {
// 		if($value == 1){
// 			unset($splitstring[$key]);
// 		}
// 	}
// 	// var_dump($splitstring);
// }
?>