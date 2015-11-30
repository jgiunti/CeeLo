<?php
session_start();

if (strlen( $_POST['user']) > 20 || strlen($_POST['user']) < 4){
    $message = 'Username must be between 4 and 20 characters.';
}

else {
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = 'password';
    $mysql_dbname = 'cs444';
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);

    try {
        $dbh = new PDO("mysql:host=$mysql_host;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("DELETE FROM users where user = userName");

        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->execute();

        unset( $_SESSION['form_token'] );

        $message = 'User deleted.';
    }
    catch(Exception $e) {
        $message = 'Error.';
    }
}
?>

<html>
<head>
<title>Submit User</title>
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <h2>Submit Delete User Status</h2>
    <p><?php echo $message; ?>
    <form action="admin.html" method="post">
    <input type="submit" value="Continue" />
    </form>
</body>
</html>
