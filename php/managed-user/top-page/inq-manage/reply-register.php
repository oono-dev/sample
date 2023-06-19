<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    $token = $_POST['csrf_token'];
	
    if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
		exit('不正なリクエストです。');
	}
	unset($_SESSION['csrf_token']);
    
    try{
        $dbh = new receive_messageDAO(getDbh());
        $SQL = 'SELECT receive_id FROM receive_message ORDER BY receive_id DESC LIMIT 1';
        $receiveId = $dbh->numReceiveId($SQL);
        //insert文のパラメータ
        $inputArray = array(
            $receiveId,
            $_POST['inq_id'],
            $_POST['target_user_id'],
            $_SESSION['userid'],
            $_POST['reply-message']
        );
        $SQL = 'INSERT INTO receive_message (receive_id,inq_id,to_user_id,from_user_id,message) 
                VALUES (?,?,?,?,?)';
        $dbh->insertReply($SQL, $inputArray);
        $dbh = null;
        //inquiryテーブルのreplied_flagを1にセット
        $dbh = new inquiryDAO(getDbh());
        $SQL = 'UPDATE inquiry SET replied_flag=1 WHERE inq_id=?';
        $dbh->updateFlg($SQL,$_POST['inq_id']);
    } catch(PDOException $e) {
        echo 'DB接続エラー:' . $e->getMessage().'<br />';
        die();
    }
    $dbh = null;
    $_SESSION['replyFlg'] = true;
    header('Location: ./inq-manage.php');
?>