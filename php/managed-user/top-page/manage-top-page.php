<!DOCTYPE html>
<?php
	session_start();
?>	
<html>
	<!-- header開始 -->
	<head>
		<meta charset="utf-8">
		<title>kissa管理者</title>
		<meta name="viewport" content="width=device-width">
		<script src="/js/toggle-menu.js"></script>
		<link href="/css/common.css" rel="stylesheet">
		<link href="/css/mypage.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
	</head>
	<body>
		<header class="header">
			<div class="header-inner">
				<a class="header-logo" href="#">
					<img src="/images/common/logo-header.png" alt="KISSA">
				</a>  	
				<button class="toggle-menu-button"></button>
				<div class="header-site-menu">
					<nav class="site-menu">
						<ul>
							<li><a href="./stock/stock.php">在庫表示</a></li>
							<li><a href="./add-stock/add-stock.php">在庫追加</a></li>
                            <li><a href="./change-item-info/change-item-info.php">商品情報変更</a></li>
                            <li><a href="./slip-manage/slip-manage.php">伝票管理</a></li>
							<li><a href="./reserve-manage/reserve-manage.php">予約管理</a></li>
							<li><a href="./inq-manage/inq-manage.php">問い合わせ管理</a></li>
                            <li><a href="/php/common/logout.php">ログアウト</a></li>
						</ul>	
					</nav>
				</div>
			</div>
		</header>
		<main class="main">
        <div class="title">
				<h1>kissa管理者ページ</h1>
				<p>
                    <?php echo 'ようこそ'.$_SESSION['userid'].'さん'; ?>    
                </p>
			</div>
		</main>	
	</body>
</html>
