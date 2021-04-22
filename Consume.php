<?php


    function consume($url){
        // Send request to resource
        $client = curl_init($url);

        // Set options
        curl_setopt($client, CURLOPT_URL, $url);
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        // Get response 
        $response = curl_exec($client);
        curl_close($client);

        // Decode response
        $response = json_decode($response, true);

        if(isset($response['status'])){
            if($response['status'] == '200' || $response['status'] == '201'){
                $data = $response['data'];
                return $data;
            }else{
                return $response['data'];
            }

        }else{
            echo "API failed!";
        }

        // return $data;
    }



?>