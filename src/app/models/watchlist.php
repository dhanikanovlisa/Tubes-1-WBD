<?php

require_once DIRECTORY . '/../utils/database.php';
class WatchListModel{
    private $table = 'watchlist';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    /**Get All Film in user watchlist butuh -> USER ID */
    public function getWatchList($userID){
        $this->db->callQuery('SELECT film_id FROM ' . $this->table . ' WHERE user_id = ' . $userID);
        return $this->db->fetchAllResult();
    }
    public function getWatchListFilms($userID, $limit, $offset){
        $this->db->callQuery('SELECT * FROM ' . $this->table .
                                ' NATURAL INNER JOIN film WHERE user_id = ' . $userID .
                                ' LIMIT ' . $limit . ' OFFSET ' . $offset);
        return $this->db->fetchAllResult();
    }
    public function getWatchListFilmsCount($userID){
        $this->db->callQuery('SELECT COUNT(film_id) FROM ' . $this->table .
                                ' NATURAL INNER JOIN film WHERE user_id = ' . $userID . 
                                ' GROUP BY film_id');
        return $this->db->fetchResult();
    }
    /**Add new film to watchlist */
    public function addFilmToWatchList($userID){
    }
    /**Delete/remove film in watchlist */
    public function deleteFilmFromWatchList($userID){
        
    }
}