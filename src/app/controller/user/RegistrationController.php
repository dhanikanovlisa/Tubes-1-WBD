<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/user.php';

class RegistrationController{ 
    private $userModel;
    
    public function __construct(){
        $this->userModel = new UserModel();
    }
    public function showRegistrationPage(){
        require_once DIRECTORY . "/../component/user/RegistrationPage.php";
    }

    public function register(){
        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(["redirect_url" => "/login"]);
        $this->userModel->addUser($_POST['username'],$_POST['email'], $_POST['phone'], $_POST['password']);
    }
}