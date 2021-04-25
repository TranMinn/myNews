<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../config/Database.php';
include_once '../../models/Tag.php';
  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare tag object
$tag = new Tag($db);
  
// get id of tag to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of tag to be edited
$tag->id = $data->id;
  
// set tag property values

$tag->name = $data->name;


  
// update the tag
if($tag->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array('status' => 200, 'data' => "Tag was updated."));
}
  
// if unable to update the tag, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array('status' => 503, 'data' => "Unable to update tag!"));
}
?>