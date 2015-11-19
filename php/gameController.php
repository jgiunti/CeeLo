<?php

require_once 'GameState.php';

$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$turn = $_POST['turn'];
//$orolls = $_POST['oRollsWon'];
//$prolls = $_POST['pRollsWon'];
$points = $_POST['points'];

$dArray = array($d1, $d2, $d3);

sort($dArray);

$state = new GameState(1);
$lastRoll = $state->lastRoll;

if($dArray[0] == 1 && $dArray[1] == 2 && $dArray[2] == 3) {
    $res = 'lose';  
}
elseif ($dArray[0] == 4 && $dArray[1] == 5 && $dArray[2] == 6) {
    $res = 'win';
}
else {
    if($dArray[0] == $dArray[1]) {      
        if($lastRoll == 0) {
            $res = $dArray[2];
        }
        else {
            $res = $dArray[2] > $lastRoll ? 'win' : 'lose';
        }
    }
    elseif($dArray[1] == $dArray[2]) {
        if($lastRoll == 0) {
            $res = $dArray[0];
        }
        else {
            $res = $dArray[0] > $lastRoll ? 'win' : 'lose';
        }
    }
    else {
        $res = 'again';
    }
}

if($res == 'lose') {
    $state->lastRoll = 0;
    if($turn == 1) {
        $state->oRollsWon = $state->oRollsWon + 1;
        $state->points = $points;
        $state->turn = 1;
    }
    else {
        $state->pRollsWon = $state->pRollsWon + 1;
        $state->points = $points;
        $state->turn = 1;
    }
    $state->updateGameState();
    //checkWinLoss($state);  
}
elseif($res == 'win') {
    $state->lastRoll = 0;
    if($turn == 1) {
        $state->pRollsWon = $state->pRollsWon + 1;
        $state->points = $points;
        $state->turn = 1;
    }
    else {
        $state->oRollsWon = $state->oRollsWon + 1;
        $state->points = $points;
        $state->turn = 1;
    }
    $state->updateGameState();
    //checkWinLoss($state); 
}
 elseif($res != 'again') {
    $state->lastRoll = $res;
    $state->turn = $turn == 1 ? 0 : 1;
    $state->updateGameState();
}

checkWinLoss($state, $res);



function checkWinLoss($state, $result) {
    if($state->oRollsWon == 3) {
        $result = 'gameLost';
        $state->submitGameResult("L", -10);
    }
    elseif($state->pRollsWon == 3) {
        $result = 'gameWon';
        $state->submitGameResult("W", 10);
    }
    echo $result;
}



