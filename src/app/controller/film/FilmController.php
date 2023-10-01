<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/films.php';
require_once  DIRECTORY . '/../utils/duration.php';
require_once  DIRECTORY . '/../models/filmGenre.php';
class FilmController{ 
    private $filmModel;
    private $filmGenreModel;

    public function __construct(){
        $this->filmModel = new FilmsModel();
        $this->filmGenreModel = new FilmGenreModel();
    }

    /**Get Film */
    public function getFilmData($param){
        return $this->filmModel->getFilmByID($param);
    }

    public function getFilmGenre($param){
        return $this->filmModel->getFilmGenre($param);
    }


    /**Add Film */
    public function addFilm(){
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(["redirect_url" => "/manage-film"]);
        $convert = turnIntoMinute($_POST['filmHourDuration'], $_POST['filmMinuteDuration']);
        $this->filmModel->insertFilm($_POST['title'],
        $_POST['description'], $_POST['film_path'], $_POST['film_poster'], $_POST['date_release'], $convert);
        
        $filmID = $this->filmModel->getLastIDFilm();

        foreach ($_POST['filmGenre'] as $genre) {
            $genre = intval($genre); 
            $this->filmGenreModel->insertFilmGenre($filmID, $genre);
        }
    }

    /**Edit Film */
    public function editFilm(){

    }

    /**Delete Film */
    public function deleteFilm(){
        
    }

    /**Show Pages */
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