<!DOCTYPE html>
<?php
	session_start();
	require_once './check-message.php';
	if(isset($_SESSION['$receiveFlg']) && $_SESSION['$receiveFlg']){
		echo '<script type="text/javascript">alert("管理者からメッセージが届いています。");</script>';
	}
?>	
<html>
	<!-- header開始 -->
	<head>
		<meta charset="utf-8">
		<title>KISSA official website</title>
		<meta name="description" content="自家焙煎したこだわりのコーヒーと、思わず長居したくなるような居心地の良い
		空間を提供するカフェ「KISSA」のウェブサイトです。">
		<meta name="viewport" content="width=device-width">
		<script src="/js/toggle-menu.js"></script>
		<link href="/css/common.css" rel="stylesheet">
		<link href="/css/index.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
	</head>
	<body>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/html/header.html'); ?>
		<main class="main">
			<div class="first-view">
				<div class="first-view-text">
					<h1>Imagination will <br>
					take you everywhere.</h1>
					<p>コーヒーを待つ時間も、特別なひとときになる。</p>
				</div>	
			</div>
			<div class="lead">
				<p>「想像力はあなたをどこにでも連れてってくれる」<br>
				注文を待つ間に広げた、一冊の本の中に見つけたことば。<br>
				ゆったり流れる時間の中で、想像を膨らませる楽しさを思い出す。<br>
				そんな時間を過ごすとき、おいしいコーヒーがあると嬉しい。</p>
				<div class="link-button-area">
					<a class="link-button" href="/html/concept.html">CONCEPT</a>
				</div>	
			</div>
			<div class="recommended">
				<h2>RECOMMENDED</h2>
				<ul class="item-list">
					<li>
						<img src="/images/index/img-item01.jpg" alt="カフェラテの商品画像">
						<dl>
							<dt>カフェラテ</dt>
							<dd>エスプレッソとミルク、この組み合わせに勝るものはなかなか見つかりません。ほっとしたいとき、やっぱりラテが欲しくなる。</dd>
						</dl>
						<p class="price">¥460</p>
					</li>
					<li>
						<img src="/images/index/img-item02.jpg" alt="レーズンバターサンドの商品画像">
						<dl>
							<dt>レーズンバターサンド</dt>
							<dd>コーヒーに合うお菓子を追及して生まれた当店の大人気メニュー。数量・季節ともに限定のため、見つけたらぜひお試しを。</dd>
						</dl>
						<p class="price">¥480</p>
					</li>
				
					<li>
						<img src="/images/index/img-item03.jpg" alt="アメリカーノの商品画像">
						<dl>
							<dt>アメリカーノ</dt>
							<dd>浅煎りの豆をこだわりの配合でブレンドした、スッキリとした爽やかな飲み口の当店看板メニュー。ホットでもアイスでも。</dd>
						</dl>
						<p class="price">¥420</p>
					</li>
					<li>
						<img src="/images/index\img-item04.jpg" alt="レモネードの商品画像">
						<dl>
							<dt>レモネード</dt>
							<dd>瀬戸内海に浮かぶ小島で、オーナー自らが栽培したとっておきのレモンを、たっぷりと使った自慢のレモネードです。</dd>
						</dl>
						<p class="price">¥420</p>
					</li>
					<li>
						<img src="/images/index/img-item05.jpg" alt="ホットドッグ、チリの商品画像">
						<dl>
							<dt>ホットドッグ、チリ</dt>
							<dd>ちょっと小腹が空いたとき、あると嬉しいホットドッグ。特製チリソースとチーズをかければ、もう言葉はいりません。</dd>
						</dl>
						<p class="price">¥540</p>
					</li>
				</ul>
				<div class="link-button-area">
					<a class="link-button" href="/html/menu.html">MENU</a>
				</div>	
			</div>
		</main>	
		<?php include($_SERVER['DOCUMENT_ROOT'].'/html/footer.html'); ?>
	</body>
</html>