<?php

namespace Cras\Http\Controllers;

use Illuminate\Http\Request;

use Cras\Http\Requests;

use Cras\Processor;

use Cras\Sensor;

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
    public function addProcessor (Request $request)
    {
        $data = json_decode($request->getContent(),true);
    	if (!preg_match('/([a-fA-F0-9]{2}[:|\-]?){6}/', $data['mac'])) {
			return "400";
		}

        $bytes = openssl_random_pseudo_bytes(20, $cstrong);
        $hex = bin2hex($bytes);

       	$processor = new Processor();
        $processor->processor_name = $data['processorname'];
        $processor->mac = $data['mac'];
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
        $data = json_decode($request->getContent(),true);

        $processor = new Processor();
        $processor->deleteUserProcessor($data['id']);

        return '201';
    }

    /*
    * update an existing processor
    */
    public function updateProcessor (Request $request)
    {
        $data = json_decode($request->getContent(),true);

        $processor = new Processor();
        $processor->updateuserProcessor($data['id'],$data['mac'],$data['processorname']);
        
        return '201';
    }

    /*
    * add sensor
    */
    public function addSensor (Request $request)
    {
        $data = json_decode($request->getContent(),true);

        $sensor = new Sensor();
        $sensor->processor_id = $data['processor'];
        $sensor->sensor_type = $data['type'];
        $sensor->save();

        return "201";
    }

    /*
    * delete sensor
    */
    public function deleteSensor (Request $request)
    {
        $data = json_decode($request->getContent(),true);

        $sensor = new Sensor();
        $sensor->deleteSensor($data['sensor']);
    }
}
