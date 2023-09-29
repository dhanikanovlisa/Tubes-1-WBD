<?php

require_once '../utils/database.php';
class GenreModel{
    private $table = 'genre';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**Get All Genre */
    /**Get genre by Name*/
    /**Insert new genre*/
}