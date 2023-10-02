<?php
require_once  DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';
class WatchListPageController
{
    private $middleware;

    public function __construct()
    {
        $this->middleware = new AuthenticationMiddleware();
    }
    
    public function showWatchListPage()
    {
        if ($this->middleware->isAuthenticated()) {
            require_once DIRECTORY . "/../component/user/WatchListPage.php";
        } else {
            header("Location: /login");
        }
    }
}
