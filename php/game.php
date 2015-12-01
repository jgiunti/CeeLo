<?php
session_start();

if(!isset($_SESSION['userID'])) {
    header("Location:../login.html");
}

$sessionUser = $_SESSION['userID'];


if(empty($_POST)) {
    $turn = 1;
}
else {
    $turn = $_POST['turn'];
}
require_once 'GameState.php';
$state = new GameState($sessionUser);
?>

<!DOCTYPE html>
<html >
    <head>
      <meta charset="UTF-8">
      <title>Game</title>               
          <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
          <script src="//code.jquery.com/jquery-1.10.2.js"></script>
          <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>          
          <script language='Javascript' type='text/javascript' src='../JS/game.js'></script> 
          <link rel="stylesheet" href="../CSS/style.css">   
    </head>
    <body>
        <div class="scoreWrapper">
            <table id="gamescore">
                <tr>
                    <th>Player Rolls Won</th>
                    <th>Opponent Rolls Won</th>
                </tr>
                <tr>
                    <?php 
                    echo '<td align="center">'.$state->pRollsWon.'</td>';
                    echo '<td align="center">'.$state->oRollsWon.'</td>';
                    ?>                   
                </tr>
            </table>
        </div>
        <?php
        if($state->lastRoll > 0) {
            echo '<table id="rollToBeat">';
            echo '<tr>';
            echo '<th>Roll to beat : </th>';
            echo '<td>'.$state->lastRoll.'</td>';
            echo '</tr>';
            echo '</table>';
        }
        ?>        
        <div class="diceWrapper">
            <div id="d1" class="dice">
            </div>
            <div id="d2" class="dice">
            </div>
            <div id="d3" class="dice">
            </div>
        </div>
               
        <div class="container3" align="center">
            <div class="prof-footer">
              <?php
              if ($turn == 1){
                  echo '<button id="btnRoll" class="btn">Roll Dice</button>';
              }
              else {
                  echo '<button id="btnRoll" class="btn" disabled>Roll Dice</button>';
              }

              echo '<input type="hidden" name="turn" value='.$turn.'>';
              
              echo '<input type="hidden" name="userID" value='.$sessionUser.'>'
              ?>
                
            <button id="btnBack" class="btn">Back</button>
            </div>
            <div class="hiddenForm"></div>
        </div>   
        <div id="dialog">
        </div>
    </body>
</html>



