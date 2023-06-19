<?php
    session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>在庫追加</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
		<meta name="viewport" content="width=device-width">
		<link href="/css/add-stock.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="/js/add-stock.js"></script>    
	</head>
	<body>
		<div class="title">
			<h1>在庫追加</h1>
		</div>
		<form action="add-stock-register.php" method="post" class="h-adr">
			<dl class="form-area">
                <dt><span class="required">対象商品</span></dt>	
                <dd>
                    <label for="itm001"><span>itm001</span></label>
					<input id="itm001" class="check-box" type="checkbox" name="num-of-people" value="itm001">
                    <input type="number" id="itm001-input" class="input-text"  name="itm001" min="1" disabled>
                </dd>
                <dd>
                    <label for="itm002"><span>itm002</span></label>
					<input id="itm002" class="check-box" type="checkbox" name="num-of-people" value="itm002">
                    <input type="number" id="itm002-input" class="input-text" name="itm002"  min="1" disabled>
                </dd>
                <dd>
                    <label for="itm003"><span>itm003</span></label>
					<input id="itm003" class="check-box" type="checkbox" name="num-of-people" value="itm003">
                    <input type="number" id="itm003-input" class="input-text" name="itm003" min="1" disabled>
                </dd>    
                <dd>
                    <label for="itm004"><span>itm004</span></label>
					<input id="itm004" class="check-box" type="checkbox" name="num-of-people" value="itm004">
                    <input type="number" id="itm004-input" class="input-text" name="itm004" min="1" disabled>
                </dd>
                <dd>
                    <label for="itm005"><span>itm005</span></label>
					<input id="itm005" class="check-box" type="checkbox" name="num-of-people" value="itm005">
                    <input type="number" id="itm005-input" class="input-text" name="itm005" min="1" disabled>    
                </dd>
                <dd>
                    <label for="itm006"><span>itm006</span></label>
					<input id="itm006" class="check-box" type="checkbox" name="num-of-people" value="itm006">
                    <input type="number" id="itm006-input" class="input-text" name="itm006" min="1" disabled>
                </dd>
                <dd>
                    <label for="itm007"><span>itm007</span></label>
					<input id="itm007" class="check-box" type="checkbox" name="num-of-people" value="itm007">
                    <input type="number" id="itm007-input" class="input-text" name="itm007" min="1" disabled>
                </dd>    
                <dd>
                    <label for="itm008"><span>itm008</span></label>
					<input id="itm008" class="check-box" type="checkbox" name="num-of-people" value="itm008">
                    <input type="number" id="itm008-input" class="input-text" name="itm008" min="1" disabled>
				</dd>
				<dd>
					<input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
				</dd>	
				<button class="submit-button" type="submit">追加</button>
			</dl>
			
		</form>
		<div class="complete-msg-area">
			<p>
                <?php
					if(isset($_SESSION['complete-msg'])){
						echo $_SESSION['complete-msg'].'<br>';					
					}
				?>
                <a href="../manage-top-page.php">マイページに戻る</a>    
			</p>
		</div>				
	</body>
</html>	
	
<?php	
	unset($_SESSION['complete-msg']);
?>