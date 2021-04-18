<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Article.php';

    // Connect DB
    $database = new Database();
    $db = $database->connect();

    // Article init
    $article = new Article($db);

    // Get Article ID
    $article->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get Article
    $article->read_one();

    // Retrieve data
    $article_arr = array(
        'id' => $article->id,
        'title' => $article->title,
        'intro' => $article->intro,
        'image' => $article->image,
        'content' => $article->content,
        'author' => $article->author,
        'date_created' => $article->date_created,
        'cate_id' => $article->cate_id,
        'category_name' => $article->category_name,
        'tag_id' => $article->tag_id,
        'tag_name' => $article->tag_name,
      );

    // JSON
    // print_r(json_encode($article_arr));
    echo json_encode(['status' => 200, 'data' => $article_arr]);

?>