<?php

namespace Cras\Http\Controllers;

use Illuminate\Http\Request;

use Cras\Http\Requests;

use Cras\CensorData;

use Cras\Censor;

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
    		$censorData =  new CensorData();
    		$censorData->insert($this->DATA->{'userid'}, $this->DATA->{'timestamp'}, $this->DATA->{'value'});
    	}
    } 

    /**
    * Filter the Data => checks that the json request is correctly structured and has 
    * all the neccessary information 
    */
    private function filterData ($request)
    {
    	// add timestamp to value to make it unique 
    	$data = json_decode($request);
    	if ($data !== NULL
    			&& property_exists($data, 'userid') 
    			&& property_exists($data, 'timestamp')	
    			&& property_exists($data, 'value')) 
    	{
	    	$value = $data->{'value'};
	    	$censordata = json_decode($value);
	    	if ($censordata !== NULL ) {
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
        $headers = apache_request_headers();
        foreach ($headers as $key => $value) {
            
        }
    }
}
