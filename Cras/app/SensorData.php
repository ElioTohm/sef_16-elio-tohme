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

    function read ($userid,$fromtime,$totime)
    {
    	$redis = Redis::connection();
    	$result = $redis->zRangeByScore($userid, $fromtime, $totime, array('withscores' => TRUE));
    	return $result;
    }
}
