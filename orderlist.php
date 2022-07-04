<!-- 讀資料庫 -->
<?php require_once("Connections/conn_db.php"); ?>
<?php (!isset($_SESSION)) ? session_start() : ""; ?>

<!-- 加入分頁功能, 使用第三方套件php_lib.php -->
<?php require_once('php_lib.php'); ?>

<!doctype html>
<html lang="zh-TW">
<?php
//驗証是否帳號登入
if (!isset($_SESSION['login'])) {
    $sPath = "login.php?sPath=orderlist";
    header(sprintf("Location: %s", $sPath));
}
?>

<head>
    <!-- 將head內容分切出來為,headfile.php, index_s01的head使用引入檔 -->
    <!-- 引入網頁標頭head檔 -->
    <?php require_once("./headfile.php"); ?>
</head>
<script src="https://kit.fontawesome.com/8c4318e451.js" crossorigin="anonymous"></script>

<body>
    <section id="header">
        <!-- 將section header分切出來為navbar.php -->
        <!-- 引入導覽列檔 -->
        <?php require_once("./navbar.php"); ?>
    </section>
    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-2">
                    <!-- 使用引入檔：產品類別 -->
                    <?php require_once("./sidebar.php"); ?>
                    <!-- 使用引入檔：熱銷商品 -->
                    <?php require_once("./hot.php"); ?>
                </div>
                <div class="col-md-12 col-lg-10">
                    <h5>
                        <marquee behavior="" direction="">購買遊戲幣結帳成功後，請聯系Alice Poker Night網站客服，提供給您入點服務。</marquee>
                    </h5>
                    <!-- 使用引入檔訂單查詢 -->
                    <?php require_once("order_content.php"); ?>
                    <div id="main2">
                        <?php require_once("main2.php"); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="scontent">
        <!-- 使用引入檔服務說明scontent -->
        <?php require_once("./scontent.php"); ?>
    </section>
    <section id="footer">
        <!-- 使用引入檔聯絡資訊footer -->
        <?php require_once("./footer.php"); ?>
    </section>
    <!-- 使用引入檔  javascript檔 -->
    <?php require_once("./jsfile.php"); ?>
</body>

</html>
<?php

?>