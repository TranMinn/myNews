<?php

class Tag{
    // DB table names
    private $conn;
    private $table = "tag";

    // Category properties
    public $id;
    public $name;
    public $date_created;

    // Construct with DB
    public function __construct($db){
        $this->conn = $db;
    }

    // GET TAGS
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

    // GET ONE TAG
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

        
    // CREATE TAG

    // UPDATE TAG

    // DELETE TAG

    }

}

?>