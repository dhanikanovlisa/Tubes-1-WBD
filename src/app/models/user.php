<?php

require_once DIRECTORY . '/../utils/database.php';
class UserModel{
    private $table = 'users';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    /**Get All User */
    public function getAllUser(){
        $this->db->callQuery('SELECT * FROM ' . $this->table);
        return $this->db->fetchAllResult();
    }
    /**Get user by ID*/
    public function getUserByID($id){
        $this->db->callQuery('SELECT * FROM ' . $this->table . ' WHERE user_id = ' . $id);
        return $this->db->fetchResult();
    }

    /**Get user by username*/
    public function getUserByUsername($username){
        $this->db->callQuery('SELECT * FROM users WHERE username = :username');
        $this->db->bind('username', $username);
        return $this->db->fetchResult();
    }

    /*Insert new user*/
    public function addUser($username, $email, $phone, $password){
        $this->db->callQuery("INSERT INTO users(username, first_name, last_name, email, password, phone_number, is_admin) VALUES('$username', '', '', '$email', '$password', '$phone', false)");
        $this->db->execute();
    }
}