<?php

namespace Cras;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    function censors ()
    {
    	return $this->hasMany('Cras\Censor', 'processors', 'processors_id');
    }

    function user ()
    {
    	return $this->belongsTo('Cras\User', 'user_id');
    }

    function getUserProcessor ()
    {
    	$processor  = Processor::where('user_id',\Auth::user()->id)
               ->orderBy('processors_id')
               ->get();

        return $processor;
    }
}
