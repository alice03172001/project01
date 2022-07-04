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

                </div>
                <div class="col-md-12 col-lg-6">


                    <hr>
                    <h5>
                        <marquee behavior="" direction="">不能錯過博奕攻略，讓您簡易上手必知遊戲大小事！您不知道的賭場知識，趕快來Alice Poker Night 吸收資訊，開啟您美好的賭場夜生活。</marquee>
                    </h5>
                    <h2 class="product animated bounceInDown">線上博弈常見Q&A</h2>
                    <hr>
                    <table border="2" class="product" width="100%">
                        <tbody>
                            <tr>
                                <td style="background-color:#c7000a" width="30%">
                                    <center><strong>Question</strong></center>
                                </td>

                                <td style="background-color:#c7000a" width="70%">
                                    <center><strong>Answer</strong></center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    線上博弈合法年齡是多少？
                                </td>
                                <td>
                                    一般來說，正規的線上博弈網站都會針對玩家有年齡上的限制，至少都需要玩家滿足18歲的年齡限制，也有少數的博弈網站則更嚴格的要求玩家年齡至少在21歲以上。
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    如何加入線上博弈網站？
                                </td>
                                <td>
                                    在開始進入博弈遊戲之前，每一家線上博弈平台的要求與註冊流程都不太一樣，但不管是想加入哪一個線上博弈網站，玩家都需要事先提供基本資料、銀行賬戶等基本資料進行申請。
                                    <br>一般而言，玩家只要依照博弈平台的步驟引導，包含填寫個人資料、身份驗證等，在經過系統核對完成之後，博弈平台就會提供一組賬號、密碼，未來就可憑這組賬號密碼進入平台遊戲了。
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    如何挑選適合的博弈網站？
                                </td>
                                <td>
                                    每一家博弈網站的優勢與提供給玩家的回饋都不太相同，也並沒有所謂最好的博弈網站，建議玩家在挑選前，事先了解自己喜歡的遊戲類型，在玄找相對應的博弈平台，同時參考博弈平台的遊戲條款、禮贈金、入金方式或回饋等條件來評估，才能挑選到最合適的博弈網站。
                                </td>

                            </tr>
                            <tr>
                                <td>
                                    博弈網站如何儲值或出金？
                                </td>
                                <td>
                                    正規的博弈平台才有辦法讓玩家正常的申請儲值與出金，而每個博弈平台的儲值與入金流程也都略有不同，但大致上都會需要玩家事先進行身分認證與帳戶的綁定，帳戶也不單指銀行帳戶，有些博弈平台的出入金方式會使用虛擬貨幣作為媒介，所以所綁定的帳戶也有可能是虛擬貨幣賬戶。 <br>
                                    若博弈平台使用的是虛擬貨幣，則玩家要儲值就需先購買平台規定的貨幣，轉入平台後再兌換成遊戲點數，出金的話則相同道理，會先在平台將遊戲點數轉換成虛擬貨幣後，再轉出自指定的帳戶，惟一般博弈平台對於出金都有一定的限額，玩家在申請前還需要先了解平台的限制條件。
                                </td>
                            </tr>
                            <tr>
                                <td>博弈平台只能用現金遊戲嗎？</td><td>由於臺灣的博弈產業尚未合法化，在博弈平台現金儲值並且實際的遊戲還是存在著爭議性，加上全球進入網路資訊發展的時代，許多博弈平台已經不再使用現金作為進入遊戲的籌碼，而是透過虛擬貨幣的運行，包含泰達幣、比特幣等，都是博弈平台常見的籌碼幣種，玩家只需將虛擬貨幣轉入平台，就能1：1轉換成遊戲點數。</td>
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