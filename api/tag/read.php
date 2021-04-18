<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Tag.php';

// Connect DB
$database = new Database();
$db = $database->connect();

// Tag init
$tag = new Tag($db);

// Query
$result = $tag->read();

// Get row count
$num = $result->rowCount();

// Check if any tags
// Retrieve data from table
if($num > 0) {
  $tags_arr = array();

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $tag_item = array(
      'id' => $id,
      'name' => $name,
    );

    // Push data
    array_push($tags_arr, $tag_item);

  }

  // set response code - 200 OK
  http_response_code(200);

  // Show data in JSON format
  echo json_encode(['status' => 200, 'data' => $tags_arr]);

} else {

  // set response code - 404 Not found
  http_response_code(404);

  // No tag
  echo json_encode(
    ['status' => 404, 'data' => 'No tag found']
  );
}


?>