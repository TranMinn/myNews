<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Category.php';

// Connect DB
$database = new Database();
$db = $database->connect();

// Category init
$category = new Category($db);

// Query
$result = $category->read();

// Get row count
$num = $result->rowCount();

// Check if any categories
// Retrieve data from table
if($num > 0) {
  $categories_arr = array();

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $category_item = array(
      'id' => $id,
      'name' => $name,
    );

    // Push data
    array_push($categories_arr, $category_item);

  }

  // set response code - 200 OK
  http_response_code(200);

  // Show data in JSON format
  echo json_encode(['status' => 200, 'data' => $categories_arr]);

} else {

  // set response code - 404 Not found
  http_response_code(404);

  // No category
  echo json_encode(
    ['status' => 404, 'data' => 'No category found']
  );
}


?>