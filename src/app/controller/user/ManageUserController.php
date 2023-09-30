<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/user.php';

class ManageUserController{ 
    private $userModel;
    
    public function __construct(){
        $this->userModel = new UserModel();
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
        require_once DIRECTORY . "/../component/user/ManageUserPage.php";
    }
}