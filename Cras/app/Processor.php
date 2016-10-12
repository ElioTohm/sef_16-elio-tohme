<?php

namespace Cras;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    function getCensorsInfo ()
    {
    	return $this->hasMany('Cras\Censor');
    }

    function getUserInfo ()
    {
    	return $this->belongsTo('Cras\User');
    }

    function getUserProcessor ()
    {
    	$processor  = Processor::where('user_id',\Auth::user()->id)
               ->orderBy('processors_id')
               ->get();

        return $processor;
    }
}
