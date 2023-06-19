<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    $itemId = $_POST['itemId'];
    $iname = $_POST['iname'];
    $price = $_POST['price'];
    $comment = $_POST['comment'];
    $token = $_POST['csrf_token'];

	if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
		exit('不正なリクエストです。');
	}
	unset($_SESSION['csrf_token']);

    
    //商品情報を更新
	try{
		$dbh = new itemDAO(getDbh());
        $SQL = "UPDATE item SET name=?, price=?, comment=? WHERE id=?";
        $inputArray = array($iname, $price, $comment, $itemId);
        $dbh->updateItemInfo($SQL, $inputArray);
    } catch(PDOException $e) {
        echo 'DBエラー:'.$e->getMessage().'<br />';
        die();
    }
    $_SESSION['complete-msg'] = '処理が完了しました。';
    $dbh = null;
    header('Location: ./change-item-info.php');

?>