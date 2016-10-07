<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Redis;

class CensorData extends Model
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
    	$result = $redis->zRange($userid,$fromtime,$totime);
    	return $result;
    }
}
