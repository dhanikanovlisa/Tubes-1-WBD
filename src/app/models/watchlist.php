<?php

require_once '../utils/database.php';
class WatchListModel{
    private $table = 'watchlist';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**Get All Film in user watchlist butuh -> USER ID */
    /**Add new film to watchlist */
    /**Delete/remove film in watchlist */
}