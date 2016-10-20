<?php

class PostRequest 
{   
    // on create initialize curl post request and executes curl
    public function __construct ($sensorType, $sensorvalue)
    {
        $splitsecond = time();
        $dataToSend = json_encode( array("userid"=> USERID,
                                         "timestamp"=> $splitsecond,
                                         "value"=>array("$sensorType" => $sensorvalue, "timestamp" => $splitsecond)) );
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
        return $server_output;
    }
}


?>


