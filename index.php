<?php
include('login.php'); // Includes Login Script
if(!empty($_SESSION['login_user'])){
	header("location: home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="stylelogin.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>MY IPL</h1>
<div id="login">
<h2>Login Form</h2>
<form action="" method="POST">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
