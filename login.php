<!-- 讀資料庫 -->
<?php require_once("Connections/conn_db.php"); ?>
<?php (!isset($_SESSION)) ? session_start() : ""; ?>

<!-- 加入分頁功能, 使用第三方套件php_lib.php -->
<?php require_once('php_lib.php'); ?>

<?php
//取得要返回的php頁面
if (isset($_GET['sPath'])) {
    $sPath = $_GET['sPath'] . ".php";
} else {
    //登入完成預設要進入首頁
    $sPath = "index.php";
}
//檢查是否完成登入驗證
if (isset($_SESSION['login'])) {
    header(sprintf("location: %s", $sPath));
}
?>

<!doctype html>
<html lang="zh-TW">

<head>
    <!-- 將head內容分切出來為,headfile.php, index_s01的head使用引入檔 -->
    <!-- 引入網頁標頭head檔 -->
    <?php require_once("./headfile.php"); ?>
    <!-- 會員登入專用css -->
    <style type="text/css">
        /* Card component */
        .mycard.mycard-container1 {
            max-width: 500px;
            height: 450px;
            background-repeat: no-repeat;
            background-image: linear-gradient(rgb(13, 10, 10), rgb(32, 22, 99), rgb(92, 0, 33));
            color: aliceblue;
        }



        .form-signin input[type="email"],
        .form-signin input[type="password"],
        .form-signin button {
            width: 100%;
            height: 44px;
            font-size: 16px;
            display: block;
            margin-bottom: 20px;

        }

        .btn.btn-signin {
            font-weight: 700;
            background-color: rgb(195, 5, 2);
            color: aliceblue;
            height: 38px;
            transition: all 1s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: rgb(05, 05, 55);
            color: red;
        }

        .other a {
            color: aliceblue
        }

        .other a:hover,
        .other a:active,
        .other a:focus {
            color: rgb(8, 149, 250);
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
                    <!-- 使用引入檔產品類別sidebar -->
                    <?php require_once("./sidebar.php"); ?>
                    <!-- 使用引入檔熱銷商品hot -->
                    <?php require_once("./hot.php"); ?>
                </div>

                <div class="col-md-12 col-lg-6">
                    <h5>
                        <marquee behavior="" direction="">忘記密碼，請洽客服中心/聯絡我們Alice Poker Night 專業客服，請留下電話，立即為您服務，開啟您美好的賭場夜生活。</marquee>
                    </h5>
                    <!-- 會員登入html頁面 -->
                    <div class="mycard mycard-container1">
                        <img id="profile-img" class="profile-img-card" src="images/logo03.png" />
                        <p id="profile-name" class="profile-name-card animated bounceInDown">會員登入</p>
                        <form action="" method="post" class="form-signin" id="form1">
                            <input type="email" id="inputAccount" name="inputAccount" class="form-control" placeholder="請輸入email帳號" require autofocus />
                            <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="請輸入Password" require />
                            <button class="btn btn-signin mt-4" type="submit">Sign in</button>
                        </form>
                        <div class="other mt-5 text-center">
                            <a href="register.php">New user/</a><a href="help.php">Forgot the password?</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-0 col-lg-4">
                    <!-- 使用引入檔：mp4影片main.php -->
                    <?php require_once("./main.php"); ?>
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
    <script type="text/javascript" src="./commlib.js"></script>
    <!-- 建立會員登入功能 -->
    <script type="text/javascript">
        $(function() {
            $("#form1").submit(function() {
                const inputAccount = $("#inputAccount").val();
                const inputPassword = MD5($("#inputPassword").val());
                $("#loading").show();
                //利用$ajax函數呼叫後台的auth_user.php驗証帳號密碼
                $.ajax({
                    url: 'auth_user.php',
                    type: 'post',
                    dataType: 'json',
                    data: {
                        inputAccount: inputAccount,
                        inputPassword: inputPassword,
                    },
                    success: function(data) {
                        if (data.c == true) {
                            alert(data.m);
                            //window.location.reload();
                            window.location.href = "<?php echo $sPath; ?>";
                        } else {
                            alert(data.m);
                        }
                    },
                    error: function(data) {
                        alert("系統目前無法連接到後台資料庫");
                    }
                });
            });
        });
    </script>

    <div id="loading" name="loading" style="display: none;position:fixed;width:100%;height:100%;top:0;left:0;background-color:rgba(255,255,255,0.5);z-index:9999;"><i class="fas fa-spinner fa-spin fa-5x fa-fw" style="position: absolute;top:50%;left:50%;"></i></div>
</body>

</html>