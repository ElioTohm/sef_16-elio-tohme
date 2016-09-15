<?php

namespace LiberFace\Http\Controllers;

use Illuminate\Http\Request;

use LiberFace\Http\Requests;

class DashboardController extends Controller
{
    function index ()
    {
    	return view('DashBoardView');
    }
}
