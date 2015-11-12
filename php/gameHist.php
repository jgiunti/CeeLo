<?php

$userID = $_POST["userID"];

$db = new Database();

$conn = $db->connection;

$query = "SELECT timestamp, pointsEarned, outcome FROM gamehistory WHERE userID = ".$userID;

if($data = $conn->query($query)) {
    $gameCnt = $data->num_rows;
    for ($i=0; $i<$gameCnt; $i++) {
        $resRow = $data->fetch_assoc();
        echo json_encode($resRow);
    }
}

$db->closeConnection();


