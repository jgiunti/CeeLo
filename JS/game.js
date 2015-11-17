$(document).ready(function()
{
    turn = $('[name="turn"]').val();
    if(turn === 0) {
        diceRoll(turn);
    }
    
    lastRoll = 0;
    opponentRoll = 0;
    oRollsWon = 0;
    pRollsWon = 0;
    
    $('#btnRoll').click(function()
    {             
        diceRoll(turn);
    });    
   
});

function diceRoll(turn) {
    dice1 = Math.floor((Math.random() * 6) + 1);
    dice2 = Math.floor((Math.random() * 6) + 1);
    dice3 = Math.floor((Math.random() * 6) + 1);
    alert(dice1 + ', ' + dice2 + ', ' + dice3);

    $.post("../php/gameController.php", { d1: dice1, d2: dice2, d3 : dice3, turn: turn, points: 0 }, function(rText, status)
    {   
        alert('this roll: ' + rText);
        processResponse(rText, turn);
    });
}

function processResponse(rText, turn) {
    if(rText == "gameWon" || rText == "gameLost") {
        alert(rText);
        window.location = "../main.html";
        return;
    }
    else if(rText != "again") {
        turn = turn == 1 ? 0 : 1;
    }
    alert('response text : ' + rText);
    window.location = "../php/game.php?turn=" + turn;
}






