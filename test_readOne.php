<?php

// Simple GET request

$url = "http://localhost:8088/myNews/api/article/read_one.php?id=2";

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
        echo '<pre>';

        $data = $response['data'];

        ?>

        <div>
            <img src="articleImages/<?php echo htmlentities($data['image']);?>" alt="<?php echo htmlentities($data['title']);?>">
            <div>
              <h2><?php echo htmlentities($data['title']);?></h2>
                 <p><b>Author : </b><?php echo htmlentities($data['author']);?></a> </p>
       
              <a href="">Read More &rarr;</a>
            </div>

        <?php
    }else{
        echo $response['data'];
    }
}else{
    echo "API failed!";
}

?>




?>