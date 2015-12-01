<?php 
session_start();

if(!isset($_SESSION['userID'])) {
    header("Location:login.html");
}

require_once 'php/leaderBoard.php';
$leaders = new leaderBoard();
?>

<!DOCTYPE html>
<html >
    <head>
      <meta charset="UTF-8">
      <title>Main</title>        
          <link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700' rel='stylesheet' type='text/css'>
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
          <script src="//code.jquery.com/jquery-1.10.2.js"></script>
          <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>          
          <script language='Javascript' type='text/javascript' src="JS/jq.js"></script>
          <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
    <div id='leaderWrap'>
        <table id="leaderBoard">
            <caption>Leaders</caption>
                <tr>
                    <th>User Name</th>
                    <th>Total Points</th> 
                    <th>Wins</th>
                    <th>Losses</th>
                </tr>
                <?php 
                foreach ($leaders->leaders as $user) {
                    echo '<tr>';
                        echo '<td>';
                            echo $user->userName;
                        echo '</td>';
                        echo '<td>';
                            echo $user->points;
                        echo '</td>';
                        echo '<td>';
                            echo $user->wins;
                        echo '</td>';
                        echo '<td>';
                            echo $user->loss;
                        echo '</td>';
                    echo '</tr>';
                }                              
                ?>               
        </table>
    </div>
    <div class='hiddenForm'></div>    
    <div class="button-container">
        <div class="menu">
          <div class="menu-form">
              <div class="menu-button">
                <button id="new" class="btn">New Game</button>
                <button id="continue" class="btn">Continue</button>
                <button id="profile" class="btn">Profile</button>
              </div>
          </div>
         </div>
      </div>
    <div id="dialog" style='color: black'></div>
    </body>
</html>