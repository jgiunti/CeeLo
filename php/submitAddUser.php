<?php
session_start();

require_once 'dbConnection.php';

if(isset( $_SESSION['userID'] )){
    $message = 'User is already logged in.';
}
if(!isset( $_POST['username'], $_POST['password'])){
    $message = 'Please enter a valid username and password.';
}
elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4){
    $message = 'Username must be between 4 and 20 characters.';
}
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4){
    $message = 'Password must be between 4 and 20 characters.';
}
elseif (ctype_alnum($_POST['username']) != true){
    $message = "Username must be alpha numeric.";
}
elseif (ctype_alnum($_POST['password']) != true){
    $message = "Password must be alpha numeric.";
}
else {
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';
    $mysql_dbname = 'cs444';
    $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $first = filter_var($_POST['first'], FILTER_SANITIZE_STRING);
    $last = filter_var($_POST['last'], FILTER_SANITIZE_STRING);
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
    $mail = filter_var($_POST['mail'], FILTER_SANITIZE_STRING);
    try {
        $db = new Database();
        $conn = $db->connection;
        $data = $conn->query("SELECT * FROM USERS WHERE userName = '$user'");
        $resCount = $data->num_rows;
        
        if($resCount == 0) {
            $dbh = new PDO("mysql:host=$mysql_host;dbname=$mysql_dbname", $mysql_username, $mysql_password);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $dbh->prepare("INSERT INTO users (fName, lName, userName, email, userType, password ) VALUES (:fName, :lName, :user, :email, :type, :password )");

            $stmt->bindParam(':fName', $first, PDO::PARAM_STR);
            $stmt->bindParam(':lName', $last, PDO::PARAM_STR);
            $stmt->bindParam(':user', $user, PDO::PARAM_STR);
            $stmt->bindParam(':email', $mail, PDO::PARAM_STR);
            $stmt->bindParam(':type', $type, PDO::PARAM_STR);
            $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);

            $stmt->execute();

            unset( $_SESSION['form_token'] );

            $message = 'New user added.';
        }
        else {
            $message = 'User already exists';
        }       
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
    <p><?php echo $message;?>
    <form action="../admin.php" method="post">
    <input type="submit" value="Continue" />
    </form>    
</body>
</html>
