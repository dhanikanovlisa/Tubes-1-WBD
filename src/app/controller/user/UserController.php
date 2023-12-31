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
            $data["photo_profile"] = $user['photo_profile'];
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
        require_once DIRECTORY . "/../component/user/ProfileSettingsPage.php";
    }

        public function showEditProfilePage($params = [])
    {
        require_once DIRECTORY . "/../component/user/EditProfilePage.php";
    }

    public function editProfile()
    {
        header('Content-Type: application/json');
        http_response_code(200);
    
        $existingUserData = $this->userModel->getUserById($_POST['user_id']);
        $updateData = [];

        $updateData['username'] = $this->checkAndUpdateField($_POST['username'], $existingUserData['username']);
        $updateData['first_name'] = $this->checkAndUpdateField($_POST['first_name'], $existingUserData['first_name']);
        $updateData['last_name'] = $this->checkAndUpdateField($_POST['last_name'], $existingUserData['last_name']);
        $updateData['email'] = $this->checkAndUpdateField($_POST['email'], $existingUserData['email']);
        $updateData['phone_number'] = $this->checkAndUpdateField($_POST['phone_number'], $existingUserData['phone_number']);
        $updateData['photo_profile'] = $this->checkAndUpdateField($_POST['photo_profile'], $existingUserData['photo_profile']);
        $this->userModel->updateUserData($_POST['user_id'], $updateData);
        //  print_r($updateData);
        echo json_encode(["redirect_url" => "/settings/" . $_POST['user_id']]);
    }
    
    private function checkAndUpdateField($newData, $existingData)
    {
        if(empty($newData)){
            return $existingData;
        } else {
            if (strcmp($newData, $existingData) !== 0) {
                return $newData;
            } else {
                return $existingData;
            }
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

    public function changeToAdmin(){
        header('Content-Type: application/json');
        http_response_code(200);
        
        $this->userModel->changeToAdmin($_POST['user_id']);
        echo json_encode(["redirect_url" => "/user-detail/" . $_POST['user_id']]);
    }
    public function changeToUser(){
        header('Content-Type: application/json');
        http_response_code(200);
        
        $this->userModel->changeToUser($_POST['user_id']);
        echo json_encode(["redirect_url" => "/user-detail/" . $_POST['user_id']]);
    }

    public function showUserDetailPage($params = []){
        if ($this->middleware->isAdmin()) {
            require_once DIRECTORY . "/../component/user/UserDetailPage.php";
        } else if ($this->middleware->isAuthenticated()) {
            header("Location: /restrict");
        } else {
            header("Location: /login");
        }
    }
}
