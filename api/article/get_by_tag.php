<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Article.php';

    // Connect DB
    $database = new Database();
    $db = $database->connect();

    // Comment init
    $article = new Article($db);

    // Get Category ID
    $tag_id = isset($_GET['t_id']) ? $_GET['t_id'] : "";

    // Get Articles
    $result = $article->get_by_tag($tag_id);

    // Get row count
    $num = $result->rowCount();

    if($num > 0){
      $articles_arr = array();

      while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        // Retrieve data
      $article_item = array(
        'id' => $id,
        'title' => $title,
        'intro' => html_entity_decode($intro),
        'image' => $image,
        'content' => html_entity_decode($content),
        'author' => $author,
        'date_created' => $date_created,
        'cate_id' => $cate_id,
        'category_name' => $category_name,
        'tag_id' => $tag_id,
        'tag_name' => $tag_name,
    );

    // Push data
    array_push($articles_arr, $article_item);

    }
  // set response code - 200 OK
  http_response_code(200);

  // Show data in JSON format
  echo json_encode(['status' => 200, 'data' => $articles_arr]);

}else{
  // set response code - 404 Not found
  http_response_code(404);

  // No Article
  echo json_encode(
    ['status' => 404, 'data' => 'No Article found']
  );
}

?>