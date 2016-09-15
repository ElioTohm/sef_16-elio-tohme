<?php

namespace LiberFace;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    
    function post ()
    {
    	return $this->belongsTo('LiberFace\Post');
    }
}
