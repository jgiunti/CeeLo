$(document).ready(function()
{
    turn = $('[name="turn"]').val();
    //alert(turn);
    if(turn == 0) {
        setTimeout(function(){diceRoll(turn);}, 3000);
        //diceRoll(turn);
    }
    
    lastRoll = 0;
    opponentRoll = 0;
    oRollsWon = 0;
    pRollsWon = 0;
    
    $('#btnRoll').click(function()
    {             
        diceRoll(turn);
    }); 
    
    $('#btnBack').click(function()
    {
        window.location = "../main.html";
    }); 
   
});

function diceRoll(turn) {
    dice1 = Math.floor((Math.random() * 6) + 1);
    dice2 = Math.floor((Math.random() * 6) + 1);
    dice3 = Math.floor((Math.random() * 6) + 1);
    //alert(dice1 + ', ' + dice2 + ', ' + dice3);
    diceFadeIn(dice1, dice2, dice3);

    $.post("../php/gameController.php", { d1: dice1, d2: dice2, d3 : dice3, turn: turn }, function(rText, status)
    {   
        processResponse(rText, turn);
    });
}

function processResponse(rText, turn) {
    if(rText == "gameWon" || rText == "gameLost") {
        alert(rText);
        diceFadeOut();
        setTimeout(function(){window.location = "../main.html";}, 10000);
        return;
    }
    else if(rText == 'win' || rText == 'lose') {
        diceFadeOut();
        setTimeout(function(){redirect(1);}, 10000);
        return;
    }
    else if(rText != "again") {
        turn = turn == 1 ? 0 : 1;
    }
    diceFadeOut();
    setTimeout(function(){redirect(turn);}, 5000);
    
}

function diceFadeIn(d1, d2, d3) {
    $('#d1').html('<img id="dice1" src="../pictures/die' + d1 +'.gif"/>').promise().done(function() {
        $('#dice1').hide();
        $('#dice1').fadeIn(3000);
    });
    $('#d2').html('<img id="dice2" src="../pictures/die' + d2 +'.gif"/>').promise().done(function() {
        $('#dice2').hide();
        $('#dice2').fadeIn(3000);
    });
    $('#d3').html('<img id="dice3" src="../pictures/die' + d3 +'.gif"/>').promise().done(function() {
        $('#dice3').hide();
        $('#dice3').fadeIn(3000);
    });
}

function diceFadeOut() {
    $('#dice1').fadeOut(3000);
    $('#dice2').fadeOut(3000);
    $('#dice3').fadeOut(3000);
}

function redirect(turn) {
    $('.hiddenForm').html('<form action="../php/game.php" name="frmTurn" method="post" style="display:none;"><input type="text" name="turn" value="' + turn + '" /></form>');

    document.forms['frmTurn'].submit();
}






