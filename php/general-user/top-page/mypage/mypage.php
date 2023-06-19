<!DOCTYPE html>
<?php
	session_start();
?>	
<html>
	<!-- header開始 -->
	<head>
		<meta charset="utf-8">
		<title>My page</title>
		<meta name="viewport" content="width=device-width">
		<script src="/js/toggle-menu.js"></script>
		<link href="/css/common.css" rel="stylesheet">
		<link href="/css/mypage.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
	</head>
	<body>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/html/mypage-header.html'); ?>
		<main class="main">
        <div class="title">
				<h1>MY PAGE</h1>
				<p>
                    <?php echo 'ようこそ'.$_SESSION['userid'].'さん'; ?>    
                </p>
			</div>
		</main>	
	</body>
</html>
