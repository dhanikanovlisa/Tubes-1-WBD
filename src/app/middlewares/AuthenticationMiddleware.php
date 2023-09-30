<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/user.php';

class AuthenticationMiddleware
{
    private $userModel;
    
    public function __construct(){
        $this->userModel = new UserModel();
    }

    public function isAuthenticated()
    {
        if (!isset($_SESSION['user_id'])) {
            throw new Exception;
        }

        $user = $this->userModel->getUserByID($_SESSION['user_id']);

        if (!$user) {
            throw new Exception;
        }
    }

    public function isAdmin()
    {
        if (!isset($_SESSION['user_id'])) {
            throw new Exception;
        }

        $is_admin = $this->userModel->isAdmin($_SESSION['user_id']);

        if (!$is_admin) {
            throw new Exception;
        }
    }
}