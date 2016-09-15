<?php

namespace LiberFace;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    function post ()
    {
    	return $this->belongsTo('LiberFace\Post');
    }

    function user ()
    {
    	return $this->belongsTo('LiberFace\User');
    }
}
