<?php
class Database{
    private $host = HOST;
    private $db = DB;
    private $user = USER;
    private $pass = PASS;
    private $conn;
    private $stmt;

    /**Construct Database */
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage(); //perbaikin errornya
        }
    }

    /**Execute Query */
    public function callQuery($query){
        try{
            $this->stmt = $this->conn->prepare($query);
            $result = $this->stmt->execute();
        } catch (PDOException $e){
            echo 'Error: ' . $e->getMessage(); //perbaikin errornya
        }
    }

    /**Get all result */
    public function fetchAll(){
        return $this->stmt->fetchAll();
    }
}