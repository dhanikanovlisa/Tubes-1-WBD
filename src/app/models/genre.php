<?php

require_once DIRECTORY . '/../utils/database.php';
class GenreModel{
    private $table = 'genre';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**Get All Genre */
    public function getAllGenre(){
        $this->db->callQuery('SELECT * FROM ' . $this->table);
        return $this->db->fetchAllResult();
    }
    /**Get genre by Name*/
    public function getGenreByName($name){
        $this->db->callQuery('SELECT * FROM ' . $this->table . ' WHERE name = ' . $name);
        return $this->db->fetchAllResult();
    }
    /**Insert new genre*/
    public function addGenre($name){

    }
}