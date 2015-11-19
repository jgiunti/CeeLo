<?php

$new = $_POST["new"];

if($new == 1) {
    GameState::clearGameInProgress(1);
}
else {
    if(GameState::checkGameInProgress(1)) {
        $state = new GameState(1);
        $turn = $state->turn;        
        echo 'continue,' + $turn;
    }
    else {
        echo 'error';
    }
}

