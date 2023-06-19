<!DOCTYPE html>
<?php 
	session_start();
	$_SESSION['detailFlg'] = false;
	require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/const-variable.php';
	require_once getItemData_PATH;
?>    
<html>
	<head>
		<meta charset="utf-8">
		<title>ONLINE SHOP</title>
		<meta name="description" content="カフェ「KISSA」のスタッフが厳選した、園芸用品のオンラインショップのページです。">
		<meta name="viewport" content="width=device-width">
		<script src="/js/toggle-menu.js"></script>
		<link href="/css/common.css" rel="stylesheet">
		<link href="/css/shop.css" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
	</head>
	<body>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/html/mypage-header.html'); ?>
		<main class="main">
			<div class="title">
				<h1>ONLINE SHOP</h1>
				<p>オンラインショップ</p>
			</div>	
			<div class="shop-contents">
				<div class="shop-item">
					<div class="item-group">
						<h2>GARDENING GOODS</h2>
						<ul class="item-list">
                            <?php
                                for($i = 0; $i < count($iname); $i++){
                                    echo '<li>';
                                    echo '<a href='.$jump_to[$i].'>';
                                    echo '<img src='.$image[$i].'alt="'.$iname[$i].'の商品画像"';
                                    echo '<dl>';
                                    echo '<dt>'.$iname[$i].'</dt>';
                                    echo '<dd>'.$comment[$i].'</dd>';
                                    echo '</dl>';
                                    echo '</a>';
                                    echo '</li>';
                                }
                            ?>
						</ul>							
					</div>	
				</div>
				<aside class="shop-menu">
					<div class="shop-menu-inner">
						<h2>ITEM LIST</h2>
						<ul>
                            <?php
                                for($i = 0; $i < count($iname); $i++){
                                    echo '<li>';
                                    echo '<a href='.$jump_to[$i].'>';
                                    echo $iname[$i];
                                    echo '</a>';
                                    echo '</li>';
                                }
                            ?>
                        </ul>    
					</div>	
				</aside>
			</div>
		</main>
		<?php include($_SERVER['DOCUMENT_ROOT'].'/html/mypage-footer.html'); ?>
	</body>
</html>
<?php
    unset($iname);
    unset($price);
    unset($jump_to);
    unset($image);
    unset($comment);
?>