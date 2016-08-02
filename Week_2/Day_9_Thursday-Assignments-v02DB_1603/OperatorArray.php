<?php 

class OperatorArray{
	private $array = array();
    private $array2 = array("*","/","+","-");
    private $arraytocalculate = array();
    private $numbers = array();
    private $operators = array();
    private $arrayop1;
    private $arrayop2;
    private $arrayop3;
    private $arrayop4;
    private $arrayop5;


    public function getarraarraytocalculate(){
    	return $this->arraytocalculate;
    }

    public function setArraynumbers($array){
    	$this->array = $array;
    }

/*get $k combination of an array (with repitition)*/
	public function combos($arr, $k) {
	    if ($k == 0){
	        return array(array());
	    }

	    if (count($arr) == 0){
	        return array();
	    }

	    $head = $arr[0];

	    $combos = array();
	    $subcombos = self::combos($arr, $k-1);
	    foreach ($subcombos as $subcombo){
	        array_unshift($subcombo, $head);
	        $combos[] = $subcombo;
	    }
	    array_shift($arr);
	    $combos = array_merge($combos, self::combos($arr, $k));
	    return $combos;
	}

/*get the permutation of an array (without repetition)*/
	public function itterateNumberArray($arr, $temp_string, &$collect) {
    	if ($temp_string != "" ) $collect [] = $temp_string;    
	        for ($i=0; $i<sizeof($arr);$i++) {
	            $arrcopy = $arr;
	            $elem = array_splice($arrcopy, $i, 1); // removes and returns the i"th element
	            if (sizeof($arrcopy) > 0) {
	                self::itterateNumberArray($arrcopy, $temp_string ." ". $elem[0] , $collect);
	            } else {
	                    $a = $temp_string ." ". $elem[0];
	                    $collect [] = $a;                        
	        	}
		    }   
    }

/*function that returns all combination on numbers and */
    public function createOperatorCombos(){
		self::itterateNumberArray($this->array2, "", $this->operators);
    	$this->arrayop1 = self::combos($this->array2, 1);
		$this->arrayop2 = self::combos($this->array2, 2);
		$this->arrayop3 = self::combos($this->array2, 3);
		$this->arrayop4 = self::combos($this->array2, 4);
		$this->arrayop5 = self::combos($this->array2, 5);
    }

/*add 2 array $arra1 put values in the even index of the new array and $arr2 in the odd index*/
    private function addoperators($arr1, $arr2){ 
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
	}

/*combines both number array and operator array*/
    public function createArray(){
    	self::itterateNumberArray($this->array, "", $this->numbers);
		foreach ($this->numbers as $key => $value) {
		    $subarray = explode(" ",$value); 
		    if(sizeof($subarray) > 2){
		        unset($subarray[0]);
		        if(sizeof($subarray) == 2){
		            foreach ($this->arrayop1 as $arrayop1key => $arrayop1value) {
		                $ops = self::addoperators($subarray, $arrayop1value);
		                if($ops != 0)
		                    array_push($this->arraytocalculate, $ops);
		                }
		        }
		        if(sizeof($subarray) == 3){
		            foreach ($this->arrayop2 as $arrayop2key => $arrayop2value) {
		                $ops = self::addoperators($subarray, $arrayop2value);
		                if($ops != 0)
		                array_push($this->arraytocalculate, $ops);
		            }
		        }
		        if(sizeof($subarray) == 4){
		            foreach ($this->arrayop3 as $arrayop3key => $arrayop3value) {
		                $ops = self::addoperators($subarray, $arrayop3value);
		                if($ops != 0)
		                array_push($this->arraytocalculate, $ops);
		            }
		        }
		        if(sizeof($subarray) == 5){
		            foreach ($this->arrayop4 as $arrayop4key => $arrayop4value) {
		                $ops = self::addoperators($subarray, $arrayop4value);
		                if($ops != 0)
		                array_push($this->arraytocalculate, $ops);
		            }
		        }
		        if(sizeof($subarray) == 6){
		            foreach ($this->arrayop5 as $arrayop5key => $arrayop5value) {
		                $ops = self::addoperators($subarray, $arrayop5value);
		                if($ops != 0)
		                array_push($this->arraytocalculate, $ops);
		            }
		        }
		    }
		}
    }

}

?>