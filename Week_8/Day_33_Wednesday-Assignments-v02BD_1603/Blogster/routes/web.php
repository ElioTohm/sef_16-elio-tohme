<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'PostController@get_allPosts');


Auth::routes();

Route::get('posts', 'PostController@get_allPosts');

Route::group(['middleware' => ['auth']], function()
{

	Route::get('AddPost', 'PostController@addPost');

});
