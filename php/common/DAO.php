<?php
    class user_infoDAO {
        private $dbh;

        function __construct(PDO $dbh) {
            $this->dbh = $dbh;
        }
        /**
         * 全レコード情報を抽出
         * @param string $SQL
         * @return PDO $stmt
         */
        function showUser_info(string $SQL){
            $stmt = $this->dbh->query($SQL);
            return $stmt;
        }

        /**
         * 新規ユーザーをテーブルに追加
         * @param string $SQL 
         * @param string $userId 
         * @param string $password
         * @return void
         */
        function addUser(string $SQL, string $userId, string $password){
            $stmt = $this->dbh->prepare($SQL);
		    $stmt->bindValue(1,$userId);
	        $stmt->bindValue(2,$password);
	        $stmt->execute();
        }

        /**
         * userIdのパスワードを抽出
         * @param string $SQL 
         * @param string $userId
         * @return PDO $result
         */
        function showPassword(string $SQL, string $userId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$userId);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        /**
         * userIdのパスワードを更新
         * @param string $SQL 
         * @param string $userId 
         * @param string $password
         * @return void
         */
        function update(string $SQL, string $userId, string $password){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$password);
            $stmt->bindValue(2,$userId);
            $stmt->execute();
        }

    }

    class inquiryDAO {
        private $dbh;

        function __construct(PDO $dbh) {
            $this->dbh = $dbh;
        }
        /**
         * 問い合わせ内容をテーブルに登録
         * @param string $SQL
         * @param $array
         * @return void
         */
        function insert(string $SQL, $array){
            $stmt = $this->dbh->prepare($SQL);
            for($i = 0; $i < count($array); $i++){
                $stmt->bindValue(($i+1),$array[$i]);   
            }
            $stmt->execute();
            $stmt = null;
        }

        /**
         * //問い合わせIDを採番(最新の番号に+1)
         * @param string $SQL
         * @return int $slip_id
         */
        function numInqId(string $SQL){
            $stmt = $this->dbh->query($SQL);
            foreach ($stmt as $row) {
                $inq_id = $row['inq_id'];
            }	
            $inq_id++;
            return $inq_id;
        }

        /**
         * SELSECT文の実行
         * @param string $SQL
         * @return PDO $result
         */
        function showInfo(string $SQL){
            $stmt = $this->dbh->query($SQL);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        /**
         * SELECT文（プリペアードステートメントあり）の実行
         * @param string $SQL
         * @param string $inqId
         * @return PDO $result
         */
        function showInfoByInqId(string $SQL, string $inqId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$inqId);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        /**
         * replied_flagの値を1に更新
         * @param string $SQL
         * @param string $inqId
         * @return void
         */
        function updateFlg(string $SQL, string $inqId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$inqId);
            $stmt->execute();
        }

        /**
         * パラメータのinqIDに該当するメッセージを抽出
         * @param string $SQL
         * @param string $inqId
         * @return PDO $result
         */
        function showMessage(string $SQL, string $inqId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$inqId);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }
    }

    class reserveDAO {
        private $dbh;

        function __construct(PDO $dbh) {
            $this->dbh = $dbh;
        }

        /**
         * 予約IDを採番
         * @param string $SQL
         * @return int reserve_id
         */
        function numResId(string $SQL){
            $stmt = $this->dbh->query($SQL);
            foreach ($stmt as $row) {
                $reserve_id = $row['reserve_id'];
            }	
            $reserve_id++;
            $stmt = null;
            return $reserve_id;
        }

        function insert(string $SQL, $array){
            $stmt = $this->dbh->prepare($SQL);
            for($i = 0; $i < count($array); $i++){
                $stmt->bindValue(($i+1),$array[$i]);   
            }
            $stmt->execute();
            $stmt = null;
        }

        /**
         * SELSECT文の実行
         * @param string $SQL
         */
        function showInfo(string $SQL){
            $stmt = $this->dbh->query($SQL);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    class itemDAO {
        private $dbh;

        function __construct(PDO $dbh) {
            $this->dbh = $dbh;
        }
        
        /**
         * 購入手続きをしている商品名から商品IDを取得する
         * @param string $SQL 
         * @param string $itameId
         * @return PDO $result
         */
        function showItemId(string $SQL, $itemId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$itemId);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        /**
         * 在庫数を減らす
         * @param string $SQL 
         * @param int $stockRemain 
         * @param string $itemId
         * @return void
         */
        function decStock(string $SQL, int $stockRemain, string $itemId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$stockRemain);
            $stmt->bindValue(2,$itemId);
            $stmt->execute();
        }

        /**
         * SELSECT文の実行
         * @param string $SQL
         */
        function showInfo(string $SQL){
            $stmt = $this->dbh->query($SQL);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        /**
         * SELECT文の実行（プリペアードステートメントあり）
         * @param string $SQL
         * @param string $itemId
         */
        function showInfoById(string $SQL, string $itemId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$itemId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        /**
         * 在庫数を追加
         * @param string $SQL
         * @param int $stock
         * @param string $itemId
         */
        function updateStock(string $SQL, int $stock, string $itemId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$stock);
            $stmt->bindValue(2,$itemId);
            $stmt->execute();
        }

        /**
         * 商品情報を変更
         * @param string $SQL
         * @param $array
         */
        function updateItemInfo(string $SQL, $array){
            $stmt = $this->dbh->prepare($SQL);
            for($i = 0; $i < count($array); $i++){
                $stmt->bindValue($i+1,$array[$i]);
            }
            $stmt->execute();
        }

    }

    class slipDAO {
        private $dbh;

        function __construct(PDO $dbh) {
            $this->dbh = $dbh;
        }

        /**
         * //伝票IDを採番(最新の番号に+1)
         * @param string $SQL
         * @return int $slip_id
         */
        function numSlipId(string $SQL){
            $stmt = $this->dbh->query($SQL);
            foreach ($stmt as $row) {
                $slip_id = $row['slip_id'];
            }	
            $slip_id++;
            return $slip_id;
        }
        /**
         * 伝票データをDBに格納
         * @param string $SQL 
         * @param $array
         * @return void
         */
        function insert(string $SQL, $array){
            $stmt = $this->dbh->prepare($SQL);
            for($i = 0; $i < count($array); $i++){
                $stmt->bindValue($i+1,$array[$i]);
            }
            $stmt->execute();
        }

        /**
         * 伝票ID、購入金額、購入日を抽出
         * @param string $SQL
         * @param string $userId
         * @return PDO $result
         */
        function getRow(string $SQL, string $userId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$userId);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        /**
         * SELECT文（バインドパラメータなし）を実行
         * @param string $SQL
         * @return PDO $result
         */
        function showInfo(string $SQL){
            $stmt = $this->dbh->query($SQL);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        /**
         * SELECT文（バインドパラメータあり）を実行
         * @param string $SQL
         * @param $array
         * @return PDO $result
         */
        function showInfoByparam(string $SQL, $array){
            $stmt = $this->dbh->prepare($SQL);
            for($i = 0; $i < count($array); $i++){
                $stmt->bindValue($i+1,$array[$i]);
            }
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }

    class receive_messageDAO {
        private $dbh;

        function __construct(PDO $dbh) {
            $this->dbh = $dbh;
        }

        /**
         * receive_idを採番（最新の番号に+1）
         * @param string $SQL
         * @return int recieveId
         */
        function numReceiveId(string $SQL){
            $stmt = $this->dbh->query($SQL);
            foreach ($stmt as $row) {
                $receiveId = $row['receive_id'];
            }	
            $receiveId++;
            return $receiveId;
        }

        /**
         * <pre>
         * 管理者の問い合わせに対する返信内容を登録
         * </pre>
         * @param string $SQL
         * @param array $array
         */
        function insertReply(string $SQL, $array){
            $stmt = $this->dbh->prepare($SQL);
            for($i = 0; $i < count($array); $i++){
                $stmt->bindValue($i+1,$array[$i]);
            }
            $stmt->execute();
        }

        /**
         * ログインユーザー宛に問い合わせの返信がきてるかチェック
         * @param string $SQL
         * @return PDO $result
         */
        function isReceived(string $SQL){
            $stmt = $this->dbh->query($SQL);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        /**
         * ログインユーザーが受信したメッセージの問い合わせIDを抽出
         * @param string $SQL
         * @param string $userId
         * @return PDO $result
         */
        function showInqId(string $SQL, string $userId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$userId);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }

        /**
         * ログインユーザーの対象受信メッセージを閲覧済みに変更
         * @param string $SQL
         * @param string $inqId
         * @param string $userId
         * @param void
         */
        function updateBrowsedFlag(string $SQL, string $inqId, string $userId){
            $stmt = $this->dbh->prepare($SQL);
            $stmt->bindValue(1,$inqId);
            $stmt->bindValue(2,$userId);
            $stmt->execute();
        }
    }
?>    