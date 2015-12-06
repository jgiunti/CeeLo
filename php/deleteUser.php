<!DOCTYPE html>

<!--Karl Engemann-->

<html>
<head>
<title>Delete User</title>
 <link rel="stylesheet" href="..CSS/style.css">
</head>
<?php

session_start();

$pageID = md5(uniqid('auth', true));

$_SESSION['pageID'] = $pageID;
?>

<body>
    <h2>Delete User</h2>
        <form action="submitDeleteUser.php" method="post">
        <fieldset>
            <p>
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="" maxlength="20" pattern=".{4,}"/>
            </p>
            <p>
                <input type="hidden" name="pageID" value="<?php echo $pageID; ?>" />
                <input type="submit" value="Submit" />
            </p>
        </fieldset>
        </form>
</body>
</html>


