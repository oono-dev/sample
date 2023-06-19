<?php
    session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>商品購入</title>
		<script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
		<meta name="viewport" content="width=device-width">
		<link href="/css/purchase.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>商品購入</h1>
		</div>
		<form action="purchase-register.php" method="post" class="h-adr">
			<dl class="form-area">
				<dt><span class="required">お客様氏名</span></dt>
				<dd>
					<input class="input-text" type="text" name="name" required>
				</dd>
				<dt><span class="required">電話番号</span></dt>
				<dd>
					<input class="input-text" type="tel" name="tel" required>
				</dd>
				<dt><span class="">郵便番号</span></dt>
				<dd>
					<div style="display:inline-block;">
						<input type="hidden" class="p-country-name" value="Japan">
						<input type="text" class="p-postal-code" size="3" maxlength="3">-
						<input type="text" class="p-postal-code" size="4" maxlength="4"> 
					</div>		
				</dd>
                <dt><span class="required">ご自宅住所</span></dt>	
                <dd>
					<input class="p-region" type="text" name="region" placeholder="都道府県"  required>
                    <input class="p-locality" type="text" name="locality" placeholder="市町村" required>
                    <input class="p-street-address" type="text" name="street-address" placeholder="番地等" required>
                    <input class="p-extended-address" type="text" name="extended-address" placeholder="アパート・マンション名等">
					<p>
						<?php
							if(isset($_SESSION['addErr'])){
								echo $_SESSION['addErr'];
							}
						?>
					</p>	
				</dd>
                <dt><span class="">メールアドレス</span></dt>	
                <dd>
					<input class="input-text" type="email" name="email">	
				</dd>
                <dt><span class="required">個数</span></dt>	
                <dd>
					<input style="width: 60px;" class="input-text" type="number" name="buynum" value=1 required>	
				</dd>		
				<dd>
					<input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
				</dd>	
				<button class="submit-button" type="submit">購入</button>
			</dl>
			
		</form>
		<div class="complete-msg-area">
			<p>
                <?php
					if(isset($_SESSION['purchase-register'])){
						echo $_SESSION['purchase-register'].'<br>';					
					}
				?>
                <a href="./shop.php">商品ページに戻る</a>    
			</p>
		</div>				
	</body>
</html>	
	
<?php	
    unset($_SESSION['addErr']);
	unset($_SESSION['purchase-register']);
?>