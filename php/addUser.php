
<html>
<head>
<title>Add User</title>
 <link rel="stylesheet" href="../CSS/style.css">
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
<label for="first">First Name</label>
<input type="text" id="firstName" name="first" maxlength="20"/>
</p>
<p>
<label for="last">Last Name</label>
<input type="text" id="lastName" name="last" maxlength="20"/>
</p>
<p>
<label for="mail">E-mail</label>
<input type="text" id="email" name="mail" maxlength="20"/>
</p>
<p>
<label for="username">Username</label>
<input type="text" id="username" name="username" maxlength="20" />
</p>
<p>
<label for="password">Password</label>
<input type="password" id="password" name="password"  maxlength="20" />
</p>
<p>
<label for="type">User Type</label>
<input type="text" id="uType" name="type" maxlength="20"/>
</p>
<p>
<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
<input type="submit" value="Submit" />
</p>
</fieldset>
</form>
</body>
</html>
