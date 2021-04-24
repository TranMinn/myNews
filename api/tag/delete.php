<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object file
include_once '../../config/Database.php';
include_once '../../models/Tag.php';
  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare tag object
$tag = new Tag($db);
  
// get tag id
// $data = json_decode(file_get_contents("php://input"));
  
// set tag id to be deleted
// $tag->id = $data->id;

// Get Tag ID
$tag->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// delete the tag
if($tag->delete()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array('status' => 200, 'data' => "Tag was deleted."));
}
  
// if unable to delete the tag
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array('status' => 503, 'data' => "Unable to delete tag."));
}
?>