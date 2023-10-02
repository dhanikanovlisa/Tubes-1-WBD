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
        echo json_encode(["redirect_url" => "/manage-film"]);
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
    }

    public function editFilm()
    {
        header('Content-Type: application/json');
        http_response_code(200);

        $convert = turnIntoMinute($_POST['filmHourDuration'], $_POST['filmMinuteDuration']);

        $existingFilmData = $this->filmModel->getFilmById($_POST['film_id']); // Adjust this based on your actual implementation

        $updateData = [];

        if ($_POST['title'] !== $existingFilmData['title']) {
            $updateData['title'] = $_POST['title'];
        }

        if ($_POST['description'] !== $existingFilmData['description']) {
            $updateData['description'] = $_POST['description'];
        }


        if ($_POST['date_release'] !== $existingFilmData['date_release']) {
            $updateData['date_release'] = $_POST['date_release'];
        }

        if ($convert !== $existingFilmData['duration']) {
            $updateData['duration'] = $convert;
        }

        $this->filmModel->updateFilm($_POST['film_id'], $updateData);


        // $this->filmGenreModel->deleteFilmGenres($_POST['film_id']);
        // foreach ($_POST['filmGenre'] as $genre) {
        //     $genre = intval($genre); 
        //     $this->filmGenreModel->insertFilmGenre($_POST['film_id'], $genre);
        // }

        echo json_encode(["redirect_url" => "/manage-film"]);
    }


    /**Delete Film */
    public function deleteFilm()
    {
    }

    public function validateData()
    {
        $errors = [];
        if (empty($_POST['title'])) {
            $errors['title'] = 'Title is required';
        }
        if (empty($_POST['description'])) {
            $errors['description'] = 'Description is required';
        }
        if (empty($_POST['film_path'])) {
            $errors['film_path'] = 'Film path is required';
        }
        if (empty($_POST['film_poster'])) {
            $errors['film_poster'] = 'Film poster is required';
        }
        if (empty($_POST['date_release'])) {
            $errors['date_release'] = 'Date release is required';
        }
        if (empty($_POST['filmHourDuration'])) {
            $errors['filmHourDuration'] = 'Film hour duration is required';
        }
        if (empty($_POST['filmMinuteDuration'])) {
            $errors['filmMinuteDuration'] = 'Film minute duration is required';
        }
        if (empty($_POST['filmGenre'])) {
            $errors['filmGenre'] = 'Film genre is required';
        }
        return $errors;
    }

    /**Show Pages */
    public function showWatchFilmPage($params = [])
    {
        if ($this->middleware->isAdmin()) {
            header("Location: /restrict");
        } else if ($this->middleware->isAuthenticated()) {
            require_once DIRECTORY . "/../component/film/WatchFilmPage.php";
        } else {
            header("Location: /page-not-found");
        }
    }
    public function showDetailFilmPage($params = [])
    {
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/film/DetailFilmPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrictAdmin");
        } else {
            header("Location: /page-not-found");
        }
    }
    public function showAddFilmPage()
    {
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/film/AddFilmPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrictAdmin");
        } else {
            header("Location: /page-not-found");
        }
    }

    public function showEditFilmPage($params = [])
    {
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/film/EditFilmPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrictAdmin");
        } else {
            header("Location: /page-not-found");
        }
    }
    public function showManageFilmPage()
    {
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/film/ManageFilmPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrictAdmin");
        } else {
            header("Location: /page-not-found");
        }
    }
}
