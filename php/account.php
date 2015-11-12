<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Account Page</title>
    </head>
    <body>
        <?php 
        require_once 'User.php';
        $user = new User(1);
        echo $user->userName;
        echo $user->points;
        echo $user->wins;
        echo $user->loss;
        ?>
        <table id="userInfo">
            <tr>
                <th>User Name</th>
                <th>Total Points</th> 
                <th>Wins</th>
                <th>Losses</th>
            </tr>
        </table>             
    </body>
</html>
