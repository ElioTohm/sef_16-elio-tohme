<?php

namespace Cras;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Redis;

class SensorData extends Model
{
	/**
	 * this class will only be responsable for adding data in redis
	 * as time series with keyname the user's ID
	 */

    function insert ($userid, $timestamp, $value) 
    {    	
    	$redis = Redis::connection();
    	$redis->zAdd($userid, $timestamp , $value);
    }

    /*
    * fetch all data of user
    */
    function getAllDataSensors ($userid,$fromtime,$totime)
    {
    	$redis = Redis::connection();
    	$result = $redis->zRange($userid, $fromtime, $totime);
        
        return response()->json(array('result'=>$result),200);
    }

}
