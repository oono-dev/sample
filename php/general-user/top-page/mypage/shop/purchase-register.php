<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';

    $address = $_POST['region'].$_POST['locality'].$_POST['street-address'].$_POST['extended-address'];
    $num = $_POST['buynum'];
    $token = $_POST['csrf_token'];   

	if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
		exit('不正なリクエストです。');
	}
	unset($_SESSION['csrf_token']);
	
	try{
		$dbh = new itemDAO(getDbh());
        $SQL = "SELECT id,price,stock FROM item where id = ?";
        $result = $dbh->showItemId($SQL, $_SESSION['itemId']);
    
        //抽出結果から商品ID,合計金額,在庫数を変数に格納
        $item_id = $result['id'];
        $total_price = $result['price'] * $num;
        $stock_remain = $result['stock'] - $num;

        //在庫数を減らす
        $SQL = "UPDATE item SET stock = ? WHERE id = ?";
        $dbh->decStock($SQL, $stock_remain, $item_id);
    } catch(PDOException $e) {
        echo 'DBエラー:'.$e->getMessage().'<br />';
        die();
    }
    $dbh = null;
    try{
        $dbh = new slipDAO(getDbh());
        $SQL = "SELECT slip_id from slip ORDER BY slip_id DESC LIMIT 1";
        $slip_id = $dbh->numSlipId($SQL);
        $inputArray = array(
            $slip_id,
            $item_id,
            $_SESSION['userid'],
            $_POST['name'],
            $_POST['tel'],
            $address,
            $_POST['email'],
            $total_price
        );

        $SQL = "INSERT INTO slip(slip_id,item_id,user_id,name,tel,address,email,total_price) 
                VALUES (?,?,?,?,?,?,?,?)";
        $dbh->insert($SQL, $inputArray);   
    }catch(PDOException $e){
        echo 'DBエラー:' . $e->getMessage().'<br />';
		die();
    }
    
    $_SESSION['purchase-register'] = '購入手続きが完了しました。';
    header('Location: ./purchase.php');
	$dbh = null;
?>