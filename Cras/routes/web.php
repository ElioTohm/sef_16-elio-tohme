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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('monitoring');
// });

Route::get('crassensorservice', 'CensorsAPI@insertData');

Route::get('test', 'CensorsAPI@test');

Auth::routes();

Route::group(['middleware' => ['auth']], function()
{
	Route::get('/monitoring', 'Monitoring@loadGraphs');
});