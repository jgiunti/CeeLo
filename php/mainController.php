<?php
session_start();

if(!isset($_SESSION['userID'])) {
    header("Location:../login.html");
}

$sessionUser = $_SESSION['userID'];


require_once 'GameState.php';

$new = $_POST["new"];

if($new == 1) {
    GameState::clearGameInProgress($sessionUser);
    echo('success');
}
else {
    $rows = GameState::checkGameInProgress($sessionUser);
    if($rows > 0) {
        $state = new GameState(1);
        $turn = $state->turn;        
        echo json_encode(array('continue', $turn));
    }
    else {
        echo 'error';
    }
}

