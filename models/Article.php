<?php

class Article{
    // DB table names
    private $conn;
    private $table = "article";

    // Article properties
    public $id;
    public $cate_id;
    public $tag_id;
    public $title;
    public $intro;
    public $image;
    public $content;
    public $author;
    public $date_created;

    // Construct with DB
    public function __construct($db){
        $this->conn = $db;
    }

    // GET ARTICLES
    public function read(){
        // Query
        $query = 'SELECT c.name as category_name, t.name as tag_name, a.id, a.cate_id, a.tag_id, a.title, a.intro, a.image, a.content, a.author, a.date_created
                                FROM ' . $this->table . ' a
                                LEFT JOIN
                                  category c ON a.cate_id = c.id
                                LEFT JOIN
                                  tag t ON a.tag_id = t.id
                                ORDER BY
                                  a.date_created DESC';

        // Prepared Statement
        $stmt = $this->conn->prepare($query);

        // Execute Query
        $stmt->execute();

        return $stmt;
    }

    // GET ONE ARTICLE
    public function read_one(){
        // Query
        $query = 'SELECT c.name as category_name, t.name as tag_name, a.id, a.cate_id, a.tag_id, a.title, a.intro, a.image, a.content, a.author, a.date_created
                                FROM ' . $this->table . ' a
                                LEFT JOIN
                                category c ON a.cate_id = c.id
                                LEFT JOIN
                                tag t ON a.tag_id = t.id
                                WHERE
                                    a.id = ?
                                LIMIT 0,1';

        // Prepared Statement
        $stmt = $this->conn->prepare($query);

        // Bind ID
        $stmt->bindParam(1, $this->id);

        // Execute Query
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set Properties
        $this->title = $row['title'];
        $this->intro = $row['intro'];
        $this->image = $row['image'];
        $this->content = $row['content'];
        $this->author = $row['author'];
        $this->date_created = $row['date_created'];
        $this->cate_id = $row['cate_id'];
        $this->category_name = $row['category_name'];
        $this->tag_id = $row['tag_id'];
        $this->tag_name = $row['tag_name'];

    }

    // SEARCH ARTICLE
    public function search($keywords){
      // Query
      $query = 'SELECT c.name as category_name, t.name as tag_name, a.id, a.cate_id, a.tag_id, a.title, a.intro, a.image, a.content, a.author, a.date_created
      FROM ' . $this->table . ' a
      LEFT JOIN
        category c ON a.cate_id = c.id
      LEFT JOIN
        tag t ON a.tag_id = t.id
      WHERE
        a.title LIKE ? OR c.name LIKE ? OR t.name LIKE ?
      ORDER BY
        a.date_created DESC';

      // Prepared Statement
      $stmt = $this->conn->prepare($query);

      // Keyword
      $keywords = htmlspecialchars(strip_tags($keywords));
      $keywords = "%{$keywords}%";

      // Bind
      $stmt->bindParam(1, $keywords);
      $stmt->bindParam(2, $keywords);
      $stmt->bindParam(3, $keywords);

      // Execute Query
      $stmt->execute();

      return $stmt;

    }

    // GET ARTICLES BY CATEGORY
    public function get_by_cat($cate_id){
      // Query
      $query = 'SELECT c.name as category_name, t.name as tag_name, a.id, a.cate_id, a.tag_id, a.title, a.intro, a.image, a.content, a.author, a.date_created
                FROM ' . $this->table . ' a
                LEFT JOIN
                  category c ON a.cate_id = c.id
                LEFT JOIN
                  tag t ON a.tag_id = t.id
                WHERE
                cate_id = ?
                ORDER BY date_created
                DESC';

      // Prepared Statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $cate_id);

      // Execute Query
      $stmt->execute();

      return $stmt;
    }

    // GET ARTICLE BY TAG
    public function get_by_tag($tag_id){
      // Query
      $query = 'SELECT c.name as category_name, t.name as tag_name, a.id, a.cate_id, a.tag_id, a.title, a.intro, a.image, a.content, a.author, a.date_created
                FROM ' . $this->table . ' a
                LEFT JOIN
                  category c ON a.cate_id = c.id
                LEFT JOIN
                  tag t ON a.tag_id = t.id
                WHERE
                tag_id = ?
                ORDER BY date_created
                DESC';

      // Prepared Statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $tag_id);

      // Execute Query
      $stmt->execute();

      return $stmt;
    }

    // GET RELATED ARTICLES
    public function get_related($cate_id, $id){
      // Query
      $query = 'SELECT c.name as category_name, t.name as tag_name, a.id, a.cate_id, a.tag_id, a.title, a.intro, a.image, a.content, a.author, a.date_created
                FROM ' . $this->table . ' a
                LEFT JOIN
                  category c ON a.cate_id = c.id
                LEFT JOIN
                  tag t ON a.tag_id = t.id
                WHERE
                a.cate_id = ? 
                AND
                a.id != ?
                ORDER BY date_created
                DESC';

      // Prepared Statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $cate_id);
      $stmt->bindParam(2, $id);

      // Execute Query
      $stmt->execute();

      return $stmt;
    }

  // CREATE ARTICLE
  public function create() {
    //create query
    $query = 'INSERT INTO ' . $this->table . '
      SET
        title = :title,
        intro = :intro,
        image = :image,
        content = :content,
        author = :author,
        cate_id = :cate_id,
        tag_id = :tag_id';

    // Prepared Statement
    $stmt = $this->conn->prepare($query);

    //clean data
    $this->title=htmlspecialchars(strip_tags($this->title));
    $this->intro=htmlspecialchars(strip_tags($this->intro));
    $this->image=htmlspecialchars(strip_tags($this->image));
    $this->content=htmlspecialchars(strip_tags($this->content));
    $this->author=htmlspecialchars(strip_tags($this->author));
    $this->cate_id=htmlspecialchars(strip_tags($this->cate_id));
    $this->tag_id=htmlspecialchars(strip_tags($this->tag_id));

    //bind data
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":intro", $this->intro);
    $stmt->bindParam(":image", $this->image);
    $stmt->bindParam(":content", $this->content);
    $stmt->bindParam(":author", $this->author);
    $stmt->bindParam(":cate_id", $this->cate_id);
    $stmt->bindParam(":tag_id", $this->tag_id);

     // execute query
     if($stmt->execute()){
      return true;
     }
      // error
      printf("Error: %s.\n", $stmt->error);

      return false;
  }

    // UPDATE ARTICLE
    function update(){
  
      // update query
      $query = 'UPDATE ' . $this->table . '
              SET
              title = :title,
              intro = :intro,
              image = :image,
              content = :content,
              author = :author,
              cate_id = :cate_id,
              tag_id = :tag_id
              WHERE id = :id';
    
      // prepare query statement
      $stmt = $this->conn->prepare($query);
    
      // clean data
      
      $this->title=htmlspecialchars(strip_tags($this->title));
      $this->intro=htmlspecialchars(strip_tags($this->intro));
      $this->image=htmlspecialchars(strip_tags($this->image));
      $this->content=htmlspecialchars(strip_tags($this->content));
      $this->author=htmlspecialchars(strip_tags($this->author));
      $this->cate_id=htmlspecialchars(strip_tags($this->cate_id));
      $this->tag_id=htmlspecialchars(strip_tags($this->tag_id));
      $this->id=htmlspecialchars(strip_tags($this->id));
    
      // bind new values
      
      $stmt->bindParam(":title", $this->title);
      $stmt->bindParam(":intro", $this->intro);
      $stmt->bindParam(":image", $this->image);
      $stmt->bindParam(":content", $this->content);
      $stmt->bindParam(":author", $this->author);
      $stmt->bindParam(":cate_id", $this->cate_id);
      $stmt->bindParam(":tag_id", $this->tag_id);
      $stmt->bindParam(":id", $this->id);
    
     // execute query
     if($stmt->execute()){
      return true;
     }
      // error
      printf("Error: %s.\n", $stmt->error);

      return false;
  }

    // DELETE ARTICLE
    function delete(){
  
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