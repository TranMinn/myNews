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

    // Get tag ID
    $tag->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get tag
    $tag->read_one();

    // Retrieve data
    $tag_arr = array(
        'id' => $tag->id,
        'name' => $tag->name,
      );

    // JSON
    // print_r(json_encode($tag_arr));
    echo json_encode(['status' => 200, 'data' => $tag_arr]);

?>