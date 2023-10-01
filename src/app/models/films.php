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
    public function getFilmGenre($id)
    {
        $this->db->callQuery("SELECT genre.name
        FROM genre JOIN film_genre ON genre.genre_id = film_genre.genre_id
        JOIN film ON film_genre.film_id = film.film_id WHERE film.film_id = :filmid;");
        $this->db->bind('filmid', $id);
        return $this->db->fetchAllResult();
    }

    /**Insert Film */
    public function insertFilm($title, $description, $film_path, $film_poster, $date_release, $duration)
    {
        $this->db->callQuery("INSERT INTO film(title, description, film_path, film_poster, date_release, duration)
            VALUES (:title, :description, :film_path, :film_poster, :date_release, :duration);");
        
        $this->db->bind('title', $title);
        $this->db->bind('description', $description);
        $this->db->bind('film_path', $film_path);
        $this->db->bind('film_poster', $film_poster);
        $this->db->bind('date_release', $date_release);
        $this->db->bind('duration', $duration);
        
        $this->db->execute();
    }
    

    /**Delete Film */
    public function deleteFilm($id)
    {
        /**Delete from watchlist */
        $this->db->callQuery('DELETE FROM watchlist WHERE film_id = ' . $id);
        $this->db->execute();
        /**Delete film genre */
        $this->db->callQuery('DELETE FROM film_genre WHERE film_id = ' . $id);
        $this->db->execute();
        /**Delete film */
        $this->db->callQuery('DELETE FROM ' . $this->table . ' WHERE film_id = ' . $id);
        $this->db->execute();
    }

    /**Edit Film by IDFilm*/
    public function editFilm($genre_id, $title, $description, $film_path, $film_poster, $date_release, $duration)
    {
      
    }

    public function getLastIDFilm(){
        return $this->db->lastInsertID();
    }
}