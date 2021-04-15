<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Comment.php';

// Connect DB
$database = new Database();
$db = $database->connect();

// Comment init
$comment = new Comment($db);

// Query
$result = $comment->read();

// Get row count
$num = $result->rowCount();

// Check if any comments
// Retrieve data from table
if($num > 0) {
  $comments_arr = array();

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $comment_item = array(
      'id' => $id,
      'article_id' => $article_id,
      'username' => $username,
      'content' => html_entity_decode($content),
      'title' => $title,

    );

    // Push data
    array_push($comments_arr, $comment_item);

  }

  // set response code - 200 OK
  http_response_code(200);

  // Show data in JSON format
  echo json_encode(['status' => 200, 'data' => $comments_arr]);

} else {

  // set response code - 404 Not found
  http_response_code(404);

  // No Article
  echo json_encode(
    ['status' => 404, 'data' => 'No Comment found']
  );
}

?>