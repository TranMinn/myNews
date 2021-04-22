<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Comment.php';

    // Connect DB
    $database = new Database();
    $db = $database->connect();

    // Comment init
    $comment = new Comment($db);

    // Get Comment ID
    $comment->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get Comment
    $comment->read_one();

    // Retrieve data
    $comment_arr = array(
        'id' => $comment->id,
        'article_id' => $comment->article_id,
        'username' => $comment->username,
        'content' => $comment->content,
        'title' => $comment->title,
        'date_created' => $comment->date_created
      );

    // JSON
    // print_r(json_encode($comment_arr));
    echo json_encode(['status' => 200, 'data' => $comment_arr]);

?>