<?php

namespace LiberFace\Http\Controllers;

use Illuminate\Http\Request;

use LiberFace\Http\Requests;

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
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);

    	$image = $request->file('image');
        $input['imagename'] = $request->user()->id.'_'.$image->getClientOriginalExtension();

        $image->move($this->destinationPath, $input['imagename']);

        $newPost = new Post();
        $newPost->image_url = $input['imagename'];
        $newPost->tags = $request->get('tags');
        $newPost->user_id = $request->user()->id;
        $newPost->save();

    }

}
