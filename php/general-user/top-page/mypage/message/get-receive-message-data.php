<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    $_SESSION['isMessageFlg'] = true;

    try{
        //1. 受信メッセージを取得（受信メッセージが無い場合は無処理）
        $dbh = new receive_messageDAO(getDbh());
        $SQL = 'SELECT inq_id,message FROM receive_message WHERE to_user_id=?';
        $result = $dbh->showInqId($SQL, $_SESSION['userid']);
        if($result == null){
            $_SESSION['isMessageFlg'] = false;
        }
        if($_SESSION['isMessageFlg']){
            $inqId = $result['inq_id'];
            $message = $result['message'];
            $result = null;
            //2. receive_messageテーブルの閲覧フラグを1に更新（未閲覧だった場合）
            if($_SESSION['$receiveFlg']){
                $SQL = 'UPDATE receive_message SET browsed_flag=1 WHERE inq_id=? AND to_user_id=?';
                $dbh->updateBrowsedFlag($SQL, $inqId, $_SESSION['userid']);
                $_SESSION['$receiveFlg'] = false;
            }
            $dbh = null;
            //3. 2で取得したinqIdで元メッセージを取得
            $dbh = new inquiryDAO(getDbh());
            $SQL = 'SELECT message FROM inquiry WHERE inq_id=?';
            $result = $dbh->showMessage($SQL, $inqId);
            $originalMessage = $result['message'];
        }  
    } catch(PDOException $e) {
        echo 'DB接続エラー:' . $e->getMessage().'<br />';
        die();
    }
    $dbh = null;
?>