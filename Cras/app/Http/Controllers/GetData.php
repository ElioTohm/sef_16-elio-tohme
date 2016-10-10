<?php

namespace Cras\Http\Controllers;

use Illuminate\Http\Request;

use Cras\Http\Requests;

use Cras\CensorData;

class GetData extends Controller
{
    /**
     * GetData will retrieve the data from redis to the corresponding user
     */
    public function readData (Request $request)
    {
    	$censorData =  new CensorData();
    	$censorData->read();
    }
    
}
