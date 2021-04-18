<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Article.php';

// Connect DB
$database = new Database();
$db = $database->connect();

// Article init
$article = new Article($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->title) &&
    !empty($data->intro) &&
    !empty($data->image) &&
    !empty($data->content) &&
    !empty($data->author) &&
    !empty($data->cate_id) &&
    !empty($data->tag_id) 
){
    $article->title = $data->title;
    $article->intro = $data->intro;
    $article->image = $data->image;
    $article->content = $data->content;
    $article->author = $data->author;
    $article->cate_id = $data->cate_id;
    $article->tag_id = $data->tag_id;

// create the Article
if($article->create()){
  
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array('status' => 201, 'data' => "Article was created."));
}

// if unable to create the Article, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array('status' => 503, 'data' =>  "Unable to create Article!"));
}
}

// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array('status' => 400, 'data' =>  "Unable to create Article. Incomplete data!"));
}


?>