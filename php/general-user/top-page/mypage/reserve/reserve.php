<?php
    session_start();
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>来店予約</title>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
		<meta name="viewport" content="width=device-width">
		<link href="/css/reserve.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>来店予約</h1>
		</div>
		<form action="reserve-register.php" method="post" class="h-adr">
			<dl class="form-area">
            <dt><span class="required">人数</span></dt>	
                <dd>
					<input style="width: 60px;" class="input-text" type="number" name="num-of-people" min="1" required
					<?php 
						if(isset($_SESSION['numOfPeople'])){
							echo 'value='.$_SESSION['numOfPeople'];
						}
					?>	
					>	
				</dd>
                <dt><span class="required">来店日時</span></dt>	
				<?php
					if(isset($_SESSION['dateErrMsg'])){
						echo '<span style="color: #ff6347">'.$_SESSION['dateErrMsg'].'</span>';
					}
				?>	
                <dd>
					<input class="input-text" type="date" name="date" required>	
				</dd>
				<dt><span class="required">お客様氏名</span></dt>
				<dd>
					<input class="input-text" type="text" name="name" required
					<?php 
						if(isset($_SESSION['name'])){
							echo 'value='.$_SESSION['name'];
						}
					?>	
					>
				</dd>
				<dt><span class="required">電話番号</span></dt>
				<dd>
					<input class="input-text" type="tel" name="tel" required
					<?php 
						if(isset($_SESSION['tel'])){
							echo 'value='.$_SESSION['tel'];
						}
					?>	
					>
				</dd>
                <dt><span class="">メールアドレス</span></dt>	
                <dd>
					<input class="input-text" type="email" name="email"
					<?php 
						if(isset($_SESSION['email'])){
							echo 'value='.$_SESSION['email'];
						}
					?>	
					>	
				</dd>
                		
				<dd>
					<input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
				</dd>	
				<button class="submit-button" type="submit">予約</button>
			</dl>
			
		</form>
		<div class="complete-msg-area">
			<p>
                <?php
					if(isset($_SESSION['reserve-register'])){
						echo $_SESSION['reserve-register'].'<br>';					
					}
				?>
                <a href="../mypage.php">マイページに戻る</a>    
			</p>
		</div>				
	</body>
</html>	
	
<?php	
	unset($_SESSION['dateErrMsg']);
	unset($_SESSION['reserve-register']);
	if(isset($_SESSION['numOfPeople'])){ 
		unset($_SESSION['numOfPeople']);
	}
	if(isset($_SESSION['name'])){ 
		unset($_SESSION['name']);
	}
	if(isset($_SESSION['tel'])){ 
		unset($_SESSION['tel']);
	}
	if(isset($_SESSION['email'])){ 
		unset($_SESSION['email']);
	}
?>