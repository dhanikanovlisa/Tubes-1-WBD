<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/films.php';

class FilmController{ 
    private $filmModel;

    public function __construct(){
        $this->filmModel = new FilmsModel();
    }
    public function getFilmData($param){
        return $this->filmModel->getFilmByID($param);
    }

    public function getFilmGenre($param){
        return $this->filmModel->getFilmGenre($param);
    }
    public function showWatchFilmPage($params=[]){
        require_once DIRECTORY . "/../component/film/WatchFilmPage.php";
    }
    public function showDetailFilmPage($params=[]){
        require_once DIRECTORY . "/../component/film/DetailFilmPage.php";
    }
    public function showAddFilmPage(){
        require_once DIRECTORY . "/../component/film/AddFilmPage.php";
    }

    public function showEditFilmPage($params=[]){
        require_once DIRECTORY . "/../component/film/EditFilmPage.php";
    }
    public function showManageFilmPage(){
        require_once DIRECTORY . "/../component/film/ManageFilmPage.php";
    }
    
}