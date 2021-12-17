<?php

class Database{
    private $dsn = 'mysql:host=localhost;dbname=khalid';
    private $conn;
    public function connect(){
        $this->conn = null;
        try{
            $this->conn = new PDO($this->dsn, 'root', '');
        }catch(PDOException $e){
            echo "CONNECTION ERROR: ".$e->getMessage();
        }

        return $this->conn;
    }
}

?>