<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/user.php';

class UserController
{
    private $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function getUserByID($param){
        return $this->userModel->getUserByID($param);
    }

    public function middleware($middleware)
    {
        require_once DIRECTORY . '/../middlewares/' . $middleware . '.php';
        return new $middleware();
    }

    public function getAllUser()
    {
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


    public function checkUsername($username)
    {
        $username = ltrim($username['username'], ':');
        $tokenMiddleware = $this->middleware('TokenMiddleware');
        $tokenMiddleware->putToken();

        $username = $this->userModel->getUserByUsername($username);
        $isValid = false;
        if ($username) {
            $isValid = true;
        }

        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode(["isValid" => $isValid]);
    }

    /**USER */
    public function showProfileSettingsPage($params = [])
    {
        require_once dirname(dirname(__DIR__)) . "/component/user/ProfileSettingsPage.php";
    }

    /**ADMIN */
    /**Manage ALL User */
    public function showManageUserPage()
    {
        require_once DIRECTORY . "/../component/user/UserPage.php";
    }

    public function showUserDetailPage($params = []){
        require_once dirname(dirname(__DIR__)) . "/component/user/UserDetailPage.php";
    }
}
