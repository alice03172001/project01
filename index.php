<!-- 讀資料庫 -->
<?php require_once("Connections/conn_db.php"); ?>
<?php (!isset($_SESSION)) ? session_start() : ""; ?>

<!-- 加入分頁功能, 使用第三方套件php_lib.php -->
<?php require_once('php_lib.php'); ?>
<!doctype html>
<html lang="zh-TW">
<!doctype html>
<html lang="zh-TW">

<head>
    <!-- 使用引入檔：網頁標頭 -->
    <?php require_once("./headfile.php"); ?>
</head>
<script src="https://kit.fontawesome.com/8c4318e451.js" crossorigin="anonymous"></script>

<body>
    <section id="header">
        <!-- 使用引入檔：導覽列 -->
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
                <div class="col-md-12 col-lg-6">
                
                     <!-- 使用引入檔：廣告輪播 -->
                     <?php require_once("./carousel.php"); ?>
                    <hr>
                    <h5>
                        <marquee behavior="" direction="">不能錯過博奕攻略，讓您簡易上手必知遊戲大小事！您不知道的賭場知識，趕快來Alice Poker Night 吸收資訊，開啟您美好的賭場夜生活。</marquee>
                    </h5>
                    <!-- 使用引入檔：商品product_list -->
                    <?php require_once("./product_list.php"); ?>
                   
                </div>
                <div class="col-md-0 col-lg-4">
                    <!-- 使用引入檔：mp4影片main.php -->
                    <?php require_once("./main.php"); ?>
                </div>
            </div>
        </div>
    </section>
    <section id="scontent">
        <!-- 使用引入檔：服務說明 -->
        <?php require_once("./scontent.php"); ?>
    </section>
    <section id="footer">
        <!-- 使用引入檔：聯絡資訊 -->
        <?php require_once("./footer.php"); ?>
    </section>
    
    <!-- 使用引入檔：javascript -->
    <?php require_once("./jsfile.php"); ?>    
</body>
</html>
