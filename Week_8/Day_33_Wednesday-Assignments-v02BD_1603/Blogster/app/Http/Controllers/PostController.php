<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class PostController extends Controller
{
    public function get_allPosts ()
    {
		$post = Post::all();
		return view('postsView')->with('posts',$post);
    }
}
