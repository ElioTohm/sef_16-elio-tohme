<?php
            define('APPLICATION_ID',    '87c00c04');
            define('APPLICATION_KEY',   '3e78195a7687a2642fcbec23e540f46c');

            if($_SERVER['REQUEST_METHOD'] === 'POST')
            {
                $url = 'https://medium.freecodecamp.com/the-art-of-computer-programming-by-donald-knuth-82e275c8764f#.undnextd0';
                $sum = call_api('summarize', array('url' => $url, 'sentences_number' => 3));

                echo print(implode($sum->sentences)),
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
                return json_decode($response);
            }
            
        ?>