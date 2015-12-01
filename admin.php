<?php 
session_start();

if(!isset($_SESSION['userID']) || $_SESSION['userID'] != 'admin') {
    header("Location:login.html");
}

$sessionUser = $_SESSION['userID'];
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" href="CSS/style.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Admin Page</h2>
        <form action="php/addUser.php" method="post">
        <input type="submit" value="Add User" />
        </form>
        <form action="php/deleteUser.php" method="post">
        <input type="submit" value="Delete User" />
        </form>
    </body>
</html>
