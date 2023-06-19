<?php
    session_start();   
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';

    $itemId = array();
    $iname = array();
    $stock = array();

    try{
        $dbh = new itemDAO(getDbh());
        $SQL = 'SELECT id,name,stock FROM item';
        $result = $dbh->showInfo($SQL,);
    } catch(PDOException $e) {
        echo 'DB接続エラー:' . $e->getMessage().'<br />';
        die();
    }
    //抽出結果をそれぞれの配列に格納
    foreach($result as $row){
        array_push($itemId,$row['id']);
        array_push($iname,$row['name']);
        array_push($stock,$row['stock']);
    }
?>

<html>
    <head>
	    <meta charset="utf-8">
	    <title>在庫管理</title>
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
        <meta name="viewport" content="width=device-width">
	    <link href="/css/purchase.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>在庫管理</h1>
		</div>
            <table class="index">
                <tr>
                    <th>商品ID</th>
                    <th>商品名</th>
                    <th>在庫数</th>
                </tr>
                <?php
                    for($i = 0; $i < count($itemId); $i++){
                        echo '<tr>';
                            echo '<td>'.$itemId[$i].'</td>';
                            echo '<td>'.$iname[$i].'</td>';
                            echo '<td>'.$stock[$i].'</td>';
                        echo'</tr>';    
                    }
                ?>
            </table>
        <div style="text-align: center;">
            <a href="../manage-top-page.php">マイページへ戻る</a>
        </div>    
    </body>     
</html>

                   



                    

