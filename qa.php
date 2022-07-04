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
                 
                    <h2 class="product animated bounceInDown">關於我們</h2>
                    <hr>
                    <h5 class="product">特色服務一、博奕攻略資訊提供</h5>
                    <p class="product">
                    博奕攻略，讓您簡易上手必知遊戲大小事！您不知道的賭場知識，趕快來Alice Poker Night 吸收資訊</p>
                    <hr>
                    <h5 class="product">特色服務二、幣商換幣價格</h5><p class="product">許多線上博弈平台為了希望更加確保玩家的交易安全，同時也受限於台灣針對博弈娛樂的法規限制，會將玩家的儲值過程改為使用幣別兌換的方式，包含星城、老子有錢、神來也等許多知名博弈平台都是透過尋找幣商的方式，將點數兌換成現金，其中，每一家博弈平台兌換的標準都不一樣，以下就整理出目前較具知名度平台的換幣標準。</p>
                    <table border="2" class="product" width="100%">
                        <tbody>
                            <tr>
                                <td style="background-color:#c7000a" width="50%">
                                    <center><strong>博弈平台</strong></center>
                                </td>

                                <td style="background-color:#c7000a" width="50%">
                                    <center><strong>換幣標準</strong></center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    星城Online
                                </td>
                                <td>
                                    1元 = 125星幣
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    老子有錢
                                </td>
                                <td>
                                    1元 = 0.01萬分
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    神來也娛樂
                                </td>
                                <td>
                                    1元 = 0.006萬神幣
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    包你發娛樂城
                                </td>
                                <td>
                                    1元 = 126遊戲幣
                                </td>
                            </tr>
                            <tr>
                                <td>錢街Online
                                </td>
                                <td>130元 = 1遊戲幣</td>
                            </tr>
                            <tr>
                                <td>
                                    豪神娛樂城
                                </td>
                                <td>
                                    1元 = 1,400遊戲幣
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    金好運娛樂城
                                </td>
                                <td>
                                    1元 = 134遊戲幣
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h5 class="product">特色服務三、線上博弈平台評測項目</h5>
                    
                    <table border="2" class="product"  width="100%">
                        <tbody>
                            <tr>
                                <td style="background-color:#c7000a" width="10%">
                                    <center><strong>評分項目</strong></center>
                                </td>
                                <td style="background-color:#c7000a"width="70%">
                                    <center><strong>內容實測</strong></center>
                                </td>
                                <td style="background-color:#c7000a" width="20%">
                                    <center><strong>評分</strong></center>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center><strong>遊戲數量</strong></center>
                                </td>
                                <td>
                                    <h5>博弈平台的遊戲概況</h5>
                        <p>包含博弈平台遊戲的程式設計、遊戲的選擇是否具備多樣化、遊戲的更新能力與頻率，以及博弈平台整體畫面呈現的精緻度等，都是影響著玩家在博弈平台的遊戲體驗。</p>遊戲種類是否多元？除了老虎機、打魚機、彈珠台、骰寶、百家樂、色碟、21點、5pk、7pk等遊戲，平台內還有各式各樣的線上博奕遊戲可供選擇。
                                </td>
                                <td>
                                    最高 5星  <font color="#FF0000">* * * * *</font><br>
                                最低 1星  <font color="#FF0000">*</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center><strong>儲值金流</strong></center>
                                </td>
                                <td>
                                    <h5>博弈平台的金流方式</h5>
                        <p>博弈平台畢竟屬於一個動用到有價媒介的娛樂平台，所以平台的金流方式也是評估博弈網站優劣的重要項目之一，包含媒介的類型是現金還是虛擬貨幣、匯款提款存款的速度等一切金融相關事務都屬於博弈平台的金流範疇。</p>
                                </td>
                                <td>
                                最高 5星  <font color="#FF0000">* * * * *</font><br>
                                最低 1星  <font color="#FF0000">*</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center><strong>遊戲體驗</strong></center>
                                </td>
                                <td>
                                    <h5>博弈平台的玩家體驗</h5>
                        <p>為了讓玩家保有更加友善的遊戲環境，現今許多博弈平台在客戶服務上也更加的重視，但若還能提供人性化的服務，將更能吸引玩家的加入，所以是否擁有完整實用的資訊分享、貼心的客戶服務、是否提供玩家一個交流或意見回饋的平台，或是支援的語言種類等，都可以是評估的條件。</p>
                                </td>
                                <td>
                                最高 5星  <font color="#FF0000">* * * * *</font><br>
                                最低 1星  <font color="#FF0000">*</font>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <center><strong>整體評價</strong></center>
                                </td>
                                <td>
                                   <h5>博弈平台的資安管理</h5>
                        <p>加入博弈平台會需要玩家提供較為隱私的個人資料，平台本身資安管理的好壞就顯得相當重要，包含是否提供安全的支付方式或金流通道管理、玩家個資保護機制、身份驗證程序等，都是評估博弈平台安全保密程度的條件。</p>
                        
                        <h5>博弈平台的優惠政策</h5>
                        <p>博弈平台提供到位的玩家服務，接下來就要看平台的優惠政策了，特殊節日的企劃活動、玩家的儲值優惠、獎金回饋等，都能讓玩家在進行遊戲時，更有努力的目標與動力，一個博弈平台的優惠政策也是影響該平台討論聲量的要點之一。</p>
                                </td>
                                <td>
                                最高 5星  <font color="#FF0000">* * * * *</font><br>
                                最低 1星  <font color="#FF0000">*</font>
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