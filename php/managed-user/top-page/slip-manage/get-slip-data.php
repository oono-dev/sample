
<?php
    /**
     * 当画面のみ検索機能があるため、SQLの結果をSESSIONに渡している
     */

    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    
    /**
     * 初期表示処理
     * 検索ボタン押下時はこの処理を通らない
     */
    if(!isset($_SESSION['searchFlag'])){
        $_SESSION['slipId'] = array();
        $_SESSION['userId'] = array();
        $_SESSION['totalPrice'] = array();
        $_SESSION['date'] = array();
        $_SESSION['payFlag'] = array();

        try{
            $dbh = new slipDAO(getDbh());
            $SQL = 'SELECT slip_id,user_id,total_price,date,pay_flag FROM slip';
            $result = $dbh->showInfo($SQL);
        } catch(PDOException $e) {
            echo 'DB接続エラー:' . $e->getMessage().'<br />';
            die();
        }
        //抽出結果をそれぞれの配列に格納
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
        $dbh = null;
    }
?>