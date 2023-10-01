<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/genre.php';

class GenreController{ 
    private $genreModel;

    public function __construct(){
        $this->genreModel = new GenreModel();
    }

    public function getAllGenre(){
       return $this->genreModel->getAllGenre();
    }
}