<?php
require_once "RequestListener.php";
require_once "PostRequest.php";
require_once "config.php";

// $post = new PostRequest();

$request = new RequestListener($_REQUEST);
$post = new PostRequest($request->SENSORTYPE, $request->SENSORVALUE);