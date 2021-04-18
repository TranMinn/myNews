<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object file
include_once '../../config/Database.php';
include_once '../../models/Comment.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare comment object
$comment = new Comment($db);
  
// get comment id
$data = json_decode(file_get_contents("php://input"));
  
// set comment id to be deleted
$comment->id = $data->id;
  
// delete the comment
if($comment->delete()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array('status' => 200, 'data' => "Comment was deleted."));
}
  
// if unable to delete the comment
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array('status' => 503, 'data' => "Unable to delete comment."));
}
?>