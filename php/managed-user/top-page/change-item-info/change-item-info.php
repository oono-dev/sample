<?php
	
	/**
	 * get-item-data.phpから商品情報を取得する際にdetailFlgの指定が必要
	 * true where句にitemIdを指定して取得
	 * false 全抽出 
	 */ 
    session_start();
	$_SESSION['detailFlg'] = false;
	require_once './get-item-data.php'; 
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>商品情報変更</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
		<meta name="viewport" content="width=device-width">
		<link href="/css/change-item-info.css" rel="stylesheet">   
	</head>
	<body>
		<div class="title">
			<h1>商品情報変更</h1>
		</div>
		<form action="change-item-info-form.php" method="post" class="h-adr">
			<dl class="form-area">
                <dt><span class="required">変更する商品を選択してください。</span></dt>	
                <dd>
                    <select id="select" class="select" name="itemId">
                        <?php
                            for($i = 0; $i < count($iname); $i++){
                                echo '<option value="'.$itemId[$i].'">'.$itemId[$i].':'.$iname[$i].'</option>';
                            }
                        ?>    
                    </select>
                </dd>	
				<button class="submit-button" type="submit">次へ</button>
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