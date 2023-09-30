<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/films.php';

class DetailFilmController{ 
    private $filmModel;

    public function __construct(){
        $this->filmModel = new FilmsModel();
    }

    public function getFilmData($param){
        return $this->filmModel->getFilmByID($param);
    }
    public function showDetailFilmPage($params=[]){
        require_once DIRECTORY . "/../component/film/DetailFilmPage.php";
    }
}