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
        if(empty($lf)) echo "Your watchlist is empty";
    }

    public function generatePagination(){
        $totalrecords = $this->watchListModel->getWatchListFilmsCount($this->userID);
        if($totalrecords) $totalrecords=$totalrecords['count'];
        $itemsperpage = $this->limit;

        $totalpages = ceil($totalrecords/$itemsperpage);
        
        for($i=1; $i<=$totalpages; $i++){
            $target = $i;
            include(DIRECTORY . "/../component/template/paginationButton.php");
        }
    }

    public function showWatchListPage()
    {
        if ($this->middleware->isAdmin()) {
            header("Location: /restrictAdmin");
        } else if ($this->middleware->isAuthenticated()) {
            require_once DIRECTORY . "/../component/user/WatchListPage.php";
        } else {
            header("Location: /page-not-found");
        }
    }
}
