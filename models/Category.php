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

    }

        
    // TO-DO:
        
    // CREATE CATE
    public function create() {
        //create query
        $query = 'INSERT INTO ' . $this->table . '
                 SET
                name = :name';
    
        // Prepared Statement
        $stmt = $this->conn->prepare($query);
    
        //clean data
        $this->name=htmlspecialchars(strip_tags($this->name));
     
        //bind data
        $stmt->bindParam(":name", $this->name);
     
         // execute query
        if($stmt->execute()){
            return true;
        }
          // error
          printf("Error: %s.\n", $stmt->error);
    
          return false;
      }

    // UPDATE CATE
    public function update(){
  
        // update query
        $query = 'UPDATE
                    ' . $this->table . '
                SET
                name = :name
                WHERE
                    id = :id';
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // clean data
        
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->id=htmlspecialchars(strip_tags($this->id));
      
        // bind new values
        
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":id", $this->id);
        
       // execute query
       if($stmt->execute()){
        return true;
       }
        // error
        printf("Error: %s.\n", $stmt->error);
  
        return false;
    }
    // DELETE CATE
    public function delete(){
  
        // delete query
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
      
        // prepare query
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
      
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
      
        // execute query
       if($stmt->execute()){
        return true;
       }
        // error
        printf("Error: %s.\n", $stmt->error);
  
        return false;
    }

}

?>