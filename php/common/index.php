<?php
	require_once './function.php';
	session_start();
	$msg = $_SESSION;
	$_SESSION = array();
?>	
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
		<meta name="viewport" content="width=device-width">
		<link href="/css/login.css" rel="stylesheet">
	</head>
	<div class="title">
		<h1>Welcome!</h1>
		<p>KISSAのログインページです。</p>
	</div>	
    <div id="login">
		<form name='form-login' action="login.php" method="post">
			<span class="fontawesome-user"></span>
			<input type="text" id="user" name="userid" placeholder="Username">
			<span class="fontawesome-lock"></span>
			<input type="password" id="pass" name="pass" placeholder="Password">
			<input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
			<input type="submit" value="Login">
		</form>
	</div>
	<div class="register-msg-area">
		<p><?php
			if(isset($msg['register'])){
				echo $msg['register'];
			}
		?></p>
	</div>
	<a href="adduser-form.php" class="adduserLink"><p>ユーザーの新規登録はこちら</p></a>
	<div class="error-area">
		<p><?php
			if(isset($msg['errMsg'])){
				echo $msg['errMsg'];
			}
		?></p>
	</div>
</html>