<?php

namespace LiberFace\Http\Controllers;

use Illuminate\Http\Request;

use LiberFace\Http\Requests;

use LiberFace\Post;

use LiberFace\Comment;

class DashboardController extends Controller
{
	private static $StorePath; 

	function __construct() 
	{
        self::$StorePath = 'images/';
	}

    function index ()
    {
    	$posts = Post::paginate(10);
    	return view('DashBoardView')->with('path', self::$StorePath)
    								->with('posts', $posts);
    }

    function postcomment (Request $request)
    {
        $this->validate($request, [
            'text' => 'required|max:255',
        ]);

        $comment = new Comment();
        $comment->on_post = $request->get('post_id');
        $comment->from_user = $request->user()->id;
        $comment->comment_text = $request->get('text');
        $comment->save();
        
        // return redirect()->action('DashboardController@index');
    }
}
