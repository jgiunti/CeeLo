<?php

/**
 * Description of GameState
 *
 * @author Joe
 */
require 'dbConnection.php';

class GameState {
    public $timeStamp;
    public $pDice1;
    public $pDice2;
    public $pDice3;
    public $oDice1;
    public $oDice2;
    public $oDice3;
    public $userID;
    
    function __construct($uID) {
        $db = new Database();
        $conn = $db->connection;
        $this->userID = $uID;

        if($data = $conn->query("SELECT * FROM gamestate WHERE userID =".$uID)){
            $resRow = $data->fetch_assoc();
            $this->timeStamp = $resRow['timestamp'];
            $this->pDice1 = $resRow['pDice1'];
            $this->pDice2 = $resRow['pDice2'];
            $this->pDice3 = $resRow['pDice3'];
            $this->oDice1 = $resRow['oDice1'];
            $this->oDice2 = $resRow['oDice2'];
            $this->oDice3 = $resRow['oDice3'];
        }
        $db->closeConnection();
    }   
     
    function updateGameState() {
       $db = new Database();
       $conn = $db->connection;

       $query = "UPDATE gamestate SET timestamp = ?, pDice1 = ?, pDice2 = ?, pDice3 = ?, oDice1 = ?, oDice2 = ?, oDice3 = ? WHERE userID =".$this->userID;

       $prep = $db->prepare($query);
       $prep->bind_param("iiiiiii",  $this->timeStamp, $$this->pDice1, $this->pDice2, $this->pDice3, $this->oDice1, $this->oDice2, $this->oDice3);
       $prep->execute();

       $db->closeConnection();
    }
}
