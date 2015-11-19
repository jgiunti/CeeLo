<?php
require_once 'GameState.php';

$new = $_POST["new"];

if($new == 1) {
    GameState::clearGameInProgress(1);
    echo('success');
}
else {
    $rows = GameState::checkGameInProgress(1);
    if($rows > 0) {
        $state = new GameState(1);
        $turn = $state->turn;        
        echo json_encode(array('continue', $turn));
    }
    else {
        echo 'error';
    }
}

