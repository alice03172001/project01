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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" href="./website_s01.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./css/morphext.css">

    <title>Alice Poker Night</title>
</head>
<script src="https://kit.fontawesome.com/8c4318e451.js" crossorigin="anonymous"></script>

<body>
    <section id="header">

        <?php
        // 列出產品類別第一層
        $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
        $pyclass01 = mysqli_query($link, $SQLstring);

        ?>

        <!--建立bootstrap導覽列： Navbar項目 -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">

            <a class="navbar-brand" href="./index.php"><img src="./$images/LOGO_2.png" alt="LOGO" class="img-fluid"></a>
            <!-- class="img-fluid rounded-circle"把圖片變圓 -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <!-- 也可以用js再設一個三層的設定次功能表 -->
                    <li class="nav-item dropdown">
                        <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle">產品資訊</a>
                        <ul class="dropdown-menu">
                            <?php while ($pyclass01_Rows = mysqli_fetch_array($pyclass01)) { ?>
                                <li class="dropdown-item dropdown-submenu">
                                    <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fas <?php echo $pyclass01_Rows['fonticon']; ?> fa-lg fa-fw"></i><?php echo $pyclass01_Rows['cname']; ?></a>

                                    <?php
                                    //列出產品類別第二層
                                    $SQLstring = "SELECT * FROM pyclass WHERE level=2 AND uplink=" . $pyclass01_Rows['classid'] . " ORDER BY sort";
                                    $pyclass02 = mysqli_query($link, $SQLstring);
                                    ?>
                                    <ul class="dropdown-menu">
                                        <?php while ($pyclass02_Rows = mysqli_fetch_array($pyclass02)) { ?>

                                            <li class="dropdown-item">
                                                <em class="fas <?php echo $pyclass02_Rows['fonticon']; ?> fa-fw"></em>
                                                <!-- fa-fw 類將使用固定邊距垂直居中對齊圖標。因此每個圖標的大小不會變化，並且它們在中心彼此下方對齊 -->
                                                <a href="#"><?php echo $pyclass02_Rows['cname']; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                            <?php } ?>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">會員註冊</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">會員登入</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">會員中心</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">最新活動</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">查訂單</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">折價卷</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">購物車</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                            企業專區
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <div class="dropdown-menu show" aria-labelledby="navbarDropdown"> -->
                            <!-- class加上show是預設開啟子選單 -->
                            <a class="dropdown-item" href="#">認識企業文化</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#">全台門市資訊</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#">供應商報價服務</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#">加盟專區</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#">投資人專區</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                            客服中心
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <div class="dropdown-menu show" aria-labelledby="navbarDropdown"> -->
                            <!-- class加上show是預設開啟子選單 -->
                            <a class="dropdown-item" href="#">聯絡我們</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#">常見問題</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="#">反詐騙Q&A</a>
                            <!-- <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="./baccarat.html" target="main">使用者規章</a>
                        </div>
                    </li>

                </ul>

            </div>
        </nav>
    </section>
    <section id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    <div class="sidebar">
                        <form name="search" action="" method="get">
                            <div class="input-group">
                                <input type="text" name="search_name" class="form-control" placeholder="Search...">
                                <span class="input-grout-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search fa-lg"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <?php
                    // 列出產品類別第一層
                    $SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
                    $pyclass01 = mysqli_query($link, $SQLstring);
                    $i = 1;  //控制編號順序
                    ?>

                    <!--  carousel / Accordion example的項目 -->
                    <div class="accordion" id="accordionExample">
                        <?php while ($pyclass01_Rows = mysqli_fetch_array($pyclass01)) { ?>
                            <div class="card">
                                <div class="card-header" id="headingOne<?php echo $i; ?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i; ?>" style="font-size: x-large;"><i class="fas <?php echo $pyclass01_Rows['fonticon']; ?> fa-lg fa-fw"></i><?php echo $pyclass01_Rows['cname']; ?>
                                            <!-- 彩妝專區 -->
                                        </button>
                                    </h2>
                                </div>
                                <?php
                                //列出產品類別第二層
                                $SQLstring = "SELECT * FROM pyclass WHERE level=2 AND uplink=" . $pyclass01_Rows['classid'] . " ORDER BY sort";
                                $pyclass02 = mysqli_query($link, $SQLstring);
                                ?>

                                <div id="collapseOne<?php echo $i; ?>" class="collapse <?php echo ($i == 1) ? 'show' : ''; ?>" aria-labelledby="headingOne<?php echo $i; ?>" data-parent="#accordionExample">
                                    <!-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> -->
                                    <!--class加上 show  是預設開啟子選單 -->
                                    <div class="card-body">
                                        <!-- Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class. -->
                                        <!-- 建立子功能表 -->
                                        <table class="table">
                                            <tbody>
                                                <?php while ($pyclass02_Rows = mysqli_fetch_array($pyclass02)) { ?>
                                                    <tr>
                                                        <td><em class="fas <?php echo $pyclass02_Rows['fonticon']; ?>"></em><a href="#">
                                                                <?php echo $pyclass02_Rows['cname']; ?>
                                                                <!-- 隔離/防曬/飾底乳 -->
                                                            </a></td>
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        <?php $i++;
                        } ?>
                    </div>
                    <?php
                    // 建立熱門銷售商品查詢
                    $SQLstring = "SELECT * FROM hot,product,product_img WHERE hot.p_id=product_img.p_id AND hot.p_id=product.p_id AND product_img.sort=1 ORDER BY h_sort";
                    $hot = mysqli_query($link, $SQLstring);
                    ?>

                    <div class="card text-center mt-3" style="border:none;">
                        <div class="card-body">
                            <br>
                            <h5 class="card-title">站長推薦，熱銷商品</h5>
                        </div>
                        <?php while ($data = mysqli_fetch_array($hot)) { ?>
                            <img src="./product_img/<?php echo $data['img_file']; ?>" class="card-img-top" alt="HOT<?php echo $data['h_sort']; ?>" title="<?php echo $data['p_name']; ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?php
                    //建立carousel查詢
                    $SQLstring = "SELECT * FROM carousel WHERE caro_online=1 ORDER BY caro_sort";
                    $carousel = mysqli_query($link, $SQLstring);
                    $i = 0; //控制active起動
                    ?>
                    <div class="row carousel">
                        <!-- With captions的項目 -->
                        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <?php for ($i = 0; $i < $carousel->num_rows; $i++) { ?>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i; ?>" class="<?php echo activeShow($i, 0); ?>"></li>
                                <?php } ?>
                                <!-- 樣版不要了
                                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li> -->
                            </ol>
                            <div class="carousel-inner">
                                <?php
                                $i = 0;
                                while ($data = mysqli_fetch_array($carousel)) { ?>
                                    <div class="carousel-item <?php echo activeShow($i, 0); ?>">
                                        <img src="./$images/<?php echo $data['caro_pic']; ?>" class="d-block w-100" alt="<?php echo $data['caro_title']; ?>">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5><?php echo $data['caro_title']; ?></h5>
                                            <p><?php echo $data['caro_content']; ?></p>
                                        </div>
                                    </div>
                                <?php $i++;
                                } ?>
                                <!--樣版不要了 
                                <div class="carousel-item">
                                    <img src="./$images/sales2.jpg" class="d-block w-100" alt="2">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5></h5>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="./$images/sales3.jpg" class="d-block w-100" alt="3">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5></h5>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="./$images/sales1.jpg" class="d-block w-100" alt="4">
                                    <div class="carousel-caption d-none d-md-block">
                                        <h5></h5>
                                        <p></p>
                                    </div>
                                </div> -->


                            </div>
                            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <h5>
                        <marquee behavior="" direction="">不能錯過澳門攻略，讓您簡易上手澳門賭場各大景點及交通資訊及介紹澳門美食，必知澳門賭場大小事！賭場內您不知道的澳門賭場知識，趕快來澳門攻略吸收資訊。</marquee>
                    </h5>

                    <!-- 查詢product資料 -->
                    <?php
                    //建立product商品rs
                    $maxRows_rs = 12;  //分頁設定數量
                    $pageNum_rs = 0;   //起始頁=0(就是第1頁)
                    if (isset($_GET['pageNum_rs'])) {
                        $pageNum_rs = $_GET['pageNum_rs'];
                    }
                    $startRow_rs = $pageNum_rs * $maxRows_rs;

                    //列出產品product資料查詢
                    $queryFirst = sprintf("SELECT * FROM product,product_img WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id ORDER BY product.p_id DESC");
                    $query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRow_rs, $maxRows_rs);
                    $pList01 = mysqli_query($link, $query);

                    //控制card列出product資料
                    $i = 1; //控制每列row產生
                    ?>
                    <?php while ($pList01_Rows = mysqli_fetch_array($pList01)) { ?>
                        <?php if ($i % 4 == 1) { ?>
                            <div class="row text-center"><?php } ?>
                            <div class="col-md-3">
                                <!-- card  /  example的項目 -->
                                <div class="card">
                                    <img src="./product_img/<?php echo $pList01_Rows['img_file']; ?>" class="card-img-top" alt="<?php echo $pList01_Rows['p_name']; ?>" title="<?php echo $pList01_Rows['p_name']; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $pList01_Rows['p_name']; ?></h5>
                                        <p class="card-text"><?php echo mb_substr($pList01_Rows['p_intro'], 0, 30, "utf-8"); ?></p>
                                        <!-- 使用utf-8編碼限定30個字 -->
                                        <p>NT<?php echo $pList01_Rows['p_price']; ?></p>
                                        <a href="#" class="btn btn-primary">更多資訊</a>
                                        <a href="#" class="btn btn-success">放購物車</a>
                                    </div>
                                </div>
                            </div>
                            <?php if ($i % 4 == 0 || $i == $pList01->num_rows) { ?>
                            </div><?php } ?>
                    <?php $i++;
                    } ?>
                    <hr>
                    <!-- 樣版不要了
                    <div class="row text-center">
                        <div class="col-md-3">
                            
                            <div class="card">
                                <img src="./product_img/pic0201.jpg" class="card-img-top" alt="頂級金貝貝棉柔魔術氈">
                                <div class="card-body">
                                    <h5 class="card-title">頂級金貝貝棉柔魔術氈</h5>
                                    <p class="card-text">金貝貝棉柔魔術氈XXL27+1片【6包/箱】，適用15公斤以上</p>
                                    <p>NT1560</p>
                                    <a href="#" class="btn btn-primary">更多資訊</a>
                                    <a href="#" class="btn btn-success">放購物車</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="./product_img/pic0202.jpg" class="card-img-top" alt="櫻桃肌粉餅撲角型-3入">
                                <div class="card-body">
                                    <h5 class="card-title">櫻桃肌粉餅撲角型-3入</h5>
                                    <p class="card-text">【IH】櫻桃肌粉餅撲角型-3入 CB-3204，乾濕兩用的粉餅專用粉撲。</p>
                                    <p>NT120</p>
                                    <a href="#" class="btn btn-primary">更多資訊</a>
                                    <a href="#" class="btn btn-success">放購物車</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="./product_img/pic0203.jpg" class="card-img-top" alt="NOYL化妝刷套裝組">
                                <div class="card-body">
                                    <h5 class="card-title">NOYL化妝刷套裝組</h5>
                                    <p class="card-text">NOYL化妝刷套裝組(附收納袋) NY-369，保存期限：7年</p>
                                    <p>NT690</p>
                                    <a href="#" class="btn btn-primary">更多資訊</a>
                                    <a href="#" class="btn btn-success">放購物車</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <img src="./product_img/pic0204.jpg" class="card-img-top" alt="3D蘋果光氣墊粉餅">
                                <div class="card-body">
                                    <h5 class="card-title">3D蘋果光氣墊粉餅</h5>
                                    <p class="card-text">【Keep in touch】3D蘋果光氣墊粉餅，15g+15g(買一送一補充蕊)。</p>
                                    <p>NT1269</p>
                                    <a href="#" class="btn btn-primary">更多資訊</a>
                                    <a href="#" class="btn btn-success">放購物車</a>
                                </div>
                            </div>
                        </div>
                    </div> -->


                    <!-- Pagination  / Working with icons的項目 -->
                    <div class="row mt-2">
                        <div class="col-md-12">
                            <!-- 建立分頁php程式 -->
                            <?php
                            //取得目前頁數
                            if (isset($_GET['totalRows_rs'])) {
                                $totalRows_rs = $_GET['totalRows_rs'];
                            } else {
                                $all_rs = mysqli_query($link, $queryFirst);
                                $totalRows_rs = mysqli_num_rows($all_rs);
                            }
                            $totalPages_rs = ceil($totalRows_rs / $maxRows_rs) - 1;
                            ?>
                            <?php
                            // 呼叫分頁功能
                            $prev_rs = "&laquo;";
                            $next_rs = "&raquo;";
                            $separator = "|";
                            $max_links = 20;
                            $pages_rs = buildNavigation($pageNum_rs, $totalPages_rs, $prev_rs, $next_rs, $separator, $max_links, true, 3, "rs");
                            ?>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <!-- justify-content-center是對齊方式 -->
                                    <!-- 樣板li不要了
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li> -->
                                    <!-- active是預設在開啟的位置 -->
                                    <!-- <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li> -->
                                    <?php echo $pages_rs[0] . $pages_rs[1] . $pages_rs[2]; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <iframe name="main" src="./main.php" frameborder="0" width="99%" height="98%"></iframe>
                </div>
            </div>
        </div>
    </section>
    <section id="scontent">
        <div class="container-fluid">
            <div id="aboutme" class="row text-center">
                <div class="col-md-2">
                    <h3>Qrcode</h3><img src="./$images/Qrcode02.png" alt="Qrcode">
                </div>
                <div class="col-md-2"><i class="fas fa-thumbs-up fa-5x pb-3"></i>
                    <h3>關於我們</h3>
                    關於我們<br>
                    企業官網<br>
                    招商專區<br>
                    人才招募<br>
                </div>
                <div class="col-md-2"><i class="fas fa-truck fa-5x pb-3"></i>
                    <h3>特色服務</h3>
                    大宗採購方案<br>
                    直配大陸<br>
                </div>
                <div class="col-md-2"><i class="fas fa-users fa-5x pb-3"></i>
                    <h3>客戶服務</h3>
                    訂單/配送進度查詢<br>
                    取消訂單/退貨<br>
                    更改配送地址<br>
                    追蹤清單<br>
                    12H速達服務<br>
                    折價券說明<br>
                </div>
                <div class="col-md-2"><i class="fas fa-comments-dollar fa-5x pb-3"></i>
                    <h3>好康大放送</h3>
                    新會員禮包<br>
                    活動得獎名單<br>
                </div>
                <div class="col-md-2"><i class="fas fa-question fa-5x pb-3"></i>
                    <h3>FAQ 常見問題</h3>
                    系統使用問題<br>
                    產品問題資詢<br>
                    大宗採購問題<br>
                    聯絡我們<br>
                </div>
            </div>
        </div>
    </section>
    <section id="footer">
        <div class="container-fluid">
            <div id="last-data" class="row text-center">
                <div class="col-md-12">
                    <h6>中彰投分署科技股份有限公司 40767台中市西屯區工業區一路100號 電話：04-23592181 免付費電話：0800-777888</h6>
                    <h6>版權所有 copyright © 2017 WDA.com Inc. All Rights Reserved.</h6>
                </div>
            </div>
        </div>
    </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <!-- 不用這個簡易的，改用下面的 -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->

    <!-- https://jquery.com/download/     Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->

    <!-- 設定三層次功能表javascript -->
    <script type="text/javascript">
        $(function() {
            $('.dropdown-submenu > a').on("click", function(e) {
                var submenu = $(this);
                $('.dropdown-submenu .dropdown-menu').removeClass('show');
                submenu.next('.dropdown-menu').addClass('show');
                e.stopPropagation();
            });
            $('.dropdown').on("hidden.bs.dropdown", function() {
                //hide any open menus when parent closes
                $('.dropdown-menu.show').removeClass('show');
            });
        });
    </script>

    <!-- 新增gotop回頂端程式,使用gotop.js -->
    <script type="text/javascript" src="./gotop.js"></script>
</body>

</html>
