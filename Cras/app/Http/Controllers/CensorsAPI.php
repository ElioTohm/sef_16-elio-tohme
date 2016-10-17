<?php

namespace Cras\Http\Controllers;

use Illuminate\Http\Request;

use Cras\Http\Requests;

use Cras\SensorData;

use Cras\Processor;

use Cras\User;

class CensorsAPI extends Controller
{
	/**
	* Class CensorsAPI will filter the data sent from the processors
	* and insert them to redis through CensorData class 
	*/
	protected $DATA;

    public function insertData (Request $request)
    {
    	if ($this->authenticateRequest($request) && $this->filterData($request)) {
    		$sensorData =  new SensorData();
    		$sensorData->insert($this->DATA['userid'], $this->DATA['timestamp'], json_encode($this->DATA['value']));
        }
    } 

    /**
    * Filter the Data => checks that the json request is correctly structured and has 
    * all the neccessary information 
    */
    private function filterData ($request)
    {
    	// add timestamp to value to make it unique 
    	$data = json_decode($request->getContent(), true);
    	if ($data !== NULL
    			&& array_key_exists('userid', $data) 
    			&& array_key_exists('timestamp', $data)	
    			&& array_key_exists('value', $data)) 
    	{
	    	$value = $data['value'];
            $censordata = json_decode(json_encode($value),true);
	    	if ($censordata !== NULL ) {
	    		$censordata["timestamp"] = $data['timestamp'];
                $data['value'] = $censordata;
                $this->DATA = $data;

	    		return true;
	    	} else {
	    		return  false;
	    	}
    	} else {
    		return false;
    	}
    }

    /**
    * checks headers sent by the processors 
    * validate information authentications sent with processors and users tables 
    */
    private function authenticateRequest ($request)
    {
        $headers = getallheaders();

        $user = new User();
        $user_key = $user::where('api_key',$headers['user_auth'])
                            ->select('id')
                            ->first();

        $processor = new Processor();
        $node_key = $processor::where('auth_key', $headers['node_auth'])
                                ->where('user_id', $user_key->id)
                                ->get();
        if(count($node_key) == 1){
            return true;
        } else {
            return false;
        }
    }
}
