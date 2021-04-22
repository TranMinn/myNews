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

    // Get Article ID
    $article_id = isset($_GET['a_id']) ? $_GET['a_id'] : "";

    // Get Comment
    $result = $comment->read_article_cmt($article_id);

    // Get row count
    $num = $result->rowCount();

    if($num > 0){
      $comments_arr = array();

      while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        // Retrieve data
      $comment_item = array(
      'id' => $id,
      'article_id' => $article_id,
      'username' => $username,
      'content' => $content,
      'date_created' => $date_created
    );

    // Push data
    array_push($comments_arr, $comment_item);

    }
  // set response code - 200 OK
  http_response_code(200);

  // Show data in JSON format
  echo json_encode(['status' => 200, 'data' => $comments_arr]);

}else{
  // set response code - 404 Not found
  http_response_code(404);

  // No Article
  echo json_encode(
    ['status' => 404, 'data' => 'No Comment found']
  );
}

?>