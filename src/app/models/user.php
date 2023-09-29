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
    public function getAllUser(){
        $this->db->callQuery('SELECT * FROM ' . $this->table);
        return $this->db->fetchAllResult();
    }
    /**Get user by ID*/
    public function getUserByID($id){
        $this->db->callQuery('SELECT * FROM ' . $this->table . ' WHERE user_id = ' . $id);
        return $this->db->fetchResult();
    }
}