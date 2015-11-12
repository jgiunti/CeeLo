<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Page</title>
        <link type="text/css" rel="stylesheet" href="../CSS/styles.css" />
        <script src='http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.3.min.js'></script>    
        <script language='Javascript' type='text/javascript' src='../JS/jq.js'></script>
    </head>
    <body>
        <?php 
        require_once 'User.php';
        $user = new User(1);
        ?>     
        <div id="user">
            <div class="titleAcct">
                <h1> User Info.</h1>
            </div>
            <table id="userInfo">
                <tr>
                    <th>User Name</th>
                    <th>Total Points</th> 
                    <th>Wins</th>
                    <th>Losses</th>
                </tr>
                <?php 
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
                ?>
            </table>
            <div class="btnViewHist">
                <div class="btnTxt">View Game History</div>
            </div>
            <table id="gameHist" style="visibility: hidden">
                <tr>
                    <th>
                        Date
                    </th>
                    <th>
                        Points Earned
                    </th>
                    <th>
                        Outcome
                    </th>
                </tr>
            </table>
        </div>
    </body>
</html>
