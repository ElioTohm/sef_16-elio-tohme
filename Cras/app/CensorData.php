<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Redis;

class CensorData extends Model
{
    function insert ($sensordata) 
    {
    	$redis = Redis::connection();
    	$redis->set(1, $sensordata);
    }
}
