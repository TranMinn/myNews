<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object files
include_once '../../config/Database.php';
include_once '../../models/Article.php';
  
// get database connection
$database = new Database();
$db = $database->connect();
  
// prepare article object
$article = new Article($db);
  
// get id of article to be edited
$data = json_decode(file_get_contents("php://input"));
  
// set ID property of article to be edited
$article->id = $data->id;
  
// set article property values
$article->title = $data->title;
$article->intro = $data->intro;
$article->image = $data->image;
$article->content = $data->content;
// $article->date_created = date('Y-m-d H:i:s');
$article->author = $data->author;
$article->cate_id = $data->cate_id;
$article->tag_id = $data->tag_id;
  
// update the article
if($article->update()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array('status' => 200, 'data' => "Article was updated."));
}
  
// if unable to update the article, tell the user
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array('status' => 503, 'data' => "Unable to update Article."));
}
?>