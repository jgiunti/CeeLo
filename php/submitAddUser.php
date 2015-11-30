<?php
session_start();

if(isset( $_SESSION['userID'] )){
    $message = 'User is already logged in.';
}
if(!isset( $_POST['user'], $_POST['password'])){
    $message = 'Please enter a valid username and password.';
}
elseif (strlen( $_POST['user']) > 20 || strlen($_POST['user']) < 4){
    $message = 'Username must be between 4 and 20 characters.';
}
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4){
    $message = 'Password must be between 4 and 20 characters.';
}
elseif (ctype_alnum($_POST['user']) != true){
    $message = "Username must be alpha numeric.";
}
elseif (ctype_alnum($_POST['password']) != true){
    $message = "Password must be alpha numeric.";
}
else {
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = 'password';
    $mysql_dbname = 'cs444';
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    try {
        $dbh = new PDO("mysql:host=$mysql_host;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("INSERT INTO users (userName, password ) VALUES (:user, :password )");

        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);

        $stmt->execute();

        unset( $_SESSION['form_token'] );

        $message = 'New user added.';
    }
    catch(Exception $e) {
        if( $e->getCode() == 23000) {
            $message = 'Username already exists.';
        }
        else {
            $message = 'Error.';
        }
    }
}
?>

<html>
<head>
<title>Submit User</title>
</head>
<body>
    <h2>Submit Add User Status</h2>
    <p><?php echo $message; ?>
    <form action="admin.html" method="post">
    <input type="submit" value="Continue" />
    </form>    
</body>
</html>
