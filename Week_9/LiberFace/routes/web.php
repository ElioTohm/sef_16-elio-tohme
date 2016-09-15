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

Route::get('/', 'DashboardController@index');

Auth::routes();

Route::group(['middleware' => ['auth']], function()
{
	/*
	 * All routes that needs to be logged in are in this scope
	*/
});

