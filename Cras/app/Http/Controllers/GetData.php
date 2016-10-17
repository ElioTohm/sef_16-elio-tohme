<?php

namespace Cras\Http\Controllers;

use Illuminate\Http\Request;

use Cras\Http\Requests;

use Cras\SensorData;

class GetData extends Controller
{
    /**
     * GetData will retrieve the data from redis to the corresponding user
     */
    public function readData (Request $request)
    {
    	$data = json_decode($request->getContent(), true);
    	
    	$censorData =  new SensorData();
    	$result = $censorData->getAllDataSensors($data['userid'],$data['fromtime'],$data['totime']);

    	return $result;
    }
    
}
