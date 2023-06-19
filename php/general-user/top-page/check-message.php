<?php
    require_once '../../common/const-variable.php';
    require_once function_PATH;
    require_once DAO_PATH;
    $_SESSION['$receiveFlg'] = false;

    try {
    $dbh = new receive_messageDAO(getDbh());
    $SQL = 'SELECT to_user_id,browsed_flag FROM receive_message';
    $result = $dbh->isReceived($SQL);
    } catch(PDOException $e) {
        echo 'DBエラー:' . $e->getMessage().'<br />';
		die();
    }
    foreach($result as $row){
        if( ($row['to_user_id'] == $_SESSION['userid']) && $row['browsed_flag'] == '0'){
            $_SESSION['$receiveFlg'] = true;
            break;
        }
    }
    $dbh = null;
?>