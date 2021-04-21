<?php

if(isset($_POST['submit'])){

    // $form_data = array(
    //     'cate_id' => '2',
    //     'tag_id' => '1',
    //     'title' => 'New abc',
    //     'intro' => 'intro',
    //     'image' => 'image.jpg',
    //     'content' => 'content abc',
    //     'author' => 'hihi'
    //         );

    $title = $_POST['title'];
    $intro = $_POST['intro'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $cat = $_POST['category'];
    $tag = $_POST['tag'];
    // $image = $_POST['image'];

    if(isset($_FILES['image'])){
        $image = $_FILES['image']['name'];
    }
   
    echo $image;


    $form_data = array(
        'title' => $title,
        'intro' => $intro,
        'author' => $author,
        'content' => $content,
        'cate_id' => $cat,
        'tag_id' => $tag,
        'image' => $image
    );


    $target = "articleImages/".basename($_FILES['image']['name']);


    $api_url = "http://localhost:8088/myNews/api/article/create.php";

    $client = curl_init($api_url);
    curl_setopt($client, CURLOPT_URL, $api_url);
    curl_setopt($client, CURLOPT_POST, true);
    curl_setopt($client, CURLOPT_POSTFIELDS, json_encode($form_data));
    curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($client);


    if($e = curl_error($client)){
        echo $e;
    }else{
        $response = json_decode($response, true);

        echo "Uploaded successfully";

        // Move uploaded image to folder articleImages
        if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
            $msg = "Uploaded successfully";
        }else{
                $error = "Upload failed";
        }
    }

    curl_close($client);



    

}


?>

<div>

<form action = "test_create.php" method="POST" enctype="multipart/form-data">

    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
    <input type="file" class="form-control" id="image" name="image" placeholder="Enter image" required />
    <input type="text" class="form-control" id="intro" name="intro" placeholder="Enter intro" required>
    <input type="text" class="form-control" id="content" name="content" placeholder="Enter content" required>
    <input type="text" class="form-control" id="author" name="author" placeholder="Enter author" required>
        <select class="form-control" name="category" id="category" required>
                <!-- Tag options -->
                <option value="1">1</option>
                <option value="2">2</option>
            
        </select> 

        <select class="form-control" name="tag" id="tag" required>
                <!-- Tag options -->
                <option value="1">1</option>
                <option value="2">2</option>
            
        </select> 

    <button type="submit" name="submit">Save and Post</button>
        <button type="button">Discard</button>

    </form>
</div>

<img src="../articleImages/<?php echo htmlentities($image);?>">
