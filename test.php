<?php

// Simple GET request


// Resource Address

$url = "http://localhost:8088/myNews/api/article/read.php";

// Send request to resource
$client = curl_init($url);

// Set options
curl_setopt($client, CURLOPT_URL, $url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

// get response 
$response = curl_exec($client);
curl_close($client);

$response = json_decode($response, true);

// echo $response;

if(isset($response['status'])){
    if($response['status'] == '200'){
        // echo '<pre>';
        // print_r($response['data']);

        ?>
        
        <table>
            <tr>
                <td>ID</td>
                <td>Title</td>
                <td>Author</td>
            </tr>

            <?php
              foreach($response['data'] as $list){
                  echo "<tr>
                    <td>".$list['id']."</td>
                    <td>".$list['title']."</td>
                    <td>".$list['author']."</td>
                    
                  </tr>";
              }  

            
            ?>

        </table>

        <?php

    }else{
        echo $response['data'];
    }
}else{
    echo "API failed!";
}




?>