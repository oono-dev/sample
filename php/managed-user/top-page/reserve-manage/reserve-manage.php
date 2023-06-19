<?php
    session_start();   
    require_once './get-reserve-data.php';
?>

<html>
    <head>
	    <meta charset="utf-8">
	    <title>予約管理</title>
	    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
        <meta name="viewport" content="width=device-width">
	    <link href="/css/purchase.css" rel="stylesheet">
	</head>
	<body>
		<div class="title">
			<h1>予約管理</h1>
		</div>
            <table class="index">
                <tr>
                    <th>予約ID</th>
                    <th>ユーザーID</th>
                    <th>予約者名</th>
                    <th>予約日時</th>
                    <th>来店日</th>
                    <th>人数</th>
                    <th>電話番号</th>
                </tr>
                <?php
                    for($i = 0; $i < count($reserveId); $i++){
                        echo '<tr>';
                            echo '<td>'.$reserveId[$i].'</td>';
                            echo '<td>'.$userId[$i].'</td>';
                            echo '<td>'.$name[$i].'</td>';
                            echo '<td>'.$reservedAt[$i].'</td>';
                            echo '<td>'.$date[$i].'</td>';
                            echo '<td>'.$numOfPeople[$i].'</td>';
                            echo '<td>'.$tel[$i].'</td>';
                        echo'</tr>';    
                    }
                ?>
            </table>
        <div style="text-align: center;">
            <a href="../manage-top-page.php">マイページへ戻る</a>
        </div>    
    </body>     
</html>

                   



                    

