<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/genre.php';
require_once  DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';
class GenreController
{
    private $genreModel;
    private $middleware;

    public function __construct()
    {
        $this->genreModel = new GenreModel();
        $this->middleware = new AuthenticationMiddleware();
    }

    public function getAllGenre()
    {
        return $this->genreModel->getAllGenre();
    }

    public function addGenre()
    {
        header('Content-Type: application/json');
        http_response_code(200);
        $genre = $_POST['name'];
        $this->genreModel->addGenre($genre);
        echo json_encode(["redirect_url" => "/add-genre"]);
    }

    public function deleteGenre()
    {
        header('Content-Type: application/json');
        http_response_code(200);
        $genre_id = $_POST['genre_id'];
        $this->genreModel->deleteGenre($genre_id);
        echo json_encode(["redirect_url" => "/manage-genre"]);
    }

    public function showManageGenrePage()
    {
        if ($this->middleware->isAdmin()) {
            include_once DIRECTORY . '/../component/film/ManageGenrePage.php';
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrict");
        } else {
            header("Location: /login");
        }
    }

    public function addGenrePage()
    {
        if ($this->middleware->isAdmin()) {
            include_once DIRECTORY . '/../component/film/AddGenrePage.php';
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrict");
        } else {
            header("Location: /login");
        }
    }
}
