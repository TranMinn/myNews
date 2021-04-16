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


    // CREATE ARTICLE

    // UPDATE ARTICLE

    // DELETE ARTICLE
    

}


?>