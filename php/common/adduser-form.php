<?php	
	require_once './function.php';
	session_start();
	$err =  $_SESSION;
	$_SESSION = array();
?>	
<html>
	<head>
		<meta charset="utf-8">
		<title>ユーザー登録</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
		<meta name="viewport" content="width=device-width">
		<link href="/css/adduser-form.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>新規ユーザー登録</h1>
		</div>
		<form action="addUser.php" method="post" class="form-adduser">
			<dl class="form-area">
				<dt><span class="required">ユーザーID</span></dt>
				<dd>
					<input class="input-text" type="text" name="newUserId" required>
					<p>
						<?php
							if(isset($err['userid'])){
								echo $err['userid'];
							}
						?>
					</p>	
				</dd>
				<dt><span class="required">パスワード</span></dt>
				<dd>
					<input class="input-text" type="password" name="password" required>
				</dd>
				<dt><span class="required">パスワード確認</span></dt>
				<dd>
					<input class="input-text" type="password" name="password-conf" required>
					<p>
						<?php
							if(isset($err['password'])){
								echo $err['password'];
							}
						?>
					</p>	
				</dd>	
				<dd>
					<input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
				</dd>
				<button class="submit-button" type="submit">新規登録</button>
			</dl>
			
		</form>
	</body>
</html>	