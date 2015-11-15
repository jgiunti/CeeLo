<?php 
$turn = 1;

?>

<!DOCTYPE html>
<html >
    <head>
      <meta charset="UTF-8">
      <title>Game</title>
          <link rel="stylesheet" href="../CSS/style.css">         
          <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>
          <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js'></script>
          <script language='Javascript' type='text/javascript' src='../JS/game.js'></script>           
    </head>
    <body>
    
<div class="button-container">
    <div class="menu">
      <div class="menu-form">
          <div class="menu-button">
          <?php
          if ($turn == 1){
              echo '<button id="btnRoll" class="btn">Roll Dice</button>';
          }
          else {
              echo '<button id="btnRoll" class="btn" disabled>Roll Dice</button>';
          }
          
          echo '<input type="hidden" name="turn" value='.$turn.'>'
          ?>
          
        </div>
      </div>
     </div>
  </div>
</body>
</html>



