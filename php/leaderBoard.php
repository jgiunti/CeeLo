<?php

/**
 * Description of leaderBoard
 *
 * @author Joe
 */
require_once 'dbConnection.php';
require_once 'user.php';

class leaderBoard {
    public $leaders = array();
    
    function __construct() {
        $db = new Database();
        $conn = $db->connection;
        if($data = $conn->query("SELECT userID FROM points ORDER BY pointsTotal DESC LIMIT 5")) {
            $resCount = $data->num_rows;
            for ($i=0; $i<$resCount; $i++)
            {
                $resRow = $data->fetch_assoc();
                $user = new User($resRow['userID']);               
                $this->leaders[$i] = $user;
            }
        }                     
        $db->closeConnection();
    }
}
