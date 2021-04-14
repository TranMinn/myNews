<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Article.php';

// Connect DB
$database = new Database();
$db = $database->connect();

// Article init
$article = new Article($db);

// Query
$result = $article->read();

// Get row count
$num = $result->rowCount();

// Check if any articles
if($num > 0) {
  $articles_arr = array();

  while($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);

    $article_item = array(
      'id' => $id,
      'title' => $title,
      'intro' => html_entity_decode($intro),
      'content' => html_entity_decode($content),
      'author' => $author,
      'cate_id' => $cate_id,
      'category_name' => $category_name,
      'tag_id' => $tag_id,
      'tag_name' => $tag_name,
    );

    // Push data
    array_push($articles_arr, $article_item);
  }

  // Turn to JSON & output
  echo json_encode($articles_arr);

} else {
  // No Posts
  echo json_encode(
    array('message' => 'No Article Found')
  );
}








?>