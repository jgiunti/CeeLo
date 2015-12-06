<?php

//Karl Engemann

session_start();

require_once 'dbConnection.php';

if (strlen($_POST['user']) > 20 || strlen($_POST['user']) < 4){
    $output = 'Username must be between 4 and 20 characters.';
}

else {
    $mysql_host = 'localhost';
    $mysql_username = 'root';
    $mysql_password = '';
    $mysql_dbname = 'cs444';
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);

    try {
        $db = new Database();
        $conn = $db->connection;
        //$query = $conn->query("SELECT userID FROM USERS WHERE userName = $user");
        
        $data = $conn->query("SELECT userID FROM USERS WHERE userName = '$user'");
        $resRow = $data->fetch_assoc();       
        
        $userID = $resRow['userID'];
        
        $dbh = new PDO("mysql:host=$mysql_host;dbname=$mysql_dbname", $mysql_username, $mysql_password);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt1 = $dbh->prepare("DELETE FROM points where userID = :userID");
        $stmt1->bindParam(':userID', $userID);
        $stmt1->execute();
        
        $stmt2 = $dbh->prepare("DELETE FROM users where userID = :userID");
        $stmt2->bindParam(':userID', $userID);
        $stmt2->execute();

        unset($_SESSION['pageID']);

        $output = 'User deleted.';
    }
    catch(Exception $e) {
        $output = $e;
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
    <p><?php echo $output; ?>
    <form action="../admin.php" method="post">
        <input type="submit" value="Continue" />
    </form>
</body>
</html>
