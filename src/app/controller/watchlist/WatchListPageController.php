<?php
require_once  DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';
require_once DIRECTORY . '/../models/watchlist.php';
require_once DIRECTORY . '/../models/films.php';
    
class WatchListPageController{ 
    private WatchListModel $watchListModel;
    private FilmsModel $filmsModel;
    private $middleware;
    private int $userID;
    private int $page;
    private int $limit;

    public function __construct()
    {
        $this->watchListModel = new WatchListModel();
        $this->middleware = new AuthenticationMiddleware();
        $this->filmsModel = new FilmsModel();
        $this->page = isset($_GET['page']) && $_GET['page']>0 ? $_GET['page'] : 1;
        $this->limit = isset($_GET['limit']) && $_GET['page']>0 ? $_GET['limit'] : 15;
    }

    public function setUserID(int $userID){
        $this->userID = $userID;
    }

    public function generateCards(){
        $offset = ($this->page-1)*$this->limit;
        $lf =  $this->watchListModel->getWatchListFilms($this->userID, $this->limit, $offset);
        foreach($lf as $film){
            include(DIRECTORY . "/../component/template/cardMovie.php");
        }
        if(empty($lf) && $this->page==1) echo "Your watchlist is empty";
    }

    public function generatePagination(){
        $total_records = $this->watchListModel->getWatchListFilmsCount($this->userID);
        $items_per_page = 15;
        $current_page = $this->page;

        include(DIRECTORY . "/../component/template/pagination.php");
    }

    public function showWatchListPage()
    {
        // require_once DIRECTORY . "/../component/user/WatchListPage.php";
        if ($this->middleware->isAdmin()) {
            header("Location: /restrictAdmin");
        } else if ($this->middleware->isAuthenticated()) {
            require_once DIRECTORY . "/../component/user/WatchListPage.php";
        } else {
            header("Location: /page-not-found");
        }
    }
}
