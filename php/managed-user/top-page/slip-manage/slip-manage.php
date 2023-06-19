<?php
    session_start();   
    require_once './get-slip-data.php';
?>

<html>
    <head>
	    <meta charset="utf-8">
	    <title>伝票管理</title>
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
        <meta name="viewport" content="width=device-width">
	    <link href="/css/purchase.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>伝票管理</h1>
		</div>
        <div class="search-area">
            <form action="search-slip-data.php" method="post">
                <input type="text" class="search-id" name="slip-id" placeholder="伝票IDを入力" required>
                <label for="pay-check">未入金のみ表示</label>
                <input id="pay-check" type="checkbox" name="pay-check" value="0">
                <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
                <button class="submit-button" type="submit">検索</button>
            </form>
        </div>
            <table class="index">
                <tr>
                    <th>伝票ID</th>
                    <th>ユーザーID</th>
                    <th>購入金額</th>
                    <th>購入日</th>
                    <th>入金状態</th>
                </tr>
                <?php
                    for($i = 0; $i < count($_SESSION['slipId']); $i++){
                        echo '<tr>';
                            echo '<td>'.$_SESSION['slipId'][$i].'</td>';
                            echo '<td>'.$_SESSION['userId'][$i].'</td>';
                            echo '<td>'.$_SESSION['totalPrice'][$i].'</td>';
                            echo '<td>'.$_SESSION['date'][$i].'</td>';
                            echo '<td>'.$_SESSION['payFlag'][$i].'</td>';
                        echo'</tr>';    
                    }
                ?>
            </table>
        <div style="text-align: center;">
            <a href="../manage-top-page.php">マイページへ戻る</a>
        </div>    
    </body>     
</html>

<?php
    unset($_SESSION['slipId']);
    unset($_SESSION['userId']);
    unset($_SESSION['totalPrice']);
    unset($_SESSION['date']);
    unset($_SESSION['payFlag']);
    if(isset($_SESSION['searchFlag'])){
        unset($_SESSION['searchFlag']);
    }
?>
                   



                    

