<?php
require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/films.php';
class ManageFilmController{ 

    public function showManageFilmPage(){
        require_once DIRECTORY . "/../component/film/ManageFilmPage.php";
    }
}