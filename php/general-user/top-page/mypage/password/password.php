<?php  
	session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>パスワード変更</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
		<meta name="viewport" content="width=device-width">
		<script src="/js/toggle-menu.js"></script>
		<link href="/css/password.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>パスワード変更</h1>
		</div>
		<form action="password-change.php", method="post" class="form-adduser">
			<dl class="form-area">
				<dt><span class="required">現在のパスワード</span></dt>
				<dd>
					<input class="input-text" type="password" name="change-before" required>
					<p>
						<?php
							if(isset($_SESSION['befErr'])){
								echo $_SESSION['befErr'];
							}
						?>
					</p>	
				</dd>
				<dt><span class="required">変更後パスワード</span></dt>
				<dd>
					<input class="input-text" type="password" name="change-after" required>
				</dd>
				<dt><span class="required">変更後パスワード（確認）</span></dt>
				<dd>
					<input class="input-text" type="password" name="conf" required>
					<p>
						<?php
							if(isset($_SESSION['aftErr'])){
								echo $_SESSION['aftErr'];
							}
						?>
					</p>	
				</dd>	
				<dd>
					<input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
				</dd>	
				<button class="submit-button" type="submit">変更</button>
			</dl>
			
		</form>
		<div class="complete-msg-area">
			<p><?php
					if(isset($_SESSION['pass-change-register'])){
						echo $_SESSION['pass-change-register'].'<br />';							
					}
					echo '<a href="../mypage.php">マイページに戻る</a>';
				?>
			</p>
		</div>				
	</body>
</html>	
	
<?php	
	unset($_SESSION['befErr']);
	unset($_SESSION['aftErr']);
	unset($_SESSION['pass-change-register']);
?>