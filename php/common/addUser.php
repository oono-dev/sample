<?php	
	require_once './function.php';
	require_once './DAO.php';
	session_start();
	$userId = $_POST['newUserId'];
	$password = $_POST['password'];
	$pass_conf = $_POST['password-conf'];
	$token = $_POST['csrf_token'];
	$flg['userid'] = true;
	$flg['password'] = true;

	if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
		exit('不正なリクエストです。');
	}
	unset($_SESSION['csrf_token']);
	
	try{
		$dbh = new user_infoDAO(getDbh());
		$stmt = $dbh->showUser_info("SELECT userid FROM user_info");
	} catch(PDOException $e) {
		echo 'DBエラー:' . $e->getMessage().'<br />';
		die();
	}
	
	foreach ($stmt as $row) {
		if($userId === $row['userid']){
			$flg['userid'] = false;
			$msg['userid'] = 'このユーザーIDは既に使われています。';
		}
	}
	
	if($flg['userid'] && ($password !== $pass_conf)){
		$msg['password'] = 'パスワードとパスワード（確認）が異なります。';
		$flg['password'] = false;
	}
	
	if($flg['userid'] && $flg['password']){
		$password = password_hash($password, PASSWORD_DEFAULT);
		$SQL = 'INSERT INTO user_info(userid,password) VALUES (?,?)';
		try{
			$dbh->addUser($SQL, $userId, $password);
		}catch(PDOException $e){
			echo 'DBエラー:' . $e->getMessage().'<br />';
			die();
		}
		$msg['register'] = 'ユーザー登録が完了しました。';
		header('Location: ./index.php');
	}else{
		header('Location: ./adduser-form.php');
	}
	
	$_SESSION = $msg;
	$dbh = null;
	$stmt = null;
	
?>

	
	