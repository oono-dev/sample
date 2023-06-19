<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';

    $itemId = array();
    $iname = array();
    $price = array();
    $jump_to = array();
    $image = array();
    $comment = array();
    try{
        $dbh = new itemDAO(getDbh());
        if($_SESSION['detailFlg']){
            $SQL = 'SELECT * FROM item where id = ?';
            $result = $dbh->showInfoById($SQL,$_SESSION['itemId']);

        } else {
            $SQL = 'SELECT * FROM item';
            $result = $dbh->showInfo($SQL);

        }
        } catch(PDOException $e) {
        echo 'DB接続エラー:' . $e->getMessage().'<br />';
        die();
    }
    //抽出結果をそれぞれの配列に格納
    foreach($result as $row){
        array_push($itemId,$row['id']);
        array_push($iname,$row['name']);
        array_push($price,$row['price']);
        array_push($jump_to,$row['jump_to']);
        array_push($image,$row['image']);
        array_push($comment,$row['comment']);
    }
    $dbh = null;
?>

