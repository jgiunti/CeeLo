<?php

/**
 * Description of User
 *
 * @author Joe
 */
require_once 'dbConnection.php';


class User {
    public $userName;
    public $points;
    public $wins;
    public $loss;
    
    function __construct($userID) {
        $db = new Database();
        $conn = $db->connection;
        
        if($data = $conn->query("SELECT userName FROM USERS WHERE userID =".$userID)) {
            $resRow = $data->fetch_assoc();
            $this->userName = $resRow["userName"];
        }   
        if($data = $conn->query("SELECT pointsTotal FROM POINTS WHERE userID =".$userID)) {
            $resRow = $data->fetch_assoc();
            $this->points = $resRow['pointsTotal'];         
        }              
        if($data = $conn->query("SELECT * FROM gamehistory WHERE userID=".$userID." AND OUTCOME = 'W'")) {
            $this->wins = $data->num_rows;
        }    
        if($data = $conn->query("SELECT * FROM gamehistory WHERE userID=".$userID." AND OUTCOME = 'L'")) {
            $this->loss = $data->num_rows; 
        }            
        $db->closeConnection();
    }
}
