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

Route::post('crassensorservice', 'CensorsAPI@insertData');

Auth::routes();

Route::group(['middleware' => ['auth']], function()
{
	Route::post('getdata', 'GetData@readData');
	Route::get('monitoring', 'Monitoring@loadGraphs');
	Route::post('addprocessor', 'Monitoring@addProcessor');
	Route::get('rerendersection','Monitoring@rerenderSection');
	Route::post('deleteprocessor','Monitoring@deleteProcessor');
	Route::post('updateprocessor', 'Monitoring@updateProcessor');
	Route::post('addsensor','Monitoring@addSensor');
	Route::post('deletesensor','Monitoring@deleteSensor');
	Route::get('paging_navprocessor','Monitoring@paginationHandlerNavProcessor');
	Route::get('paging_modalprocessor','Monitoring@paginationHandlerModalProcessor');
	Route::get('paging_navsensor','Monitoring@paginationHandlerNavSensor');
	Route::get('paging_modalsensor','Monitoring@paginationHandlerModalSensor');
});
