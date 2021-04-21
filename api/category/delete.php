<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
  
// include database and object file
include_once '../../config/Database.php';
include_once '../../models/Category.php';
  
// get database connection
$database = new Database();
$db = $database->getConnection();
  
// prepare category object
$category = new Category($db);
  
// get category id
// $data = json_decode(file_get_contents("php://input"));
  
// set category id to be deleted
// $category->id = $data->id;

// Get Cate ID
$category->id = isset($_GET['id']) ? $_GET['id'] : die();
  
// delete the category
if($category->delete()){
  
    // set response code - 200 ok
    http_response_code(200);
  
    // tell the user
    echo json_encode(array('status' => 200, 'data' => "Category was deleted."));
}
  
// if unable to delete the category
else{
  
    // set response code - 503 service unavailable
    http_response_code(503);
  
    // tell the user
    echo json_encode(array('status' => 503, 'data' => "Unable to delete category."));
}
?>