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

    private function getWatchListFilms(int $limit=100, int $offset=0): array{
        $films = $this->watchListModel->getWatchListFilms($this->userID, $limit, $offset);
        return $films;
    }

    public function generateCards(){
        $lf = $this->getWatchListFilms(10,0);
        foreach($lf as $film){
            include(DIRECTORY . "/../component/template/cardMovie.php");
        }
    }

    public function showWatchListPage(){
        require_once DIRECTORY . "/../component/user/WatchListPage.php";
    }
}