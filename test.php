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
        

            <?php
              foreach($response['data'] as $list){?>

        <div>
            <img src="articleImages/<?php echo htmlentities($list['image']);?>" alt="<?php echo htmlentities($list['title']);?>">
            <div>
              <h2><?php echo htmlentities($list['title']);?></h2>
                 <p><b>Author : </b><?php echo htmlentities($list['author']);?></a> </p>
       
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