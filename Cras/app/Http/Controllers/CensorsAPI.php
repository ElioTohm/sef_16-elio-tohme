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
	protected $DATA;

    public function insertData (Request $request)
    {
    	if ($this->filterData($request)) {
    		$censorData =  new CensorData();
    		$censorData->insert($this->DATA->{'userid'}, $this->DATA->{'timestamp'}, $this->DATA->{'value'});
    	}
    } 

    private function filterData ($request)
    {
    	// add timestamp to value to make it unique 
    	$data = json_decode($request);
    	if ($data !== NULL
    			&& property_exists($data, 'userid') 
    			&& property_exists($data, 'timestamp')	
    			&& property_exists($data, 'value')) 
    	{
	    	$userid = $data->{'userid'};
	    	$timestamp = $data->{'timestamp'};
	    	$value = $data->{'value'};
	    	$censordata = json_decode($value);
	    	if ($censordata !== NULL ) {
	    		$this->DATA = $data;
	    		return true;
	    	} else {
	    		return  false;
	    	}
    	} else {
    		echo "false first";
    	}
    }
}
