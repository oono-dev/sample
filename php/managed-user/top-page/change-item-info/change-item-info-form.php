<?php  
	/**
	 * get-item-data.phpから商品情報を取得する際にdetailFlgの指定が必要
	 * true where句にitemIdを指定して取得
	 * false 全抽出 
	 */ 
	session_start();
	$_SESSION['detailFlg'] = true;
    $_SESSION['itemId'] = $_POST['itemId'];
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once './get-item-data.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>商品情報変更</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
		<meta name="viewport" content="width=device-width">
		<link href="/css/change-item-info-form.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>商品情報変更</h1>
		</div>
		<form action="change-item-info-register.php" method="post" class="h-adr">
			<dl class="form-area">
				<dt><span>商品ID(変更不可)</span></dt>
				<dd>
                    <?php
					    echo '<input class="input-text" type="text" name="itemId" readonly="readonly" value="'.$itemId[0].'">';
                    ?>    
				</dd>
				<dt><span class="required">商品名</span></dt>
				<dd>
                    <?php
					    echo '<input class="input-text" type="text" name="iname" required value="'.$iname[0].'">';
                    ?>
				</dd>
				<dt><span class="required">価格</span></dt>
				<dd>
                    <?php
					    echo '<input class="input-text" type="text" name="price" required value="'.$price[0].'">';
                    ?>		
				</dd>
                <dt><span class="required">商品説明</span></dt>	
                <dd>
                    <?php
						echo '<label for="comment"></label>';
					    echo '<textarea id="comment "class="message" name="comment" required>'.$comment[0].'</textarea>';
                    ?>
				</dd>		
				<dd>
					<input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
				</dd>	
				<button class="submit-button" type="submit">確定</button>
			</dl>
			
		</form>
		<div class="complete-msg-area">
			<p>
                <?php
					if(isset($_SESSION['register-msg'])){
						echo $_SESSION['register-msg'].'<br>';					
					}
				?>
                <a href="../manage-top-page.php">マイページに戻る</a>    
			</p>
		</div>				
	</body>
</html>	
	
<?php	
	unset($_SESSION['register-msg']);
	unset($_SESSION['detailFlg']);
	unset($_SESSION['itemId']);
?>