<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Category.php';

    // Connect DB
    $database = new Database();
    $db = $database->connect();

    // category init
    $category = new Category($db);

    // Get category ID
    $category->id = isset($_GET['id']) ? $_GET['id'] : die();

    // Get category
    $category->read_one();

    // Retrieve data
    $category_arr = array(
        'id' => $category->id,
        'name' => $category->name,
      );

    // JSON
    // print_r(json_encode($category_arr));
    echo json_encode(['status' => 200, 'data' => $category_arr]);

?>