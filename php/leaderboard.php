<?php

$db = new Database();

$conn = $db->connection;

$query = "SELECT u.userName, p.pointsTotal FROM users u, points p WHERE u.userID = p.userID ORDER BY pointsTotal DESC LIMIT 10";

if($data = $conn->query($query)) {
    $leadersCnt = $data->num_rows;
    for ($i=0; $i<$gameCnt; $i++) {
        $resRow = $data->fetch_assoc();
        echo json_encode($resRow);
    }
}

$db->closeConnection();


