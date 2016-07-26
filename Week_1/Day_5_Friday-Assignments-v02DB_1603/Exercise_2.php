#!/usr/bin/php
<?php

$handle = fopen("/var/log/apache2/access.log", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $ip = get_string_between($line, "", "-");
        $date =  get_string_between($line, "[", ":");
        $date = strtr($date, '/', '-');
        $date =  date("l, F j Y", strtotime($date));
        $time = get_string_between($line, ":", "+");
        $time = strtr($time, ':', '-');
        $string = get_string_between($line, "\"", "\"");

        $response = get_string_between($line, "\" "," ");
        echo $ip . " -- " . $date . " : " . $time . " -- \"" . $string . "\" -- " . $response . "\n";
    }

    fclose($handle);
} else {
    echo "Something went wrong could not open logs";
} 

function get_string_between($string, $start, $end){
    if(!$start == ""){
        $ini = strpos($string, $start);
        $ini += strlen($start);
        $len = strpos($string, $end, $ini) - $ini;
        return substr($string, $ini, $len); 
    }else{
        $len = strpos($string, $end, 0);
        return substr($string, 0, $len); 
    }   
}

?>