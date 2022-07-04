<div class="sidebar">
    <form name="search" id="search" action="drugstore.php" method="get">
        <div class="input-group">
            <input type="text" name="search_name" id="search_name" class="form-control" placeholder="Search..." value="<?php echo (isset($_GET['search_name']))?$_GET['search_name']:''; ?>" required>
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
<div class="accordion hide-in-phone" id="accordionExample">
    <!-- 第一層加入控制編號順序 -->
    <?php while ($pyclass01_Rows = mysqli_fetch_array($pyclass01)) { $i=$pyclass01_Rows['classid']; ?>
        <div class="card">
            <div class="card-header" id="headingOne<?php echo $i; ?>">
                <h2 class="mb-0">
                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne<?php echo $i; ?>" aria-expanded="true" aria-controls="collapseOne<?php echo $i; ?>" style="font-size: x-large;"><i class="fas <?php echo $pyclass01_Rows['fonticon']; ?> fa-lg fa-fw"></i><?php echo $pyclass01_Rows['cname']; ?>
                        <!-- 彩妝專區 -->
                    </button>
                </h2>
            </div>
            <?php
            if(isset($_GET['p_id'])){  //如果使用產品查詢，需取得類別編號上一層類別  
                $SQLstring = "SELECT uplink FROM pyclass,product WHERE pyclass.classid=product.classid AND p_id=" . $_GET['p_id'];
                $classid_rs = mysqli_query($link, $SQLstring);
                $data = mysqli_fetch_array($classid_rs);
                $ladder = $data['uplink'];
            }elseif (isset($_GET['level']) && $_GET['level'] ==1){ //使用第一層類別查詢(面包屑)
            //如果使用類別查詢需取得上一層類別，不能跑別層, 解決sidebar開啟不準確問題
            }elseif (isset($_GET['classid'])) {
                $SQLstring = "SELECT uplink FROM pyclass WHERE level=2 AND classid=" . $_GET['classid'];
                $classid_rs = mysqli_query($link, $SQLstring);
                $data = mysqli_fetch_array($classid_rs);
                $ladder = $data['uplink'];
            }else {
                $ladder = 1;
            }
            //列出產品類別第二層
            $SQLstring = "SELECT * FROM pyclass WHERE level=2 AND uplink=" . $pyclass01_Rows['classid'] . " ORDER BY sort";
            $pyclass02 = mysqli_query($link, $SQLstring);
            ?>

            <div id="collapseOne<?php echo $i; ?>" class="collapse <?php echo ($i == $ladder) ? 'show' : ''; ?>" aria-labelledby="headingOne<?php echo $i; ?>" data-parent="#accordionExample">
                <!-- <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample"> -->
                <!--class加上 show  是預設開啟子選單 -->
                <div class="card-body">
                    <!-- Some placeholder content for the first accordion panel. This panel is shown by default, thanks to the <code>.show</code> class. -->
                    <!-- 建立子功能表 -->
                    <table class="table">
                        <tbody>
                            <?php while ($pyclass02_Rows = mysqli_fetch_array($pyclass02)) { ?>
                                <tr>
                                    <td><em class="fas <?php echo $pyclass02_Rows['fonticon']; ?>"></em><a href="./drugstore.php?classid=<?php echo $pyclass02_Rows['classid']; ?>">  
                                    <!-- sidebar加入超連結進行查詢 -->
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