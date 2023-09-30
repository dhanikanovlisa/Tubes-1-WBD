<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/user.php';

class ManageUserController{ 
    private $userModel;
    
    public function __construct(){
        $this->userModel = new UserModel();
    }

    public function middleware($middleware){
        require_once DIRECTORY . '/../middlewares/' . $middleware . '.php';
        return new $middleware();
    }

    public function getAllUser(){
        $userData = $this->userModel->getAllUser();
        $result = [];
        foreach ($userData as $user) {
            $data = [];
            $data["username"] = $user['username'];
            $data["name"] = $user['first_name'] . ' ' . $user['last_name'];
            $data["role"] = $user['is_admin'] ? 'Admin' : 'User';
            $result[] = $data;
        }
        return $result;
    }
    
    public function showManageUserPage(){
        require_once DIRECTORY . "/../component/admin/ManageUserPage.php";
    }

    public function checkUsername($username){
        $username2 = ltrim($username['username'],':');
        $tokenMiddleware = $this->middleware('TokenMiddleware');
        $tokenMiddleware->putToken();
        $user = $this->userModel->getUserByUsername($username2);
        $isValid = false;
        if (!$user) {
            $isValid = true;
        }

        header('Content-Type: application/json');
        http_response_code(200);
        echo json_encode(["isValid" => $isValid]);
    }
}