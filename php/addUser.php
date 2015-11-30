
<html>
<head>
<title>Add User</title>
 <link rel="stylesheet" href="CSS/style.css">
</head>
<?php

session_start();

$form_token = md5( uniqid('auth', true) );

$_SESSION['form_token'] = $form_token;
?>

<body>
<h2>Add user</h2>
<form action="submitAddUser.php" method="post">
<fieldset>
<p>
<label for="username">Username</label>
<input type="text" id="username" name="username" value="" maxlength="20" pattern=".{4,}"/>
</p>
<p>
<label for="password">Password</label>
<input type="text" id="password" name="password" value="" maxlength="20" pattern=".{4,}"/>
</p>
<p>
<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
<input type="submit" value="Submit" />
</p>
</fieldset>
</form>
</body>
</html>
