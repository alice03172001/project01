<!-- 讀資料庫 -->
<?php require_once("connections/conn_db.php"); ?>
<?php (!isset($_SESSION)) ? session_start() : ""; ?>
<!-- 取得表單資料寫入資料庫 -->

<?php
if (isset($_POST['flag'])) {
    $cname = $_POST['cname'];
    $tel = $_POST['tel'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $message = $_POST['message'];
    $SQLstring = "INSERT INTO feedback(cname,tel,email,address,message) VALUES ('$cname','$tel','$email','$address','$message')";
    $result = mysqli_query($link, $SQLstring);
    if ($result) {
        echo "<script>alert('謝謝您!送出資料已經收到，我們盡速與您聯絡。');</script>";
    } else {
        echo "<script>alert('資料無法寫入，請與管理員聯絡。');</script>";
    }
}
?>
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

                </div>
                <div class="col-md-12 col-lg-6">
                    <h5>
                        <marquee behavior="" direction="">聯絡我們Alice Poker Night 專業客服，請留下電話，立即為您服務，開啟您美好的賭場夜生活。</marquee>
                    </h5>
                    <div class="container text-center box">
                        <div class="mycard mycard-container">
                            <div class="row">
                                <div class="col-sm-12 pt-3">
                                    <img id="profile-img" class="profile-img-card" src="images/logo03.png" />
                                    <P class="profile-name-card animated bounceInDown">聯絡我們</p>
                                    <p>請輸入相關資料，*為必需輸入欄位</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-10 col-lg-10 offset-1 text-left">
                                    <form action="help.php" method="post" name="form1" id="form1">
                                        <div class="row form-group">
                                            <input type="text" class="form-control" name="cname" id="cname" placeholder="*請輸入Name" required>
                                        </div>
                                        <br>
                                        <div class="row form-group">
                                            <input type="text" class="form-control" name="tel" id="tel" placeholder="*請輸入TEL" required>
                                        </div>
                                        <br>
                                        <div class="row form-group">
                                            <input type="email" class="form-control" name="email" id="email" placeholder="*請輸入E-mail" required>
                                        </div>
                                        <br>
                                        <div class="row form-group">
                                            <input type="text" class="form-control" name="address" id="address" placeholder="*請輸入Address" required>
                                        </div>
                                        <br>
                                        <div class="row form-group">
                                            <textarea rows="18" class="form-control" name="message" id="message" placeholder="*請輸入Message,最少10字，最多1000字" required minlength="10" maxlength="1000"></textarea>
                                            <!-- textarea 可以使用 寬度cols="55"和 高度rows="6" 的屬性設定一行有幾個字元、可以容納幾行 -->

                                            <input type="hidden" name="flag" id="flag" value="form1">
                                            <!-- flag是檢查有沒有按送出的隱藏東西，之後要用在資料庫的 -->

                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-signin mt-4">送出</button>
                                        <!-- class="form-control"是getbootstrap的樣式
                            required沒有輸入會提示
                            maxlength 或 minlength 限制最多或最少可輸入多少字元，若設定 minlength="5"，輸入內容就必須是空的若是輸入 5 個字元以上才有效 -->
                                        <p></p>
                                    </form>
                                </div>
                            </div>
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