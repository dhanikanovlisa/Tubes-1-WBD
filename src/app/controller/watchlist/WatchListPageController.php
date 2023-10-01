<?php

require_once DIRECTORY . '/../models/watchlist.php';
require_once DIRECTORY . '/../models/films.php';

class WatchListPageController{ 
    private WatchListModel $watchListModel;
    private FilmsModel $filmsModel;
    private int $userID;

    public function __construct()
    {
        $this->watchListModel = new WatchListModel();
        $this->filmsModel = new FilmsModel();
    }

    public function setUserID(int $userID){
        $this->userID = $userID;
    }

    private function getWatchListFilms(int $limit, int $offset): array{
        $films = $this->watchListModel->getWatchListFilms($this->userID, $limit, $offset);
        return $films;
    }

    public function generateCards(){
        $page = isset($_GET['page']) && $_GET['page']>0 ? $_GET['page'] : 1;
        $limit = isset($_GET['limit']) && $_GET['page']>0 ? $_GET['limit'] : 15;

        $offset = ($page-1)*$limit;
        $lf = $this->getWatchListFilms($limit, $offset);
        foreach($lf as $film){
            include(DIRECTORY . "/../component/template/cardMovie.php");
        }
    }

    public function showWatchListPage(){
        require_once DIRECTORY . "/../component/user/WatchListPage.php";
    }
}