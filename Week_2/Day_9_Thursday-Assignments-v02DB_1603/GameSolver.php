<?php
/*tests for game solver*/
$array = array(2, 75, 5, 2, 20, 100);
$array2 = array("*","/","+","-");
function depth_picker($arr, $temp_string, &$collect) {
    if ($temp_string != "" ) 
        $collect [] = $temp_string;    
        for ($i=0; $i<sizeof($arr);$i++) {
            $arrcopy = $arr;
            $elem = array_splice($arrcopy, $i, 1); // removes and returns the i"th element
            if (sizeof($arrcopy) > 0) {
                depth_picker($arrcopy, $temp_string ." ". $elem[0] , $collect);
            } else {
                    $a = $temp_string ." ". $elem[0];
                    $collect [] = $a;                        
            }
        }   
}

$numbers = array();
$operators = array();
depth_picker($array, "", $numbers);
depth_picker($array2, "", $operators);
foreach ($numbers as $key => $value) {
    $subarray = explode(" ",$value); 
    if(sizeof($subarray) > 2){
        unset($subarray[0]);
        if(sizeof($subarray) == 2){
            print_r(addoperators($subarray, getOperator($operators, 1)));
        }
        if(sizeof($subarray) == 3){
            print_r(addoperators($subarray, getOperator($operators, 2)));
        }
        if(sizeof($subarray) == 4){
            print_r(addoperators($subarray, getOperator($operators, 3)));
        }
        // if(sizeof($subarray) == 5){
            // print_r(addoperators($subarray, getOperator($operators, 4)));
        // }
        // if(sizeof($subarray) == 6){
            // print_r(addoperators($subarray, getOperator($operators, 5)));
        // }
        
    }
}

function getOperator($array, $count){
    foreach ($array as $key => $value) {
        $oparray = explode(" ",$value);
        if(sizeof($oparray) > 1){
            unset($oparray[0]);
            if(sizeof($oparray) == $count){
                return $oparray;
            }
        }
    }
}

function addoperators($arr1, $arr2){ 
    $result = array();
    while(!empty($arr1) || !empty($arr2)) {
        if(!empty($arr1)) {
            $result[] = array_shift($arr1);
        }
        if(!empty($arr2)) {
            $result[] = array_shift($arr2);
        }
    }
    return $result;  
}
// var_dump($result);
?>