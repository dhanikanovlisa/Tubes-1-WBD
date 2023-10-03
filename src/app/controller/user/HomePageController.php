<?php
require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/films.php';
require_once  DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';
class HomePageController{ 
    private $filmModel;
    private $middleware;
    
    private int $limit;
    private int $page;

    public function __construct()
    {
        $this->filmModel = new FilmsModel();    
        $this->middleware = new AuthenticationMiddleware();
        $this->page = isset($_GET['page']) && $_GET['page']>0 ? $_GET['page'] : 1;
        $this->limit = isset($_GET['limit']) && $_GET['page']>0 ? $_GET['limit'] : 2;
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

    public function generatePagination(){
        $total_records = $this->filmModel->getFilmCount();
        $items_per_page = 2;
        $current_page = $this->page;

        include(DIRECTORY . "/../component/template/pagination.php");
    }

    public function generateCards(){
        $offset = ($this->page-1)*$this->limit;
        $films = $this->filmModel->getFilm($this->limit, $offset);
        foreach($films as $film){
            // $film_id = $film['film_id'];
            include(DIRECTORY . "/../component/template/cardMovie.php");
        }
        if (empty($films) && $this->page == 1) echo "No film currently available";
    }
}