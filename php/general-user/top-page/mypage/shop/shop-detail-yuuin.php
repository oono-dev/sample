<?php
    session_start();
    $_SESSION['itemId'] = 'itm005';
    $_SESSION['detailFlg'] = true;
    require_once $_SERVER['DOCUMENT_ROOT'].'/php/common/const-variable.php';
    require_once getItemData_PATH;
?>
<html>
<?php include($_SERVER['DOCUMENT_ROOT'].'/html/shop-detail-head.html'); ?>
<body>
    <!--header-->
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
                            <a href="./shop-detail-raver.php">
                                <img src="/images/shop/img-item06.jpg" alt="ラバーグローブの画像">
                                <dl>
                                    <dt>ラバーグローブ</dt>
                                    <dd>表面がラバーコーティングされたグローブです。作業時の滑り止めや衝撃の緩和に。</dd>
                                </dl>
                            </a>
                        </li>
                        <li>
                            <a href="./shop-detail-hozon.php">
                                <img src="/images/shop/img-item07.jpg" alt="種保存袋の商品画像">
                                <dl>
                                    <dt>種保存袋</dt>
                                    <dd>採種した種を保存しておくための袋。使いやすいポチ袋サイズです。20枚入り。</dd>
                                </dl>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--ITEM LIST-->
            <?php include($_SERVER['DOCUMENT_ROOT'].'/html/detail-shop-menu.html'); ?>
        </div>
    </main>
    <!--footer-->
    <?php include($_SERVER['DOCUMENT_ROOT'].'/html/mypage-footer.html'); ?>
</body>
</html>
<?php
    unset($iname);
    unset($image);
    unset($comment);
    unset($price);
?>  