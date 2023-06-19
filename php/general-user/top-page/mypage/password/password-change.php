<?php
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    session_start();

	$changeBefore = $_POST['change-before'];
	$changeAfter = $_POST['change-after'];
	$conf = $_POST['conf'];
	$flg['change-before'] = true;
	$flg['conf'] = true;
    $token = $_POST['csrf_token'];

	if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
		exit('不正なリクエストです。');
	}
	unset($_SESSION['csrf_token']);
	
    //対象ユーザーのパスワードをDBから取得
	try{
		$dbh = new user_infoDAO(getDbh());
        $SQL = "SELECT password FROM user_info where userid = ?";
        $result = $dbh->showPassword($SQL, $_SESSION['userid']);
	} catch(PDOException $e) {
		echo 'DBエラー:' . $e->getMessage().'<br />';
		die();
	}
    
    //入力したパスワード（変更前）とDBから取得したパスワードを照合
    //照合成功した場合は、入力したパスワード（変更後）の2重確認
    if(!password_verify($changeBefore,$result['password'])){
        $_SESSION['befErr'] = '現在のパスワードと異なります。';
        $flg['change-before'] = false;
    }else{
        if($changeAfter != $conf){
            $_SESSION['aftErr'] = '変更後パスワードと変更後パスワード（確認）が異なります。';
            $flg['conf'] = false;
        }
    }
    
    //パスワード更新処理を実施
	if($flg['change-before'] && $flg['conf']){
        $password = password_hash($changeAfter, PASSWORD_DEFAULT);
        $SQL = 'UPDATE user_info SET password = ? where userid = ?';
        try{
            $dbh->update($SQL, $_SESSION['userid'], $password);
        }catch(PDOException $e){
            echo 'DBエラー:' . $e->getMessage().'<br />';
		    die();
        }
        $_SESSION['pass-change-register'] = 'パスワードを変更しました。';
    }
    
    header('Location: ./password.php');
    $dbh = null;
?>    
    