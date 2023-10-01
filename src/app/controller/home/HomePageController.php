<?php
require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/films.php';
class HomePageController{ 
    private $filmModel;

    public function __construct()
    {
        $this->filmModel = new FilmsModel();    
    }

    public function middleware($middleware){
        require_once DIRECTORY . '/../middlewares/' . $middleware . '.php';
        return new $middleware();
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
        $authMiddleware = $this->middleware('AuthenticationMiddleware');
        if ($authMiddleware->isAuthenticated()){
            require_once DIRECTORY . "/../component/user/HomePage.php";
        } else {
            header("Location: /login");
        }
    }
}