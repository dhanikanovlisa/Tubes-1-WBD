<?php

require_once DIRECTORY . '/../utils/database.php';

class FilmsModel
{
    private $table = 'film';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**Get All Film unsorted*/
    public function getAllFilm()
    {
        $this->db->callQuery('SELECT * FROM ' . $this->table);
        return $this->db->fetchAllResult();
    }

    /**Get All Film Sorted ASC/DESC*/
    public function getAllFilmSorted($attribute, $type)
    {
        if ($type == 'ASC') {
            $this->db->callQuery('SELECT * FROM ' . $this->table . ' ORDER BY ' . $attribute . ' ASC');
        } else {
            $this->db->callQuery('SELECT * FROM ' . $this->table . ' ORDER BY ' . $attribute . ' DESC');
        }
        return $this->db->fetchAllResult();
    }

    /**Get Film by ID */
    public function getFilmByID($id)
    {
        $this->db->callQuery('SELECT * FROM ' . $this->table . ' WHERE film_id = ' . $id);
        return $this->db->fetchResult();
    }

    /**Get Film by Name(String, Substring)*/
    public function getFilmByName($name)
    {
        $this->db->callQuery('SELECT * FROM ' . $this->table . ' WHERE title LIKE "%' . $name . '%"');
        return $this->db->fetchResult();
    }

    /**Get Film by Genre*/
    public function getFilmByGenre($genreID)
    {
        $this->db->callQuery('SELECT * FROM ' . $this->table . ' WHERE genre_id = ' . $genreID);
        return $this->db->fetchResult();
    }

    /**Insert Film */
    public function insertFilm($genre_id, $title, $description, $film_path, $film_poster, $date_release, $duration)
    {
        
    }

    /**Delete Film */
    public function deleteFilm($id)
    {

    }

    /**Edit Film by IDFilm*/
    public function editFilm($genre_id, $title, $description, $film_path, $film_poster, $date_release, $duration)
    {
      
    }
}