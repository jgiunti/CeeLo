<?php
session_start();

if(!isset($_SESSION['userID'])) {
    header("Location:../login.html");
}

$sessionUser = $_SESSION['userID'];

require_once 'GameState.php';

$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$turn = $_POST['turn'];
$points = 0;

$dArray = array($d1, $d2, $d3);

sort($dArray);

$state = new GameState($sessionUser);
$lastRoll = $state->lastRoll;
$trip = $state->trip;

if($dArray[0] == 1 && $dArray[1] == 2 && $dArray[2] == 3) {
    $res = 'lose';  
}
elseif ($dArray[0] == 4 && $dArray[1] == 5 && $dArray[2] == 6) {
    $res = 'win';
}
else {
    if(($dArray[0] == $dArray[1]) && ($dArray[1] == $dArray[2])) {
        if($lastRoll == 0) {
            $res = $dArray[2];
            $state->trip = 1;
        }
        else {
            if($dArray[0] > $lastRoll) {
                $res = 'win';
                $state->trip = 0;
            }
            else {
                if($trip == 1) {
                    $res = 'lose';
                    $state->trip = 0;
                }
                else {
                    $res = 'win';
                    $state->trip = 0;
                }
            }          
        }
    }  
    elseif($dArray[0] == $dArray[1]) {      
        if($lastRoll == 0) {
            $res = $dArray[2];
            $state->trip = 0;
        }
        else {
            $res = $dArray[2] > $lastRoll && $trip == 0 ? 'win' : 'lose';
            $state->trip = 0;
        }
    }
    elseif($dArray[1] == $dArray[2]) {
        if($lastRoll == 0) {
            $res = $dArray[0];
            $state->trip = 0;
        }
        else {
            $res = $dArray[0] > $lastRoll && $trip == 0 ? 'win' : 'lose';
            $state->trip = 0;
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



