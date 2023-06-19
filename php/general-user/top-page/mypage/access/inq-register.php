<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';
    session_start();
	$token = $_POST['csrf_token'];
	
    if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
		exit('不正なリクエストです。');
	}
	unset($_SESSION['csrf_token']);
	
	try{
		$dbh = new inquiryDAO(getDbh());
		$SQL = "SELECT inq_id from inquiry ORDER BY inq_id DESC LIMIT 1";
		$inq_id = $dbh->numInqId($SQL);
		$inputArray = array(
			$inq_id,
			$_SESSION['userid'],
			$_POST['name'], 
			$_POST['email'],
			$_POST['tel'],
			$_POST['genre'],
			$_POST['user-type'],
			$_POST['message']
		);
		$dbh->insert('INSERT INTO inquiry (inq_id,user_id,name,email,tel,genre,user_type,message) 
					VALUES (?,?,?,?,?,?,?,?)', $inputArray);
	} catch(PDOException $e) {
		echo 'DBエラー:' . $e->getMessage().'<br />';
		die();
	}
	
	$_SESSION['inq-register'] = '送信しました。';
	header('Location: ./access.php');
	$dbh = null;
?>
