<?php

namespace Cras\Http\Controllers;

use Illuminate\Http\Request;

use Cras\Http\Requests;

class Monitoring extends Controller
{
    public function loadGraphs ()
    {
    	return view('monitoring');
    }
}
