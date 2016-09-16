<?php

namespace LiberFace\Http\Controllers;

use Illuminate\Http\Request;

use LiberFace\Http\Requests;

use LiberFace\Post;

class UploadImageController extends Controller
{
	private static $destinationPath; 
   
	function __construct() 
	{
        self::$destinationPath = public_path('images/usersImage');
	}

    function loadpage ()
    {
    	return view ('UploadImage');
    }

    function uploadImage (Request $request)
    {
    	$this->validate($request, [
            'file' => 'required|image|mimes:jpeg,png,jpg',
        ]);

    	$image = $request->file('file');
        $input['imagename'] = $request->user()->id.'_'.time().'_'.$image->getClientOriginalExtension();

        $image->move(self::$destinationPath, $input['imagename']);

        $post = new Post();
        $post->image_url = $input['imagename'];
        $post->tags = $request->get('tags');
        $post->user_id = $request->user()->id;
        $post->save();
        return redirect()->action('UploadImageController@loadPage')
                         ->withMessage('Posted Successfully');
    }

}
