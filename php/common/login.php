<?php
	require_once './function.php';
	require_once './DAO.php';
	session_start();

	$userId = $_POST['userid'];
	$password = $_POST['pass'];
	$token = $_POST['csrf_token'];
	$flag['login'] = false;
	$flag['managed'] = false;
	
	if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
		exit('不正なリクエストです。');
	}
	unset($_SESSION['csrf_token']);
	
	if($userId == '' && $password == ''){
		$_SESSION['errMsg'] = 'ユーザーIDとパスワードを入力してください。';
		header('Location: ./index.php');
		exit();
	}

	try{
		$dbh = new user_infoDAO(getDbh());
		$stmt = $dbh->showUser_info("SELECT * FROM user_info");
	} catch(PDOException $e) {
		echo 'DBエラー:' . $e->getMessage().'<br />';
		die();
	}

	foreach ($stmt as $row) {
		if($userId === $row['userid'] && password_verify($password,$row['password'])){
			$flag['login'] = true;
			if($row['managed_sign'] == '1'){
				$flag['managed'] = true;
			}
			break;
		}
	}	
	
	if($flag['login']){
		session_regenerate_id(true);
		$_SESSION['userid'] = $userId;
		if($flag['managed']){
			header('Location: ../managed-user/top-page/manage-top-page.php');	
		}else{
			header('Location: ../general-user/top-page/top-page.php');
		}	
	}else{
		$_SESSION['errMsg'] = 'ユーザーIDまたはパスワードが異なります';
		header('Location: ./index.php');
	}
	
	$dbh = null;
	$stmt = null;
	
?>
