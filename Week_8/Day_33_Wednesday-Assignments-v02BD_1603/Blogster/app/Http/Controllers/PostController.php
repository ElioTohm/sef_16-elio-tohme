<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function get_allPosts ()
    {
        $posts = DB::table('posts')
                ->join('users', 'posts.author_id', '=', 'users.id')
                ->paginate(5);
        return view('postsView')->with('posts',$posts);
    }

    public function getPostPage ()
    {
    	return view('addpostView');
    }

    public function addPost (Request $request)
    {
        $posttime = Carbon::now();
        $post = new Post();
        $post->author_id = $request->user()->id;
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->created_at = $posttime;
        $post->save();
        return redirect('/');
    }

    public function getpostUserName ()
    {
        // $post = Post::where('author_id',1)->with('User')->get();
        $post = Post::join('User', 'User.id', '=', 'Post.author_id');
        return $post;
    }

    public function getPostByUserID ()
    {
        $post  = Post::where('author_id',\Auth::user()->id)
               ->orderBy('author')
               ->get();
        return view('postmanagerView')->with('posts',$post);
    }

    public function deletePost ($id)
    {
        Post::findOrFail($id)->destroy($id);
        return redirect('manageposts');
    }

}
