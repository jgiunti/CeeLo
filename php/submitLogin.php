<?php
session_start();

if(isset( $_SESSION['userID'] )){
    $message = 'User is already logged in.';
    $page = 'login.html';
}
if(!isset( $_POST['user'], $_POST['password'])){
    $message = 'Please enter a valid username and password.';
    $page = 'login.html';
}
elseif (strlen( $_POST['user']) > 20 || strlen($_POST['user']) < 4){
    $message = 'Username must be between 4 and 20 characters.';
    $page = 'login.html';
}
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4){
    $message = 'Password must be between 4 and 20 characters.';
    $page = 'login.html';
}
elseif (ctype_alnum($_POST['user']) != true){
    $message = "Username must be alpha numeric.";
    $page = 'login.html';
}
elseif (ctype_alnum($_POST['password']) != true){
    $message = "Password must be alpha numeric.";
    $page = 'login.html';
}
else {
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';
    $mysql_dbname = 'cs444';
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    try {
        $dbh = new PDO("mysql:host=$mysql_host;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $dbh->prepare("SELECT userID, userName, password, userType FROM users WHERE userName = :user AND password = :password");

        $stmt->bindParam(':user', $user, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);
        
        $stmt->execute();

        $userID = $stmt->fetchColumn();
        $userType = $stmt->fetchColumn(3);

        if($userID == false) {
                $message = 'Login Failed';
                $page = '../login.html';
        }
        else {
                $_SESSION['userID'] = $userID;
                $message = 'You are now logged in.';
                if($userType == 'admin'){
                    $page = '../admin.php';
                }
                else{
                    $page = '../main.php';
                }
        }
    }
    catch(Exception $e){
        $message = 'Error.';
    }
}
?>

<html>
<head>
<title>Login</title>
<link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<p><?php echo $message; ?>
        <form action="<?php echo $page; ?>" method="post">
        <input type="submit" value="Continue" />
        </form>    
</body>
</html>
