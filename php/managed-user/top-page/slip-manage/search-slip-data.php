<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    $token = $_POST['csrf_token'];
    
    if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
        exit('不正なリクエストです。');
    }
    unset($_SESSION['csrf_token']);

    //伝票IDの検索値
    $slipid = $_POST['slip-id'];
    //チェックボックスの値のチェック
    if(!isset($_POST['pay-check']) || $_POST['pay-check'] == ''){
        $payCheck = '1';
    } else {
        $payCheck = $_POST['pay-check'];
    }
    //SQLに渡すパラメータ配列
    $inputArray = array($slipid, $payCheck);

    //検索結果をSESSIONに渡す
    $_SESSION['slipId'] = array();
    $_SESSION['userId'] = array();
    $_SESSION['totalPrice'] = array();
    $_SESSION['date'] = array();
    $_SESSION['payFlag'] = array();
    //検索時の表示かどうかのフラグ
    $_SESSION['searchFlag'] = true;
    

    try {
        $dbh = new slipDAO(getDbh());
        $SQL = "SELECT slip_id, user_id, total_price, date, pay_flag 
                FROM slip 
                WHERE slip_id=? AND pay_flag=?";
        $result = $dbh->showInfoByparam($SQL, $inputArray);
    } catch(PDOException $e) {
        echo 'DB接続エラー:' . $e->getMessage().'<br />';
        die();
    }
    
    foreach($result as $row){    
        array_push($_SESSION['slipId'],$row['slip_id']);
        array_push($_SESSION['userId'],$row['user_id']);
        array_push($_SESSION['totalPrice'],$row['total_price']);
        array_push($_SESSION['date'],$row['date']);
        if($row['pay_flag'] == '1'){
            array_push($_SESSION['payFlag'],'入金済');
        } else {
            array_push($_SESSION['payFlag'],'未入金');
        }
    }
    header('Location: ./slip-manage.php');
?>