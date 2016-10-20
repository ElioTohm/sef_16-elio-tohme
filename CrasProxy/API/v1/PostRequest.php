<?php

class PostRequest 
{   
    // on create initialize curl post request and executes curl
    public function __construct ($sensorType, $sensorvalue)
    {
        
        $dataToSend = json_encode( array("userid"=> USERID,
                                         "timestamp"=> time(),
                                         "value"=>array("$sensorType" => $sensorvalue)) );
        $ch = curl_init(URL);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'user_auth: ' . APIKEY,
            'node_auth: '. NODEAUTH
        ));
        curl_setopt( $ch, CURLOPT_POSTFIELDS, $dataToSend );
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        echo $server_output;
    }
}


?>


