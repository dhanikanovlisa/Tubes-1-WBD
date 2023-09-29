<?php

require_once '../utils/database.php';
class FilmsModel{
    private $table = 'film';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**Get All Film unsorted*/
    public function getAllFilm(){
        $this->db->callQuery('SELECT * FROM WHERE ' . $this->table);
        $this->db->fetchAllResult();
    }

    /**Get All Film Sorted ASC/DESC*/
    public function getAllFilmSorted($attribute, $type){
        if($type =='ASC'){
            $this->db->callQuery('SELECT * FROM WHERE ' . $this->table .
                                 'ORDER BY ' . $attribute . 'ASC');
        } else {
            $this->db->callQuery('SELECT * FROM WHERE ' . $this->table .
                                 'ORDER BY ' . $attribute . 'DESC');
        }
    }
    
    /**Get Film by ID */
    /**Get Film by Name(String, Substring)*/
    /**Get Film by Genre*/

    /**Insert Film */
    /**Delete Film */
    /**Edit Film by IDFilm*/
}