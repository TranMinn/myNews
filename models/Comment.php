<?php

class Comment{
    // DB table names
    private $conn;
    private $table = "comment";

    // Category properties
    public $id;
    public $article_id;
    public $username;
    public $content;
    public $date_created;

    // Construct with DB
    public function __construct($db){
        $this->conn = $db;
    }

    // GET COMMENTS
    public function read(){
        // Query
        $query = 'SELECT a.title as title, cm.id, cm.article_id, cm.username, cm.content, cm.date_created
                                FROM ' . $this->table . ' cm
                                LEFT JOIN
                                  article a ON cm.article_id = a.id
                                ORDER BY
                                  cm.date_created DESC';

        // Prepared Statement
        $stmt = $this->conn->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    // GET ONE COMMENT
    public function read_one(){
        // Query
        $query = 'SELECT a.title as title, cm.id, cm.article_id, cm.username, cm.content, cm.date_created
                                FROM ' . $this->table . ' cm
                                LEFT JOIN
                                  article a ON cm.article_id = a.id
                                WHERE
                                  cm.id = ?
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
        $this->content = $row['content'];
        $this->username = $row['username'];
        $this->article_id = $row['article_id'];
        $this->title = $row['title'];
        $this->date_created = $row['date_created'];

    }

    // GET COMMENT BY ARTICLE ID
    public function read_article_cmt($article_id){
      // Query
      $query = 'SELECT id, article_id, username, content, date_created
                FROM ' . $this->table . '
                WHERE
                article_id = ?
                ORDER BY date_created
                DESC';

      // Prepared Statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $article_id);

      // Execute Query
      $stmt->execute();

      return $stmt;

      // $row = $stmt->fetch(PDO::FETCH_ASSOC);

      // Set Properties
      // $this->id = $row['id'];
      // $this->content = $row['content'];
      // $this->username = $row['username'];
      // $this->article_id = $row['article_id'];
      // $this->date_created = $row['date_created'];
    }


        
    // CREATE COMMENT
    public function create(){
        // Query
        $query = 'INSERT INTO ' . $this->table . ' 
                    SET 
                    article_id = :article_id, username = :username, 
                    content = :content';

        // Prepared Statement
        $stmt = $this->conn->prepare($query);

        // Clean Data
        $this->article_id = htmlspecialchars(strip_tags($this->article_id));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->content = htmlspecialchars(strip_tags($this->content));

        // Bind Data
        $stmt->bindParam(':article_id', $this->article_id);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':content', $this->content);

        // Execute Query
        if($stmt->execute()) {
            return true;
        }

        // Print Error if something goes wrong
        printf("Error: %s.\n", $stmt->error);

        return false;

    }

    // UPDATE COMMENT
    public function update(){
        // Query
        $query = 'UPDATE ' . $this->table . ' 
                    SET 
                    article_id = :article_id, username = :username, 
                    content = :content
                    WHERE
                    id = :id';

        // Prepared Statement
        $stmt = $this->conn->prepare($query);

        // Clean Data
        
        $this->article_id = htmlspecialchars(strip_tags($this->article_id));
        $this->username = htmlspecialchars(strip_tags($this->username));
        $this->content = htmlspecialchars(strip_tags($this->content));
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind Data
        
        $stmt->bindParam(':article_id', $this->article_id);
        $stmt->bindParam(':username', $this->username);
        $stmt->bindParam(':content', $this->content);
        $stmt->bindParam(':id', $this->id);
        
        // Execute Query
        if($stmt->execute()) {
            return true;
          }

          // Print Error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;


    }

    // DELETE COMMENT
    public function delete(){
        // Query
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

        // Prepared Statement
        $stmt = $this->conn->prepare($query);

        // Clean Data
        $this->id = htmlspecialchars(strip_tags($this->id));

        // Bind Data
        $stmt->bindParam(':id', $this->id);

        // Execute Query
        if($stmt->execute()) {
            return true;
          }

          // Print Error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }

}

?>