<?php

/*
* class that listens to the get request of the arduino
*/

class RequestListener 
{
    public $SENSORTYPE = "";
    public $SENSORVALUE = "";

    public function __construct ($rquest)
    {
        if (isset($_GET["senorType"]) && isset($_GET["value"])) {
            $this->SENSORTYPE = $_GET["senorType"];
            $this->SENSORVALUE = $_GET["value"];
        } else {
            echo "401";
        }
        
    }
}

?>
