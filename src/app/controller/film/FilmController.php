<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/films.php';
require_once  DIRECTORY . '/../utils/duration.php';
require_once  DIRECTORY . '/../models/filmGenre.php';
require_once  DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';
class FilmController
{
    private $filmModel;
    private $filmGenreModel;
    private $middleware;

    public function __construct()
    {
        $this->filmModel = new FilmsModel();
        $this->filmGenreModel = new FilmGenreModel();
        $this->middleware = new AuthenticationMiddleware();
    }

    /**Get Film */
    public function getFilmData($param)
    {
        return $this->filmModel->getFilmByID($param);
    }

    public function getAllFilm()
    {
        $filmData = $this->filmModel->getAllFilm();
        $result = [];
        foreach ($filmData as $film) {
            $data = [];
            $data["film_id"] = $film['film_id'];
            $data["title"] = $film['title'];
            $data["film_poster"] = $film['film_poster'];
            $result[] = $data;
        }
        return $result;
    }

    public function getFilmGenre($param)
    {
        return $this->filmModel->getFilmGenre($param);
    }


    /**Add Film */
    public function addFilm()
    {
        header('Content-Type: application/json');
        http_response_code(200);
        $convert = turnIntoMinute($_POST['filmHourDuration'], $_POST['filmMinuteDuration']);
        $this->filmModel->insertFilm(
            $_POST['title'],
            $_POST['description'],
            $_POST['film_path'],
            $_POST['film_poster'],
            $_POST['date_release'],
            $convert
        );
        
        $filmID = $this->filmModel->getLastIDFilm();
        
        foreach ($_POST['filmGenre'] as $genre) {
            $genre = intval($genre);
            $this->filmGenreModel->insertFilmGenre($filmID, $genre);
        }
        echo json_encode(["redirect_url" => "/manage-film"]);
    }

    public function editFilm()
    {
        header('Content-Type: application/json');
        http_response_code(200);
    

        $convert = turnIntoMinute($_POST['filmHourDuration'], $_POST['filmMinuteDuration']);
        $existingFilmData = $this->filmModel->getFilmById($_POST['film_id']);
        $updateData = [];
    

        $this->checkAndUpdateField('title', $updateData, $existingFilmData);
        $this->checkAndUpdateField('description', $updateData, $existingFilmData);
        $this->checkAndUpdateField('date_release', $updateData, $existingFilmData);
        $this->checkAndUpdateField('duration', $updateData, $existingFilmData, $convert);
        $this->checkAndUpdateField('film_path', $updateData, $existingFilmData);
        $this->checkAndUpdateField('film_poster', $updateData, $existingFilmData);
    

        $this->filmModel->updateFilm($_POST['film_id'], $updateData);
    
        // Update film genre
        $existingFilmGenre = $this->getFilmGenre($_POST['film_id']);
        $updateGenre = ['filmGenre' => $_POST['filmGenre']];
        if ($existingFilmGenre[0]['genre_id'] === $_POST['filmGenre']) {
            $updateGenre['filmGenre'] = $existingFilmGenre[0]['genre_id'];
        }
        $this->filmGenreModel->updateFilmGenre($_POST['film_id'], $updateGenre['filmGenre']);
    

        echo json_encode(["redirect_url" => "/manage-film"]);
    }
    

    private function checkAndUpdateField($fieldName, &$updateData, $existingData, $newValue = null)
    {
        if (isset($_POST['film_id']) && isset($_POST[$fieldName]) && $_POST['film_id'] === $existingData['film_id'] && $_POST[$fieldName] !== $existingData[$fieldName]) {
            $updateData[$fieldName] = $newValue ?? $_POST[$fieldName];
        } else {
            $updateData[$fieldName] = $existingData[$fieldName];
        }
    }
    
    


    /**Delete Film */
    public function deleteFilm()
    {
        header('Content-Type: application/json');
        http_response_code(200);
        
        $this->filmModel->deleteFilm($_POST['film_id']);
        echo json_encode(["redirect_url" => "/manage-film"]);
    }

    /**Show Pages */
    public function showWatchFilmPage($params = [])
    {
        if ($this->middleware->isAdmin()) {
            header("Location: /restrictAdmin");
        } else if ($this->middleware->isAuthenticated()) {
            require_once DIRECTORY . "/../component/film/WatchFilmPage.php";
        } else {
            header("Location: /login");
        }
    }
    public function showDetailFilmPage($params = [])
    {
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/film/DetailFilmPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrict");
        } else {
            header("Location: /login");
        }
    }
    public function showAddFilmPage()
    {
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/film/AddFilmPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrict");
        } else {
            header("Location: /login");
        }
    }

    public function showEditFilmPage($params = [])
    {
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/film/EditFilmPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrict");
        } else {
            header("Location: /login");
        }
    }
    public function showManageFilmPage()
    {
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/film/ManageFilmPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrict");
        } else {
            header("Location: /login");
        }
    }
}
