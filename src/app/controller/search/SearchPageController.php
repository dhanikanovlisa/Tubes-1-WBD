<?php
require_once  DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';
class SearchPageController{ 
    private $middleware;

    public function __construct()
    {
        $this->middleware = new AuthenticationMiddleware();
    }
    public function showSearchPage(){
        if ($this->middleware->isAuthenticated()){
            require_once DIRECTORY . "/../component/user/SearchPage.php";
        } else if($this->middleware->isAdmin()){
            header("Location: /restrict");
        } 
        else {
            header("Location: /login");
        }
    }
}