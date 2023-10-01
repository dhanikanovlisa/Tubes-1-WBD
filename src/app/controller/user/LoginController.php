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
    // public function login(){
    //     header('Content-Type: application/json');
    //     http_response_code(201);
    //     echo json_encode(["redirect_url" => "/"]);
    // }

    public function login(){
        $tokenMiddleware = $this->middleware('TokenMiddleware');
        $tokenMiddleware->checkToken();

        $user_id = $this->userModel->login($_POST['username'], $_POST['password']);

        header('Content-Type: application/json');
        if ($user_id) {
            $tokenMiddleware->putToken();
            $_SESSION['user_id'] = $user_id['user_id'];
            http_response_code(201);
            echo json_encode(["redirect_url" => "/"]);

        } else {
            http_response_code(401);
            echo json_encode(["message" => "Username or password is incorrect"]);
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        
        header('Content-Type: application/json');
        http_response_code(201);
    }
}