<?php

// Simple GET request

// Resource Address

$key = 'biden';

$url = "http://localhost:8088/myNews/api/article/search.php?s=$key";

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

        $data = $response['data'];

        ?>
        <?php
        for($i = 0; $i < count($data); $i++){
            ?> 

            <div>
            <img src="articleImages/<?php echo htmlentities($data[$i]['image']);?>" alt="<?php echo htmlentities($data[$i]['title']);?>">
            <div>
              <h2><?php echo htmlentities($data[$i]['title']);?></h2>
                 <p><b>Author : </b><?php echo htmlentities($data[$i]['author']);?></a> </p>
       
              <a href="">Read More &rarr;</a>
            </div>

        <?php } ?>

        <?php
    }else{
        echo $response['data'];
    }
}else{
    echo "API failed!";
}

?>




?>