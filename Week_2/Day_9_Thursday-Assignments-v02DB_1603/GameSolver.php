<?php
class GameSolver{
    /*returns an array of calculated rows*/
    public function CheckBestResult($array){
        $max = 0;
        $result = array();
        foreach ($array as $key => $value) {
            $p = eval('return '.$value.';');
            if(!is_float($p)){ 
                $result[$key] = $p;
            }
        }
        return $result;
    }

    public function getClosest($array, $number) {
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
/*checks if closest is exact or not and return it in an array*/
    public function GetSolutionInfo($closest , $arraycalculate, $origarray, $target){
        if($target == $arraycalculate[$closest]){
           return $result = array("Solution [Exact]:", "$origarray[$closest] = $arraycalculate[$closest]"); 
       }else{
            $result = $target - $arraycalculate[$closest];
            return $result = array("Solution [Remaining: $result]:" , "$origarray[$closest] = $arraycalculate[$closest]" );
       }
        
    }
}
?>