<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Tag.php';

// Connect DB
$database = new Database();
$db = $database->connect();

// Tag init
$tag = new Tag($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

if(
    
    !empty($data->name) 
    
){
    
    $tag->name = $data->name;
    
    
// create the tag
if($tag->create()){
  
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array('status' => 201, 'data' => "Tag was created."));
}

// if unable to create the tag, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array('status' => 503, 'data' =>  "Unable to create Tag!"));
}
}

// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array('status' => 400, 'data' =>  "Unable to create tag. Incomplete data!"));
}


?>