<?php

require_once  DIRECTORY . '/../utils/database.php';
require_once  DIRECTORY . '/../models/user.php';
require_once DIRECTORY . '/../middlewares/AuthenticationMiddleware.php';

class UserController
{
    private $userModel;
    private $middleware;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->middleware = new AuthenticationMiddleware();
    }

    public function getUserByID($param){
        return $this->userModel->getUserByID($param);
    }


    public function getAllUser()
    {
        $userData = $this->userModel->getAllUser();
        $result = [];
        foreach ($userData as $user) {
            $data = [];
            $data["user_id"] = $user['user_id'];
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
        $username = $this->userModel->getUserByUsername($username);
        $isExist = false;
        if ($username) {
            $isExist = true;
        }

        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode(["isExist" => $isExist]);
    }

    public function checkEmail($email)
    {
        $email = ltrim($email['email'], ':');

        $email = $this->userModel->getUserByEmail($email);
        $isExist = false;
        if ($email) {
            $isExist = true;
        }

        header('Content-Type: application/json');
        http_response_code(201);
        echo json_encode(["isExist" => $isExist]);
    }

    /**USER */
    public function showProfileSettingsPage($params = [])
    {
        require_once dirname(dirname(__DIR__)) . "/component/user/ProfileSettingsPage.php";
    }

        public function showEditProfilePage($params = [])
    {
        require_once dirname(dirname(__DIR__)) . "/component/user/EditProfilePage.php";
    }

    public function editProfile(){
        header('Content-Type: application/json');
        http_response_code(200);

        $existingUserData = $this->userModel->getUserById($_POST['user_id']);
        $updateData = [];

        $this->checkAndUpdateField('username', $updateData, $existingUserData);
        $this->checkAndUpdateField('first_name', $updateData, $existingUserData);
        $this->checkAndUpdateField('last_name', $updateData, $existingUserData);
        $this->checkAndUpdateField('email', $updateData, $existingUserData);
        $this->checkAndUpdateField('phone_number', $updateData, $existingUserData);
    
        $this->userModel->updateUserData($_POST['user_id'], $updateData);
        echo json_encode(["redirect_url" => "/settings/" . $_POST['user_id']]);
    }

    private function checkAndUpdateField($fieldName, &$updateData, $existingData)
    {
        if (isset($_POST['user_id']) && isset($_POST[$fieldName]) && $_POST['user_id'] === $existingData['user_id'] && $_POST[$fieldName] !== $existingData[$fieldName]) {
            $updateData[$fieldName] = $_POST[$fieldName];
        } else {
            $updateData[$fieldName] = $existingData[$fieldName];
        }
    }

    /**ADMIN */
    /**Manage ALL User */
    public function showManageUserPage()
    {
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/user/ManageUserPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrict");
        } else {
            header("Location: /page-not-found");
        }
    }

    /**Delete User */
    public function deleteUser(){
        header('Content-Type: application/json');
        http_response_code(200);
        
        $this->userModel->deleteUser($_POST['user_id']);
        echo json_encode(["redirect_url" => "/manage-user"]);
    }

    public function showUserDetailPage($params = []){
        if ($this->middleware->isAdmin()) {
            require_once dirname(dirname(__DIR__)) . "/component/user/UserDetailPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrict");
        } else {
            header("Location: /login");
        }
    }
}
