<?php
// 列出產品類別第一層
$SQLstring = "SELECT * FROM pyclass WHERE level=1 ORDER BY sort";
$pyclass01 = mysqli_query($link, $SQLstring);

?>

<!--建立bootstrap導覽列： Navbar項目 -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">

    <a class="navbar-brand" href="./index.php"><img src="./product_img/LOGO_2.png" alt="LOGO" class="img-fluid" title="回首頁"></a>
    <!-- class="img-fluid rounded-circle"把圖片變圓 -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php
    //讀取後台購物車內產品數量
    $SQLstring = "SELECT * FROM cart WHERE orderid is NULL AND ip='" . $_SERVER['REMOTE_ADDR'] . "'";
    $cart_rs = mysqli_query($link, $SQLstring);
    ?>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- 也可以用js再設一個三層的設定次功能表 -->
            <li class="nav-item dropdown">
                <a href="#" id="menu" data-toggle="dropdown" class="nav-link dropdown-toggle">產品資訊</a>
                <ul class="dropdown-menu">
                    <?php while ($pyclass01_Rows = mysqli_fetch_array($pyclass01)) { ?>
                        <li class="dropdown-item dropdown-submenu">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fas <?php echo $pyclass01_Rows['fonticon']; ?> fa-lg fa-fw"></i> <?php echo $pyclass01_Rows['cname']; ?></a>

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
                                        <a href="./drugstore.php?classid=<?php echo $pyclass02_Rows['classid']; ?>">
                                            <!-- sidebar加入超連結進行查詢 --><?php echo $pyclass02_Rows['cname']; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } ?>

                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="register.php">會員註冊</a>
            </li>
            <?php if (isset($_SESSION['login'])) { ?>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" onclick="btn_confirmLink('是否確定登出？','logout.php')">會員登出</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">會員登入</a>
                </li>
            <?php } ?>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">會員中心</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="drugstore.php?classid=4&level=1">最新活動</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="drugstore.php?classid=5&level=1">網站推薦</a>
            </li>          

            <li class="nav-item">
                <a class="nav-link" href="cart.php">購物車
                    <span class="badge badge-primary"><?php echo ($cart_rs) ? $cart_rs->num_rows : ''; ?></span>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                    會員中心
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- <div class="dropdown-menu show" aria-labelledby="navbarDropdown"> -->
                    <!-- class加上show是預設開啟子選單 -->
                    <a class="dropdown-item" href="orderlist.php"><i class="fas fa-money-check-alt"></i> 查詢訂單</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="message.php"><i class="fas fa-envelope"></i> 站內通知信</a>                    
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="true">
                    客服中心
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <!-- <div class="dropdown-menu show" aria-labelledby="navbarDropdown"> -->
                    <!-- class加上show是預設開啟子選單 -->
                    <a class="dropdown-item" href="help.php"><i class="fas fa-user-circle"></i> 聯絡我們</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="qa.php"><i class="fas fa-mask"></i> 關於我們</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="qa2.php"><i class="fas fa-question-circle"></i> 常見Q&A</a>
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="qa3.php"><i class="fab fa-fort-awesome"></i> 博弈名詞解釋</a>
                </div>
            </li>

        </ul>

    </div>
</nav>