<?php
require_once  DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';
class SearchPageController{ 
    private $middleware;

    public function __construct()
    {
        $this->middleware = new AuthenticationMiddleware();
    }
    public function showSearchPage(){
        if ($this->middleware->isAdmin()) {
            header("Location: /restrictAdmin");
        } else if ($this->middleware->isAuthenticated()) {
            require_once DIRECTORY . "/../component/user/SearchPage.php";
        } else {
            header("Location: /page-not-found");
        }
    }
}