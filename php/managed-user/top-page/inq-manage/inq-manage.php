<?php
    session_start();
    if(isset($_SESSION['replyFlg']) && $_SESSION['replyFlg']){
        echo '<script type="text/javascript">alert("返信が完了しました。");</script>';
        $_SESSION['replyFlg'] = false;
    }
    $_SESSION['replyFlg'] = false;   
    require_once './get-inquiry-data.php';
?>

<html>
    <head>
	    <meta charset="utf-8">
	    <title>問い合わせ管理</title>
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
        <meta name="viewport" content="width=device-width">
	    <link href="/css/inq-manage.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>問い合わせ管理</h1>
		</div>
        <form action="./reply.php" method="POST" class="reply-index">  
            <table class="index">
                    <th>対象</th>
                    <th>問い合わせID</th>
                    <th>ユーザーID</th>
                    <th>名前</th>
                    <th>email</th>
                    <th>ジャンル</th>
                    <th>ユーザー種別</th>
                <?php
                    for($i = 0; $i < count($inqId); $i++){
                        echo '<tr>';
                            echo '<td><input type="radio" name="checked_record"  required value="'.$inqId[$i].'"></td>';
                            echo '<td>'.$inqId[$i].'</td>';
                            echo '<td>'.$userId[$i].'</td>';
                            echo '<td>'.$name[$i].'</td>';
                            echo '<td>'.$email[$i].'</td>';
                            echo '<td>'.$genre[$i].'</td>';
                            echo '<td>'.$userType[$i].'</td>';
                        echo'</tr>';    
                    }
                ?>
            </table>
            <button type="submit" class="submit-button">返信する</button>
        </form>
        <div style="text-align: center;">
            <a href="../manage-top-page.php">マイページへ戻る</a>
        </div>    
    </body>     
</html>

                   



                    

