<?php

namespace LiberFace;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    function user ()
    {
    	return $this->belongsTo('LiberFace\User');
    }

    function comments ()
    {
      return $this->hasMany('LiberFace\Comment','id');
    }
}
