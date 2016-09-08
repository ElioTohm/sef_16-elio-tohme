<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    protected $table = 'posts';

    function blogUserName ()
    {
    	return $this->hasMany('User', 'author_id', 'id');
    }
}
