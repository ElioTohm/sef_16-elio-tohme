<?php

namespace Cras;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    function sensors ()
    {
    	return $this->hasMany('Cras\Sensor', 'processor_id');
    }

    function user ()
    {
    	return $this->belongsTo('Cras\User', 'user_id');
    }

    function getUserProcessor ()
    {
    	$processor  = Processor::where('user_id',\Auth::user()->id)
               ->orderBy('id')
               ->paginate(5);

        return $processor;
    }

    function deleteUserProcessor ($id)
    {   
        Processor::where('user_id',\Auth::user()->id)
            ->where('id', $id)
            ->delete();
    }

    function updateuserProcessor ($id,$mac,$name)
    {
        Processor::where('user_id',\Auth::user()->id)
            ->where('id', $id)
            ->update(['mac' => $mac, 'processor_name' => $name]);
    }
}
