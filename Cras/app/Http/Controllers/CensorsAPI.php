<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CensorData;

class CensorsAPI extends Controller
{
	/**
	 *insertData is responsable to inserting information in redis 
	 */
    public function insertData (Request $request)
    {
    	$censorData =  new CensorData();
    	$censorData->insert($request);


    }
}
