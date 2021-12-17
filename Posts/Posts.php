<?php

class Posts{

    private $conn;

    public function __construct($db){
        $this->conn = $db;
    }


    public function read(){
        $query = 'SELECT * FROM posts';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readSingle($id){
        $query = 'SELECT * FROM posts WHERE id = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt;
    }


    public function add($pname, $ptext){
        $query = 'INSERT INTO posts(post_name, post_text) VALUES(?,?)';
        $stmt = $this->conn->prepare($query);
        if($stmt->execute([$pname, $ptext])){
            return true;
        }
        else{
            return false;
        }
    }

    public function delete($name){
        $query = 'DELETE  FROM posts where post_name = ?';
        $stmt = $this->conn->prepare($query);
        if($stmt->execute([$name])){
            return true;
        }
        else{
            return false;
        }
    }


}









?>
