<?php echo '<h2>'.$iname[0].'</h2>'; ?>
	<div class="item-area">
        <?php
            echo '<img src='.$image[0].' alt="'.$iname[0].'の画像">';
            echo '<div class="about-item">';
                echo '<p class="item-text">'.$comment[0].'</p>';
                echo '<p class="item-price">￥'.number_format($price[0]).'</p>';
                echo '<a href="./purchase.php">購入手続き</a>';
            echo '</div>';    
        ?>
	</div>