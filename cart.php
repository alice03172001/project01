<!-- 讀資料庫 -->
<?php require_once("Connections/conn_db.php"); ?>
<?php (!isset($_SESSION)) ? session_start() : ""; ?>

<!-- 加入分頁功能, 使用第三方套件php_lib.php -->
<?php require_once('php_lib.php'); ?>

<!doctype html>
<html lang="zh-TW">

<head>
    <!-- 將head內容分切出來為,headfile.php, index_s01的head使用引入檔 -->
    <!-- 引入網頁標頭head檔 -->
    <?php require_once("./headfile.php"); ?>
    <style type="text/css">
        /* 輸入有錯誤時，顯示紅框 */
        table input:invalid {
            border: solid red 3px;
        }
    </style>
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

                    <!-- 使用引入檔 購物車內容模組 -->
                    <?php require_once("cart_content.php");
                    ?>
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


    <script type="text/javascript">
        //更改數量寫入資料庫
        $("#cartForm1 input").change(function() {
            var qty = $(this).val();
            const cartid = $(this).attr("cartid");
            if (qty <= 0 || qty >= 50) {
                alert("更改數量需大於0，以及小於50以下!");
                return (false);
            }
            //利用jquery $.ajax函數呼叫後台的change_qty.php
            $.ajax({
                url: 'change_qty.php',
                type: 'post',
                dataType: 'json',
                data: {
                    cartid: cartid,
                    qty: qty,
                },
                success: function(data) {
                    if (data.c == true) {
                        window.location.reload();
                    } else {
                        alert(data.m);
                    }
                },
                error: function(data) {
                    alert("系統目前無法連接到後台資料庫。");
                }
            });
        });
    </script>
</body>


</html>