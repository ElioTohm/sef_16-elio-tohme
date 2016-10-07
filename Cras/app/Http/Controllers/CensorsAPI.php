<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CensorData;

class CensorsAPI extends Controller
{
	/**
	 * Class CensorsAPI will filter the data sent from the processors
	 * and insert them to redis through CensorData class 
	 */

    public function insertData (Request $request)
    {
    	if ($this->filterData($request)) {
    		$censorData =  new CensorData();
    		$censorData->insert($request);
    	}
    }

    private function filterData ($request)
    {
    	$data = json_decode($request);
    	if ($data !== NULL
    			&& property_exists($data, 'userid') 
    			&& property_exists($data, 'timestamp') 
    			&& property_exists($data, 'value')) 
    	{
	    	$userid = $data->{'userid'};
	    	$timestamp = $data->{'timestamp'};
	    	$value = $data->{'value'};
	    	$censordata = json_decode($value)
	    	if ($censordata !== NULL) {
	    		return true;
	    	}
    	} else {
    		return false;
    	}
    }
}
