<?php

include 'consume.php';

// Simple GET request
$url = "http://localhost:8088/myNews/api/article/read_one.php?id=2";

$data = consume($url);

?>

        <div>
            <img src="articleImages/<?php echo htmlentities($data['image']);?>" alt="<?php echo htmlentities($data['title']);?>">
            <div>
              <h2><?php echo htmlentities($data['title']);?></h2>
                 <p><b>Author : </b><?php echo htmlentities($data['author']);?></a> </p>
       
              <a href="">Read More &rarr;</a>
            </div>

