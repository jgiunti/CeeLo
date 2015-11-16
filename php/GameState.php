<?php

/**
 * Description of GameState
 *
 * @author Joe
 */
require 'dbConnection.php';

class GameState {
    public $timeStamp;
    public $turn;
    public $oRollsWon;
    public $pRollsWon;
    public $points;
    public $lastRoll;
    public $userID;
    
    function __construct($uID) {
        $db = new Database();
        $conn = $db->connection;  
        $data = $conn->query("SELECT * FROM gamestate WHERE userID =".$uID);
        if($data->num_rows > 0) {
            $resRow = $data->fetch_assoc();
            $this->timeStamp = $resRow['timestamp'];
            $this->turn = $resRow['turn'];
            $this->pRollsWon = $resRow['pRollsWon'];
            $this->oRollsWon = $resRow['oRollsWon'];
            $this->points = $resRow['points'];
            $this->lastRoll = $resRow['lastRoll'];
        }
         else {            
            $this->insertNewState($uID, $conn);          
        }
        $this->userID = $uID;
        $db->closeConnection();
    }   
     
    function updateGameState() {
       $db = new Database();
       $conn = $db->connection;
       $this->timeStamp = 20151115;
       $query = "UPDATE gamestate SET timestamp = ?, turn = ?, pRollsWon = ?, oRollsWon = ?, points = ?, lastRoll = ? WHERE userID =".$this->userID;   
       
       $prep = $conn->prepare($query);
       $prep->bind_param("iiiiii",  $this->timeStamp, $this->turn, $this->pRollsWon, $this->oRollsWon, $this->points, $this->lastRoll);
       $prep->execute();

       $db->closeConnection();
    }
    
    function insertNewState($uID, $conn) {
        $this->timeStamp = 20151115;
        $this->turn = 1;
        $this->pRollsWon = 0;
        $this->oRollsWon = 0;
        $this->points = 0;
        $this->lastRoll = 0;         
        $query = "INSERT INTO gamestate(userID, turn, pRollsWon, oRollsWon, points, timestamp, lastRoll) VALUES(?, ?, ?, ?, ?, ?, ?)";           
        $prep = $conn->prepare($query);
        $prep->bind_param("iiiiiii",  $uID, $this->turn, $this->pRollsWon, $this->oRollsWon, $this->points, $this->timeStamp, $this->lastRoll);
        $prep->execute();
    }
}
