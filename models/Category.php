<?php

class Category{
    // DB table names
    private $conn;
    private $table = "category";

    // Category properties
    public $id;
    public $name;
    public $date_created;

    // Construct with DB
    public function __construct($db){
        $this->conn = $db;
    }

    // GET CATEGORIES
    public function read(){
        // Query
        $query = 'SELECT id, name, date_created 
                    FROM ' . $this->table . '
                    ORDER BY date_created DESC';

        // Prepared Statement
        $stmt = $this->conn->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    // GET ONE CATEGORY
    public function read_one(){
        // Query
        $query = 'SELECT id, name, date_created 
                    FROM ' . $this->table . '
                    WHERE id = ?
                    LIMIT 0,1';

        // Prepared Statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute Query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set Properties
        $this->id = $row['id'];
        $this->name = $row['name'];

        
    // CREATE ARTICLE

    // UPDATE ARTICLE

    // DELETE ARTICLE

    }

}

?>