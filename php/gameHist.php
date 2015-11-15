<?php

/**
 * Description of User
 *
 * @author Joe
 */
//require 'dbConnection.php';
require 'GameResult.php';

class GameHistory {
    public $hist = array();
    
    function __construct($userID) {
        $db = new Database();
        $conn = $db->connection;
        if($data = $conn->query("SELECT timestamp, pointsEarned, outcome FROM gamehistory WHERE userID = ".$userID)) {
            $resCount = $data->num_rows;
            for ($i=0; $i<$resCount; $i++)
            {
                $resRow = $data->fetch_assoc();
                $game = new GameResult($resRow['timestamp'], $resRow['pointsEarned'], $resRow['outcome']);
                $this->hist[$i] = $game;
            }
        }                     
        $db->closeConnection();
    }
}
