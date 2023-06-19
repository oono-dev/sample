<?php
    session_start();   
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';

    $slip_id = array();
    $iname = get_iname($_SESSION['userid']);
    $date = array();
    $total_price = array();

    try{
        $dbh = new slipDAO(getDbh());
        $SQL = 'SELECT slip_id, total_price, date FROM slip WHERE user_id = ?';
        $result = $dbh->getRow($SQL, $_SESSION['userid']);
    } catch(PDOException $e) {
        echo 'DB接続エラー:' . $e->getMessage().'<br />';
        die();
    }
    //抽出結果をそれぞれの配列に格納
    foreach($result as $row){
        array_push($slip_id,$row['slip_id']);
        array_push($total_price,$row['total_price']);
        array_push($date,$row['date']);
    }
?>

<html>
    <head>
	    <meta charset="utf-8">
	    <title>購入履歴</title>
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
        <meta name="viewport" content="width=device-width">
	    <link href="/css/purchase.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>購入履歴</h1>
		</div>
            <table class="index">
                <tr>
                    <th>伝票番号</th>
                    <th>購入商品</th>
                    <th>購入日</th>
                    <th>購入金額</th>
                </tr>
                <?php
                    for($i = 0; $i < count($slip_id); $i++){
                        echo '<tr>';
                            echo '<td>'.$slip_id[$i].'</td>';
                            echo '<td>'.$iname[$i].'</td>';
                            echo '<td>'.$date[$i].'</td>';
                            echo '<td>'.$total_price[$i].'</td>';
                        echo'</tr>';    
                    }
                ?>
            </table>
        <div style="text-align: center;">
            <a href="../mypage.php">マイページへ戻る</a>
        </div>    
    </body>     
</html>

                   



                    

