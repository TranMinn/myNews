<?php

include 'consume.php';

// Resource Address

$url = "http://localhost:8088/myNews/api/article/read.php";

$data = consume($url);
?>

        <!-- Control with variable i -->

        <div>
            <img src="articleImages/<?php echo htmlentities($data[4]['image']);?>" alt="<?php echo htmlentities($data[4]['title']);?>">
            <div>
              <h2><?php echo htmlentities($data[4]['title']);?></h2>
                 <p><b>Author : </b><?php echo htmlentities($data[4]['author']);?></a> </p>
       
              <a href="">Read More &rarr;</a>
            </div>

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


?>