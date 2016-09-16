<?php

namespace LiberFace\Http\Controllers;

use Illuminate\Http\Request;

use LiberFace\Http\Requests;

use LiberFace\Post;

class DashboardController extends Controller
{
	private static $StorePath; 

	function __construct() 
	{
        self::$StorePath = public_path('images/usersImage');
	}

    function index ()
    {
    	$posts = Post::All();
    	return view('DashBoardView')->with('path', self::$StorePath)
    								->with('posts', $posts);
    }
}
