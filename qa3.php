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
                    <!-- 使用引入檔熱銷商品hot -->
                    <?php require_once("./hot.php"); ?>
                </div>
                <div class="col-md-12 col-lg-6">


                    <hr>
                    <h5>
                        <marquee behavior="" direction="">不能錯過博奕攻略，讓您簡易上手必知遊戲大小事！您不知道的賭場知識，趕快來Alice Poker Night 吸收資訊，開啟您美好的賭場夜生活。</marquee>
                    </h5>
                    <h2 class="product animated bounceInDown">博弈名詞解釋</h2>
                    <hr>
                    <table border="2" class="product" width="100%">
                        <tbody>
                            <tr>
                                <td style="background-color:#c7000a" width="15%">
                                    <center><strong>Question</strong></center>
                                </td>

                                <td style="background-color:#c7000a" width="85%">
                                    <center><strong>Answer</strong></center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    洗碼量
                                </td>
                                <td>
                                    簡單來說，洗碼量的意思就是「玩家的總下注金額」，也稱為「有效下注量」，由於不同博弈平台針對玩家的出金會有不同洗碼量的限制，玩家想申請出金需要滿足下注金額的標準，該平台才會允許出金，因此，玩家在博弈平台上所累積的每一筆金額或點數就顯得非常重要，且玩家不管是贏錢還是輸錢，都算在洗碼量的累積之中。<br>
                                    <img src="./images/watch.jpg" alt="" width="99%">
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    返水
                                </td>
                                <td>
                                    返水也叫退水，是玩家進入博弈平台的遊戲時，遊戲會從玩家身上抽取一定比例的手續費，通常平台約抽取5%的手續，這部分的手續費叫做抽水，而通常博弈平台會把抽水的一部分返還給玩家，返還的這部分抽水就是返水。目前各家博弈平台推出的返水優惠都不大相同，除了剛提到的遊戲返水之外，有些平台也會針對註冊儲值立即返水或是推薦好友享返水等優惠內容。<br>
                                    <img src="./images/return.jpg" alt="" width="99%">
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    串關
                                </td>
                                <td>
                                    通常串關多見於體育博彩的項目，代表玩家可以選擇至少兩種以上的下注組合，包含大小分、讓分盤或單、雙數比分等，獲勝的賠率也會以倍數來計算，而玩家一旦選擇玩串關的方式，有些需要串的每一關皆要過關才能兌獎，有些則是只要過關一部分一樣可以兌獎，端視博弈平台的規定或玩家所選擇的玩法內容。
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    風控
                                </td>
                                <td>
                                    風控也就是風險控管的意思，通常會發生在玩家實際向博弈平台申請出金的時候，由於有些不肖的玩家會透過手段騙取平台的出金，所以各家博弈平台本身針對玩家申請出金的時候都會進行風險控管的程序，例如平台假如發現玩家有重複IP、非法套利或是未達洗碼標準等，就會否決玩家的出金申請，而這樣的程序也就是博弈平台常見的風控，主要為了保障平台和其他玩家的權益與安全。
                                </td>
                            </tr>
                            <tr>
                                <td>派彩</td>
                                <td>派彩的意思就是派發玩家在遊戲過程中所贏得的獎金或點數，玩家在進入博弈平台遊戲的目的，除了娛樂性質也是為了能夠贏取獲勝的獎金或點數，而當玩家實際在遊戲的過程裡獲勝，贏取獎金時，平台就需要透過「派彩」的動作，來將玩家贏取的獎金派發給玩家。

                                </td>
                            </tr>
                        </tbody>
                    </table>

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