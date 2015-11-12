<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Page</title>
        <link type="text/css" rel="stylesheet" href="../CSS/styles.css" />
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
        </div>
    </body>
</html>
