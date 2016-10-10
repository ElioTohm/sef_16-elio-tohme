<?php

namespace Cras;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    function getCensors ()
    {
    	return $this->hasMany('Cras\Censor');
    }

    function getUser ()
    {
    	return $this->belongsTo('Cras\User');
    }
}
