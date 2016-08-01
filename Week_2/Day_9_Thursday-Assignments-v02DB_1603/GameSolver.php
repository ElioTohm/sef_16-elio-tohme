<?php
/*tests for game solver*/
$array = array(2, 75, 5, 2, 20, 100);
$array2 = array("*","/","+","-");
function depth_picker($arr, $temp_string, &$collect) {
    if ($temp_string != "" ) $collect [] = $temp_string;    
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

function combos($arr, $k) {
    if ($k == 0){
        return array(array());
    }

    if (count($arr) == 0){
        return array();
    }

    $head = $arr[0];

    $combos = array();
    $subcombos = combos($arr, $k-1);
    foreach ($subcombos as $subcombo){
        array_unshift($subcombo, $head);
        $combos[] = $subcombo;
    }
    array_shift($arr);
    $combos = array_merge($combos, combos($arr, $k));
    return $combos;
}

function addoperators($arr1, $arr2){ 
    $result = array();
    foreach ($arr1 as $key => $value) {
        if(!empty($arr1)) {
                $result[] = array_shift($arr1);
            }
            if(!empty($arr2)) {
                $result[] = array_shift($arr2);
            }
    }
    return implode("", $result);
    // return $result;    
}

$arraytocalculate = array();
$numbers = array();
$operators = array();
depth_picker($array, "", $numbers);
depth_picker($array2, "", $operators);
$arrayop1 = combos($array2, 1);
$arrayop2 = combos($array2, 2);
$arrayop3 = combos($array2, 3);
$arrayop4 = combos($array2, 4);
$arrayop5 = combos($array2, 5);

foreach ($numbers as $key => $value) {
    $subarray = explode(" ",$value); 
    if(sizeof($subarray) > 2){
        unset($subarray[0]);
        if(sizeof($subarray) == 2){
            foreach ($arrayop1 as $arrayop1key => $arrayop1value) {
                $ops = addoperators($subarray, $arrayop1value);
                if($ops != 0)
                    array_push($arraytocalculate, $ops);
                }
        }
        if(sizeof($subarray) == 3){
            foreach ($arrayop2 as $arrayop2key => $arrayop2value) {
                $ops = addoperators($subarray, $arrayop2value);
                if($ops != 0)
                array_push($arraytocalculate, $ops);
            }
        }
        if(sizeof($subarray) == 4){
            foreach ($arrayop3 as $arrayop3key => $arrayop3value) {
                $ops = addoperators($subarray, $arrayop3value);
                if($ops != 0)
                array_push($arraytocalculate, $ops);
            }
        }
        if(sizeof($subarray) == 5){
            foreach ($arrayop4 as $arrayop4key => $arrayop4value) {
                $ops = addoperators($subarray, $arrayop4value);
                if($ops != 0)
                array_push($arraytocalculate, $ops);
            }
        }
        if(sizeof($subarray) == 6){
            foreach ($arrayop5 as $arrayop5key => $arrayop5value) {
                $ops = addoperators($subarray, $arrayop5value);
                if($ops != 0)
                array_push($arraytocalculate, $ops);
            }
        }
    }
}

function CheckBestResult($array){
    $max = 0;
    $result = array();
    foreach ($array as $key => $value) {
        $p = eval('return '.$value.';'); 
        array_push($result, $p);
    }
    return $result;
}

function getClosest($array, $number) {
    //does an exact match exist?
    if ($i=array_search($number, $array)) return $i;

    //find closest
    foreach ($array as $key => $match) {
        $diff = abs($number-$match); //get absolute value of difference
        if (!isset($closeness) || (isset($closeness) && $closeness>$diff)) {
            $closeness = $diff;
            $closest = $key;
        }
    }
    return $closest;
}

$lalala = CheckBestResult($arraytocalculate);
$reskey = getClosest($lalala,500);

echo $arraytocalculate[$reskey] . "\n";
?>