<?php
    session_start();
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/function.php';
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/DAO.php';

    $token = $_POST['csrf_token']; 
	if(!isset($_SESSION['csrf_token']) || $token != $_SESSION['csrf_token']){
		exit('不正なリクエストです。');
	}
	unset($_SESSION['csrf_token']);
    
    if($_POST['date'] <= date('Y-m-d')){
        $_SESSION['dateErrMsg'] = '本日以前の日付は予約不可です。';
            $_SESSION['numOfPeople'] = $_POST['num-of-people'];
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['tel'] = $_POST['tel'];
            $_SESSION['email'] = $_POST['email'];
        header('Location: ./reserve.php');
        exit();
    }
	
	try{
		$dbh = new reserveDAO(getDbh());
        $SQL = "SELECT reserve_id from reserve ORDER BY reserve_id DESC LIMIT 1";
        $reserve_id = $dbh->numResId($SQL);
	    $inputArray = array(
            $reserve_id,
            $_SESSION['userid'], 
            $_POST['num-of-people'],
            $_POST['date'],
            $_POST['name'],
            $_POST['tel'],
            $_POST['email']
        );

        $SQL = "INSERT INTO reserve(reserve_id,userid,num_of_people,date,name,tel,email) 
                VALUES (?,?,?,?,?,?,?)";
        $dbh->insert($SQL,$inputArray);
    } catch(PDOException $e) {
        echo 'DBエラー:' . $e->getMessage().'<br />';
        die();
    }
    $_SESSION['reserve-register'] = '予約が完了しました。';
    header('Location: ./reserve.php');
	$dbh = null;
?>