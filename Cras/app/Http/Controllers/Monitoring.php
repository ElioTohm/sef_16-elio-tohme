<?php

namespace Cras\Http\Controllers;

use Illuminate\Http\Request;

use Cras\Http\Requests;

use Cras\Processor;

use Validator;

class Monitoring extends Controller
{
    /*
    * initially called to return the view with the information
    */
    public function loadGraphs ()
    {
    	$usersprocessor = $this->getProcessors();
    	return view('monitoring')->with('processors', $usersprocessor);
    }

    /*
    * function reponsable for retreivin the information of the processors and sensors
    * like mac address name sensor type
    */
    private function getProcessors ()
    {
    	$processor =  new Processor();
    	$usersprocessor = $processor->getUserProcessor();
    	return $usersprocessor;
    }

    /*
    * returns section to ajax call to prevent refreshing the page 
    * and is easier than appending items dynamically through ajax
    */
    public function rerenderSection ()
    {
        $usersprocessor = $this->getProcessors();
        $sections = view('monitoring')->with('processors', $usersprocessor)
                                      ->renderSections();
        return $sections['navbar'];
    }

    /**
     * Create a new processor instance after a valid registration.
     * added random key generator   
     * @param  array  $data
     * @return User
     */
    public function addProcessor(Request $request)
    {
    	if ( !preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $request->get('mac'))) {
			return "400";
		}

    	$this->validate($request, [
           'processor_name' => 'required|max:50',
        ]);

        $bytes = openssl_random_pseudo_bytes(20, $cstrong);
        $hex   = bin2hex($bytes);

       	$processor = new Processor();
        $processor->processor_name = $request->get('processor_name');
        $processor->mac = $request->get('mac');
        $processor->user_id = $request->user()->id;
        $processor->auth_key = $hex;
        $processor->save();

        return "201";
    }

    /*
    * delete processor
    */
    public function deleteProcessor (Request $request)
    {
        return "test";
    }
}
