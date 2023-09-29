<?php

require_once '../utils/database.php';
class UserModel{
    private $table = 'user';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**Get All User */
    /**Get user by admin/customer */
    /**Get user by name */
    /**Get User by  */
}