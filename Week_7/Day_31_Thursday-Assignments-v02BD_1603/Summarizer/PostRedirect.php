<?php
require_once 'config.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        if(isset($_POST['text'])){
            $text = $_POST['text'];
            $sum = call_api('summarize', array('title' => 'test', 'text' => $text, 'sentences_number' => 5));
            echo implode($sum->sentences),
            PHP_EOL;    
        }else{
            $url  = $_POST['url_page'];
            $page = get_htmlcontent($url);
            echo $page;
        }
        
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

    function get_htmlcontent ($urlTaget)
    {
        $htmlelements = file_get_contents($urlTaget);
        echo $htmlelements;
    }
?>