<?php
    ini_set('display_errors', 0);
    session_start();   
    require_once './get-receive-message-data.php';
    if(!$_SESSION['isMessageFlg']){
        echo '<script type="text/javascript">alert("受信メッセージはありません。");</script>';  
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <title>管理者からのメッセージ</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <meta name="viewport" content="width=device-width">
    <link href="/css/show-message.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/js/show-message.js"></script>
</head>
<body>
    <input type="hidden" id="isMessageFlg" value="<?php echo $_SESSION['isMessageFlg']; ?>">   
    <div class="title">
        <h1>管理者からのメッセージ</h1>
    </div>
    <form action="#" method="post" class="h-adr">
        <dl class="form-area">
            <dt><span>元メッセージ</span></dt>
            <dd>
                <?php
                    echo '<label for="comment"></label>';
                    echo '<textarea id="comment "class="message" name="comment" readonly="readonly">'.$originalMessage.'</textarea>';
                ?>    
            </dd>
            <dt><span>受信メッセージ</span></dt>
            <dd>
                <?php
                    echo '<label for="comment"></label>';
                    echo '<textarea id="comment "class="message" name="comment" readonly="readonly">'.$message.'</textarea>';
                ?>  
            </dd>
            <dd>
                <input type="hidden" name="inq_id" value="<?php echo $inqId; ?>">
            </dd>	
            <dd>
                <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
            </dd>	
            <button class="submit-button" type="submit" disabled>返信機能は現在利用不可</button>
        </dl>
        
    </form>
    <div class="complete-msg-area">
        <p>
            <?php
                if(isset($_SESSION['register-msg'])){
                    echo $_SESSION['register-msg'].'<br>';					
                }
            ?>
            <a href="../mypage.php">マイページに戻る</a>    
        </p>
    </div>	   			
</body>
</html>	
<?php
    unset($_SESSION['isMessageFlg']);
?>

