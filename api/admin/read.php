<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../config/Database.php';
include_once '../../models/Admin.php';

// Connect DB
$database = new Database();
$db = $database->connect();

// Admin init
$admin = new Admin($db);

// Query
$result = $admin->read();

// Get row count
$num = $result->rowCount();

if($num > 0){
    $admin_array = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);

        $admin_item = array(
            'id' => $id,
            'username' => $username,
            'password' => $password
        ); 

        // Push data
        array_push($admin_array, $admin_item);
    }

    // set response code - 200 OK
  http_response_code(200);

  // Show data in JSON format
  echo json_encode(['status' => 200, 'data' => $admin_array]);

}else{
   // set response code - 404 Not found
  http_response_code(404);

  // No Article
  echo json_encode(
    ['status' => 404, 'data' => 'No Admin Account found']
  ); 
}

?>