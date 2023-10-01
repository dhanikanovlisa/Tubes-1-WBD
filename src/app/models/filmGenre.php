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
}