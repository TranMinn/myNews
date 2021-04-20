<?php

include 'consume.php';

    $url = "http://localhost:8088/myNews/api/article/read.php";

    $data = consume($url);

    // echo count($data);

    // $result = implode(' ', $data);

    // print_r($data[0]);
    
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

<!-- <h2>Hello</h2> -->