<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    $token = $_POST['csrf_token'];
    $stockRemain = array();
    $stockInput = array(
        'itm001' => 0,
        'itm002' => 0,
        'itm003' => 0,
        'itm004' => 0,
        'itm005' => 0,
        'itm006' => 0,
        'itm007' => 0,
        'itm008' => 0
    );
    
	if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
		exit('不正なリクエストです。');
	}
	unset($_SESSION['csrf_token']);

    //各項目が入力されていたら配列に格納   
    $idNum = 1;
    foreach($stockInput as &$row){
        $itemIdTmp = 'itm00';
        $strId = (string)$idNum;
        $itemIdTmp = $itemIdTmp.$strId;
        if(!empty($_POST[$itemIdTmp])){
            $stockInput[$itemIdTmp] =  (int)$_POST[$itemIdTmp];
        }
        $idNum++;
    }
    unset($row);
    
	try{
		$dbh = new itemDAO(getDbh());
        $SQL = "SELECT id,stock from item";
        $result = $dbh->showInfo($SQL);
        //現在の在庫数を抽出し、各商品在庫に入力値を加算
        foreach($result as $row){
            $stockRemain += array($row['id'] => (int)$row['stock']);
        }
        unset($row);
        //各商品の在庫数を更新
        $SQL = "UPDATE item SET stock  = ? where id = ?";
        $idNum = 1;
        foreach($stockRemain as &$row){
            $itemIdTmp = 'itm00';
            $strId = (string)$idNum;
            $itemIdTmp = $itemIdTmp.$strId;
            $stockRemain[$itemIdTmp] += $stockInput[$itemIdTmp];
            $dbh->updateStock($SQL, $stockRemain[$itemIdTmp], $itemIdTmp);
            $idNum++;
        }
    } catch(PDOException $e) {
        echo 'DBエラー:'.$e->getMessage().'<br />';
        die();
    }
    $_SESSION['complete-msg'] = '処理が完了しました。';
    $dbh = null;
    header('Location: ./add-stock.php');

?>