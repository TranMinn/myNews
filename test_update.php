<?php

include 'consume.php';

if(isset($_POST['update'])){
    $id=43;

    $title = $_POST['title'];
    $intro = $_POST['intro'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $cat = $_POST['category'];
    $tag = $_POST['tag'];

    // Get submitted image file
    if(isset($_FILES['image'])){
        $image = $_FILES['image']['name'];
    }

    // The path to store uploaded image
    $target = "articleImages/".basename($_FILES['image']['name']);

    $form_data = array(
        'title' => $title,
        'intro' => $intro,
        'author' => $author,
        'content' => $content,
        'cate_id' => $cat,
        'tag_id' => $tag,
        'image' => $image,
        'id' => $id
    );

$api_url = "http://localhost:8088/myNews/api/article/update.php";

$client = curl_init($api_url);
curl_setopt($client, CURLOPT_URL, $api_url);
curl_setopt($client, CURLOPT_POST, true);
// curl_setopt($client, CURLOPT_CUSTOMREQUEST, "PUT");
// curl_setopt($client, CURLOPT_POSTFIELDS, json_encode($form_data));
curl_setopt($client, CURLOPT_POSTFIELDS, json_encode($form_data));
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($client);



if($e = curl_error($client)){
    echo $e;
}else{
    $response = json_decode($response, true);
    // Move uploaded image to folder articleImages
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        echo "Edit successfully";
    }else{
        echo "Edit failed";
    }
}
curl_close($client);

}


?>


<?php
    // Resource Address
    $url = "http://localhost:8088/myNews/api/article/read_one.php?id=43";

    $data = consume($url);

    ?>

    <form action = "test_update.php" method = "POST" enctype="multipart/form-data">
    
        <div>
        
            <label for="exampleInputEmail1">Title</label>
            <input type="text" id="title" value="<?php echo htmlentities($data['title']);?>" name="title" placeholder="Enter title" required>

        </div>
            <label>Category</label>
            <select name="category" id="category" required>
            <option value="<?php echo htmlentities($data['cate_id']);?>"><?php echo htmlentities($data['category_name']);?></option>

            <!-- Category options -->
                <?php 
                
                $url_cat = "http://localhost:8088/myNews/api/category/read.php";
                
            
                $cate = consume($url_cat);
                
                for($i = 0; $i < count($cate); $i++){ ?>

                    <option value="<?php echo htmlentities($cate[$i]['id']);?>"><?php echo htmlentities($cate[$i]['name']);?></option>

                <?php } ?>

            </select>  

        <div>
            <select class="form-control" name="tag" id="tag" required>
                <option value="<?php echo htmlentities($data['tag_id']);?>"><?php echo htmlentities($data['tag_name']);?></option>
                    <!-- Tag options -->
                    <?php 

                    $url_tag = "http://localhost:8088/myNews/api/tag/read.php";
                    $tag = consume($url_tag);
                    
                    for($i = 0; $i < count($tag); $i++){ ?>

                    <option value="<?php echo htmlentities($tag[$i]['id']);?>"><?php echo htmlentities($tag[$i]['name']);?></option>
                
                    <?php } ?>

            </select>  

        </div>

        <div>
            <h4><b>Author</b></h4>
            <textarea name="author" required><?php echo htmlentities($data['author']);?></textarea>

        <div>

        <div>
            <h4><b>Intro</b></h4>
            <textarea name="intro" required><?php echo htmlentities($data['intro']);?></textarea>

        <div>

        <div>
            <h4><b>Article Content</b></h4>
            <textarea name="content" required><?php echo htmlentities($data['content']);?></textarea>

        <div>

        <div>
            <h4><b>Article Content</b></h4>
            <textarea name="content" required><?php echo htmlentities($data['content']);?></textarea>

        <div>

        <div>
            <h4><b>Image</b></h4>
            <img src="articleImages/<?php echo htmlentities($data['image']);?>" width="300"/>
            <br />
            <p>Update Image</p>
            <input type="file" class="form-control" id="image" name="image">

        </div>

        <button type="submit" name="update">Update </button>
 
    </form>