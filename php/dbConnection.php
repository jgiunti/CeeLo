<?php

require_once 'constants.php';
class Database {
    public $connection;
    function __construct() {
        $conn = new mysqli(server, username, password, dbname);       
        if(mysqli_connect_errno()) {
            echo 'Could not connect to the database';
        }
        else {
            $this->connection = $conn;
            //echo 'Successful connection';
            //return $this->connection;
        }
    }
    
    function closeConnection() {
        $this->connection->close();
        //echo 'connection closed';
    }
}

