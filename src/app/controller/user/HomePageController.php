<?php
require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/films.php';
require_once  DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';
class HomePageController{ 
    private $filmModel;
    private $middleware;
    

    public function __construct()
    {
        $this->filmModel = new FilmsModel();    
        $this->middleware = new AuthenticationMiddleware();
    }

    public function getAllFilm(){
        $filmData = $this->filmModel->getAllFilm();
        $result = [];
        foreach($filmData as $film){
            $data=[];
            $data["film_id"] = $film['film_id'];
            $data["title"] = $film['title'];
            $data["film_poster"] = $film['film_poster'];
            $result[] = $data;
        }
        return $result;
    }
    public function showHomePage(){
        if ($this->middleware->isAdmin()) {
            header("Location: /restrictAdmin");
        } else if ($this->middleware->isAuthenticated()) {
            require_once DIRECTORY . "/../component/user/HomePage.php";
        } else {
            header("Location: /login");
        }
    }
}