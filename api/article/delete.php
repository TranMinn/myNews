<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object file
include_once '../../config/Database.php';
include_once '../../models/Article.php';
  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare article object
$article = new Article($db);

// Get Article ID
$article->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// delete the article
if($article->delete()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array('status' => 200, 'data' => "Article was deleted."));
}
  
// if unable to delete the article
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array('status' => 503, 'data' => "Unable to delete article."));
}
?>