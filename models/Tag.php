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
    public function create() {
        //create query
        $query = 'INSERT INTO' . $this->table . '
          SET
            id = :id,
            name = :name,
            date_created = :date_created';
    
        // Prepared Statement
        $stmt = $this->conn->prepare($query);
    
        //clean data
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->title=htmlspecialchars(strip_tags($this->name));
        $this->date_created=htmlspecialchars(strip_tags($this->date_created));
     
        //bind data
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":date_created", $this->date_created);
     
         // execute query
         if($stmt->execute()){
          return true;
         }
          // error
          printf("Error: %s.\n", $stmt->error);
    
          return false;
      }
    

    // UPDATE TAG
    function update(){
  
        // update query
        $query = 'UPDATE
                    ' . $this->table_name . '
                SET
                id = :id,
                name = :name,
                date_created = :date_created,
                WHERE
                    id = :id';
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // clean data
        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->date_created=htmlspecialchars(strip_tags($this->date_created));
        
      
        // bind new values
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":date_created", $this->date_created);
        
       // execute query
       if($stmt->execute()){
        return true;
       }
        // error
        printf("Error: %s.\n", $stmt->error);
  
        return false;
    }

    // DELETE TAG
    function delete(){
  
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
      
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