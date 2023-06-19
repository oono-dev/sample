<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    $reserveId = array();
    $userId = array();
    $name = array();
    $reservedAt = array();
    $date = array();
    $numOfPeople = array();
    $tel = array();

    try{
        $dbh = new reserveDAO(getDbh());
        $SQL = 'SELECT reserve_id,userid,reserved_at,num_of_people,date,name,tel FROM reserve';
        $result = $dbh->showInfo($SQL);
    } catch(PDOException $e) {
        echo 'DB接続エラー:' . $e->getMessage().'<br />';
        die();
    }
    //抽出結果をそれぞれの配列に格納
    //現在日付以降のデータのみ格納
    foreach($result as $row){    
        if($row['date'] >= date('Y-m-d')){
            array_push($reserveId,$row['reserve_id']);
            array_push($userId,$row['userid']);
            array_push($name,$row['name']);
            array_push($reservedAt,$row['reserved_at']);
            array_push($date,$row['date']);
            array_push($numOfPeople,$row['num_of_people']);
            array_push($tel,$row['tel']);
        }
        
    }
    $dbh = null;
?>