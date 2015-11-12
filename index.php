<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>CeeLo Login</title>
    </head>
    <body>
        <?php 
        require_once 'php/User.php';
        $user = new User(1);
        echo $user->userName;
        echo $user->points;
        echo $user->wins;
        echo $user->loss;
        ?>
        <a href="php/account.php">account</a>
        
        <form id='login' action="php/login.php" method="GET" accept-charset="UTF-8">
            <label>Username: </label>
            <input id='name' name="username" type="text"/><br/>
            <label>Password: </label>
            <input id='password' name="password" type="password"/><br/>
            <input name="submit" type="submit" value="Login"/>
        </form>
    </body>
</html>
