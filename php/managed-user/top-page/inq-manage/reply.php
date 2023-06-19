<?php
    session_start();   
    $_SESSION['replyFlg'] = true;   
    $_SESSION['inqId'] = $_POST['checked_record'];  
    require_once './get-inquiry-data.php';
?>
<html>
<head>
    <meta charset="utf-8">
    <title>問い合わせ返信</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <meta name="viewport" content="width=device-width">
    <link href="/css/change-item-info-form.css" rel="stylesheet">
</head>
<body>
    <div class="title">
        <h1>問い合わせ返信</h1>
    </div>
    <form action="reply-register.php" method="post" class="h-adr">
        <dl class="form-area">
            <dt><span>ユーザーID</span></dt>
            <dd>
                <?php
                    echo '<input class="input-text" type="text" name="target_user_id" readonly="readonly" value="'.$targetUserId.'">';
                ?>    
            </dd>
            <dt><span>問い合わせ内容</span></dt>
            <dd>
                <?php
                    echo '<label for="comment"></label>';
                    echo '<textarea id="comment "class="message" name="comment" readonly="readonly">'.$message.'</textarea>';
                ?>    
            </dd>
            <dt><span class="required">返信</span></dt>
            <dd>
                <label for="comment"></label>
                <textarea id="comment "class="message" name="reply-message" required></textarea>
            </dd>
            <dd>
                <input type="hidden" name="inq_id" value="<?php echo $inqId; ?>">
            </dd>	
            <dd>
                <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
            </dd>	
            <button class="submit-button" type="submit">送信</button>
        </dl>
        
    </form>
    <div class="complete-msg-area">
        <p>
            <?php
                if(isset($_SESSION['register-msg'])){
                    echo $_SESSION['register-msg'].'<br>';					
                }
            ?>
            <a href="./inq-manage.php">問い合わせ一覧に戻る</a>    
        </p>
    </div>				
</body>
</html>	

<?php	
    unset($_SESSION['register-msg']);
    unset($_SESSION['replyFlg']);
    unset($_SESSION['inqId']);
?>