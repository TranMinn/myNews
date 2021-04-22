<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Comment.php';

// Connect DB
$database = new Database();
$db = $database->connect();

// Comment init
$comment = new Comment($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

if(
    !empty($data->article_id) &&
    !empty($data->username) &&
    !empty($data->content)
    
){
    $comment->article_id = $data->article_id;
    $comment->username = $data->username;
    $comment->content = $data->content;
    
// create the comment
if($comment->create()){
  
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array('status' => 201, 'data' => "Comment was created."));
}

// if unable to create the comment, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array('status' => 503, 'data' =>  "Unable to create Comment!"));
}
}

// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array('status' => 400, 'data' =>  "Unable to create Comment. Incomplete data!"));
}


?>