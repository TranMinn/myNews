<?php

class Admin{
    private $conn;
    private $table = "admin";

    public $id;
    public $username;
    public $password;

    // Construct with DB
    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){

        // GET ADMIN ACCOUNT
        $query = 'SELECT id, username, password FROM ' . $this->table . ' ';

        // Prepared Statement
        $stmt = $this->conn->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    } 
    
}



?>