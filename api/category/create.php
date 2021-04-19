<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Category.php';

// Connect DB
$database = new Database();
$db = $database->connect();

// Category init
$category = new Category($db);

// get posted data
$data = json_decode(file_get_contents("php://input"));

if(
    
    !empty($data->name) 
    
){
   
    $category->name = $data->name;
    
    
// create the category
if($category->create()){
  
    // set response code - 201 created
    http_response_code(201);

    // tell the user
    echo json_encode(array('status' => 201, 'data' => "Category was created."));
}

// if unable to create the category, tell the user
else{

    // set response code - 503 service unavailable
    http_response_code(503);

    // tell the user
    echo json_encode(array('status' => 503, 'data' =>  "Unable to create Category!"));
}
}

// tell the user data is incomplete
else{

// set response code - 400 bad request
http_response_code(400);

// tell the user
echo json_encode(array('status' => 400, 'data' =>  "Unable to create category. Incomplete data!"));
}


?>