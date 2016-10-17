<?php

namespace Cras;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	/*
	* delete sensors
	*/
	function deleteSensor ($sensorid)
    {   
        Sensor::where('sensor_id', $sensorid)->delete();
    }
    
}
