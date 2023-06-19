<?php
    session_start();
    $_SESSION['itemId'] = 'itm008';
    $_SESSION['detailFlg'] = true;
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/const-variable.php';
    require_once getItemData_PATH;
?>
<html>
<?php include($_SERVER['DOCUMENT_ROOT'].'/html/shop-detail-head.html'); ?>
<body>
    <!-- headerの読込 -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/html/mypage-header.html'); ?>
    <main class="main">
        <div class="title">
            <h1>ONLINE SHOP</h1>
            <p>オンラインショップ</p>
        </div>
        <div class="shop-contents">
            <div class="shop-item">
            <?php include('./detail-item-area.php'); ?>
                <div class="item-group recommended">
                    <h2>RECOMMENDED</h2>
                    <ul class="item-list">
                        <li>
                            <a href="./shop-detail-josou.php">
                                <img src="/images/shop/img-item03.jpg" alt="除草ピックの画像">
                                <dl>
                                    <dt>除草ピック</dt>
                                    <dd>レンガの目地などの細かい雑草を除去するのに最適な除草ピックです。</dd>
                                </dl>
                            </a>
                        </li>
                        <li>
                            <a href="./shop-detail-onion.php">
                                <img src="/images/shop/img-item02.jpg" alt="オニオンホーの画像">
                                <dl>
                                    <dt>オニオンホー</dt>
                                    <dd>地面をならしたり起こしたり、さまざまな場面で活躍するツールです。</dd>
                                </dl>
                            </a>
                        </li>
                        <li>
                            <a href="./shop-detail-garden.php">
                                <img src="/images/shop/img-item04.jpg" alt="ガーデン捕虫器の商品画像">
                                <dl>
                                    <dt>ガーデン捕虫器</dt>
                                    <dd>木の枝やガーデンに吊るして、害虫を捕獲します。底に果実などを入れて使います。</dd>
                                </dl>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <?php include($_SERVER['DOCUMENT_ROOT'].'/html/detail-shop-menu.html'); ?>
        </div>
    </main>
    <!-- footerの読込 -->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/html/mypage-footer.html'); ?>
</body>
</html>
<?php
    unset($iname);
    unset($image);
    unset($comment);
    unset($price);
?>    