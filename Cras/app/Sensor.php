<?php

namespace Cras;

use Illuminate\Database\Eloquent\Model;

class Sensor extends Model
{
	function deleteSensor ($sensorid)
    {   
        Sensor::where('sensor_id', $sensorid)->delete();
    }
}
