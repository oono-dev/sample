<!DOCTYPE html>
<?php	
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	session_start();
	$msg = $_SESSION;
?>	
<html>
	<!-- header開始 -->
	<head>
		<meta charset="utf-8">
		<title>ACCESS|KISSA official website</title>
		<meta name="description" content="カフェ「KISSA」のアクセスマップと問い合わせフォームが掲載されたページです。">
		<meta name="viewport" content="width=device-width">
		<script src="/js/toggle-menu.js"></script>
		<link href="/css/common.css" rel="stylesheet">
		<link href="/css/access.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
	</head>
	<!-- header終了 -->
	<body>
		<!--header-->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/html/mypage-header.html'); ?>
		<main class="main">
			<div class="title">
				<h1>ACCESS</h1>
				<p>アクセス・お問い合わせ</p>
			</div>
			<div class="map">
				<h2>アクセスマップ</h2>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3234.675388224264!2d139.4249893144938!3d35.83243932927322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6018deb810d811f1%3A0x6691c8d77b46de63!2z5YWl5pu96aeF!5e0!3m2!1sja!2sjp!4v1645943991204!5m2!1sja!2sjp" 
				style="border:0;" allowfullscreen="" loading="lazy">
				</iframe>
			</div>
			<div class="contact">
				<h2>お問い合わせフォーム</h2>
				<form action="inq-register.php" method="post">
					<dl class="form-area">
						<dt><span class="required">お名前</span></dt>
						<dd>
							<input class="input-text" type="text" name="name" required>
						</dd>
						<dt><span class="required">メールアドレス</span></dt>
						<dd>
							<input class="input-text" type="email" name="email" required>
						</dd>
						<dt>お電話番号</dt>
						<dd>
							<input class="input-text" type="tel" name="tel">	
						</dd>
						<dt>お問い合わせ種別</dt>
						<dd>
							<select class="select-box" name="genre">
								<option value="ご予約について" selected>ご予約について</option>
								<option value="メニューについて">メニューについて</option>
								<option value="営業時間について">営業時間について</option>
							</select>	
						</dd>
						<dt>お客様について</dt>
						<dd>
							<label class="radio-button"><input type="radio" name="user-type" value="一般のお客様" checked>一般のお客様</label>
							<label class="radio-button"><input type="radio" name="user-type" value="お取引様">お取引様</label>
							<label class="radio-button"><input type="radio" name="user-type" value="その他">その他</label>
						</dd>
						<dt><span class="required">お問い合わせ内容</span></dt>
						<dd>
							<textarea class="message" name="message" required></textarea>
						</dd>	
						<dd>
							<input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
						</dd>		
					</dl>	
					<p class="confirm-text">ご入力内容をご確認の上、お間違いなければ送信ボタンを押してください</p>
					<p class="register-message">
						<?php
							if(isset($msg['inq-register'])){
								echo $msg['inq-register'];
							}
						?>	
					</p>
					
					<button class="submit-button" type="submit">送信</button>
				</form>
			</div>
		</main>
		<!--footer-->
		<?php include($_SERVER['DOCUMENT_ROOT'].'/html/mypage-footer.html'); ?>
	</body>
</html>