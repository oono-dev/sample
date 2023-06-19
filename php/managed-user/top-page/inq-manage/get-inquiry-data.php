<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    $inqId = array();
    $userId = array();
    $name = array();
    $email = array();
    $genre = array();
    $userType = array();

    try{
        $dbh = new inquiryDAO(getDbh());
        if($_SESSION['replyFlg']){
            $SQL = 'SELECT inq_id,user_id,message FROM inquiry WHERE inq_id=?';
            $result = $dbh->showInfoByInqId($SQL, $_SESSION['inqId']);
        } else {
            $SQL = 'SELECT inq_id,user_id,name,email,genre,user_type,replied_flag FROM inquiry';
            $result = $dbh->showInfo($SQL);
        }
    } catch(PDOException $e) {
        echo 'DB接続エラー:' . $e->getMessage().'<br />';
        die();
    }
    //抽出結果を格納
    if($_SESSION['replyFlg']){
        $inqId = $result['inq_id'];
        $targetUserId = $result['user_id'];
        $message = $result['message'];
    } else {
        foreach($result as $row){
            if($row['replied_flag'] == '0'){
                array_push($inqId,$row['inq_id']);
                array_push($userId,$row['user_id']);
                array_push($name,$row['name']);
                array_push($email,$row['email']);
                array_push($genre,$row['genre']);
                array_push($userType,$row['user_type']);
            }
        }
    }    
    $dbh = null;
?>