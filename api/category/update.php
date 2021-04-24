<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../config/Database.php';
include_once '../../models/Category.php';
  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare category object
$category = new Category($db);
  
// get id of category to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of category to be edited
$category->id = $data->id;
  
// set category property values

$category->name = $data->name;


  
// update the category
if($category->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array('status' => 200, 'data' => "Category was updated."));
}
  
// if unable to update the category, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array('status' => 503, 'data' => "Unable to update category!"));
}
?>