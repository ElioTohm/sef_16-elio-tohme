<?php
require_once 'config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $url = $_POST['url'];
        $sum = call_api('summarize', array('url' => $url, 'sentences_number' => 3));

        echo implode($sum->sentences),
        PHP_EOL;
    }
    
    function call_api($endpoint, $parameters) {
        $ch = curl_init('https://api.aylien.com/api/v1/' . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Accept: application/json',
            'X-AYLIEN-TextAPI-Application-Key: ' . APPLICATION_KEY,
            'X-AYLIEN-TextAPI-Application-ID: '. APPLICATION_ID
        ));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response);
    }

?>