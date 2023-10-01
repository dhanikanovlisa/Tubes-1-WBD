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

    private function getWatchListFilms(): array{
        $films = $this->watchListModel->getWatchListFilms($this->userID);
        return $films;
    }

    public function generateCards(): string{
        $lf = $this->getWatchListFilms();
        $res = "";
        foreach($lf as $film){
            $html = "<div class='card'>
                        <img src='storage/" . $film['film_poster'] . "' alt='" . $film['film_poster'] . "'>
                    </div>";
            $res = $res . $html;
        }
        return $res;
    }

    public function showWatchListPage(){
        require_once DIRECTORY . "/../component/user/WatchListPage.php";
    }
}