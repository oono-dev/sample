<?php  
    /**
     * XSS対策：エスケープ処理
     * 
     * @param string $str 対象の文字列
     * @return string 処理された文字列
     */
    function h($str){
        return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    }

    /**
     * CSRF対策
     * @param void
     * @return string $csrf_token
     * 1.トークンを生成
     * 2.フォームからそのトークンを送信
     * 3.送信後にそのトークンを照会
     * 4.トークンを削除
     */
    function setToken(){
        $csrf_token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $csrf_token;

        return $csrf_token;
    }

    /**
     * useridが購入した商品名を取得
     * @param string $user_id
     * @return string $iname[]
     * 
     */
    function get_iname($user_id){
        $dsn = 'mysql:dbname=kissa;host=kissa-web.c3w0slydtou1.ap-northeast-3.rds.amazonaws.com;charset=utf8';
        $dbUser = 'kissa';
        $dbPass = 'kissaPractice';
        $iname_result = array();

        try{
            $dbh = new PDO($dsn, $dbUser, $dbPass);
        } catch(PDOException $e) {
            echo 'DB接続エラー:' . $e->getMessage().'<br />';
            die();
        }

        //引数のユーザが購入した商品IDを取得
        $SQL = "SELECT item_id FROM slip where user_id = ?";
        $stmt = $dbh->prepare($SQL);
        $stmt->bindValue(1,$user_id);
        $stmt->execute();
        $id_result = $stmt->fetchAll(PDO::FETCH_COLUMN);

        //各商品IDから商品名を取得
        foreach($id_result as $row){
            $SQL = "SELECT name FROM item where id = ?";
            $stmt = $dbh->prepare($SQL);
            $stmt->bindValue(1,$row);
            $stmt->execute();
            $iname_result_tmp = $stmt->fetch(PDO::FETCH_COLUMN);
            array_push($iname_result,$iname_result_tmp);
        }

        unset($row);
        $dbh = null;
	    $stmt = null;
        return $iname_result;
    }
    
    /**
     * PDOオブジェクトを生成
     * @return PDO $dbh
     * 
     */
    function getDbh() {
        static $dbh;
        if (!isset($pdo)) {
            $dsn = 'mysql:dbname=kissa;host=kissa-web.c3w0slydtou1.ap-northeast-3.rds.amazonaws.com;charset=utf8';
            $dbUser = 'kissa';
            $dbPass = 'kissaPractice';
            //DB接続開始
            $dbh = new PDO($dsn, $dbUser, $dbPass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $dbh;
    }
?>