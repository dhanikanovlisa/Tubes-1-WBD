<?php

require_once DIRECTORY . '/../utils/database.php';
class FilmGenreModel{
    private $table = 'film_genre';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function insertFilmGenre($film_id, $genre_id){
        $this->db->callQuery("INSERT INTO film_genre(film_id, genre_id) VALUES (:filmid, :genreid);");
        $this->db->bind('filmid', $film_id);
        $this->db->bind('genreid', $genre_id);
        $this->db->execute();
    }

    public function updateFilmGenre($film_id, $genre_id){
        $this->db->callQuery("UPDATE film_genre SET genre_id = :genreid WHERE film_id = :filmid;");
        $this->db->bind('filmid', $film_id);
        $this->db->bind('genreid', $genre_id);
        $this->db->execute();
    }
}