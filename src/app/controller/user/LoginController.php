<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/user.php';

class LoginController{ 
    private $userModel;
    
    public function __construct(){
        $this->userModel = new UserModel();
    }
    public function showLoginPage(){
        require_once DIRECTORY . "/../component/user/LoginPage.php";
    }

    public function middleware($middleware){
        require_once DIRECTORY . '/../middlewares/' . $middleware . '.php';
        return new $middleware();
    }
    public function login(){
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(["redirect_url" => "/"]);
    }
}