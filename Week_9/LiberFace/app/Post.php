<?php

namespace LiberFace;

use Illuminate\Database\Eloquent\Model;

use LiberFace\User;

class Post extends Model
{
    function user ()
    {
    	return $this->belongsTo('LiberFace\User');
    }

    function get_followed_posts ()
    {
    	$posts = User::where('active', 1)
               ->orderBy('name', 'desc')
               ->take(10)
               ->get();
               
        return $posts;
    }
}
