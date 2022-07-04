<?php
//建立訂單查詢
$maxRows_rs = 5;  //分頁設定數量
$pageNum_rs = 0;  //起啟頁=0
if (isset($_GET['pageNum_order_rs'])) {
    $pageNum_rs = $_GET['pageNum_order_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;
$queryFirst = sprintf("SELECT *,uorder.create_date as udate FROM uorder,addbook WHERE uorder.emailid='%d' AND uorder.addressid=addbook.addressid ORDER BY uorder.create_date DESC", $_SESSION['emailid']);
$query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRow_rs, $maxRows_rs);
$order_rs = mysqli_query($link, $query);
$i = 1; //控制第一筆訂單開啟
?>

<h4 class="product animated bounceInDown">愛麗絲扑克之夜：訂單查詢</h4>
<!-- 建立while結束處理 -->
<?php if ($order_rs->num_rows != 0) { ?>
    <div class="accordion" id="accordion_order">
        <?php while ($data01 = mysqli_fetch_array($order_rs)) { ?>
            <div class="card">
                <div class="card-header" id="heading1<?php echo $i; ?>">
                    <a data-toggle="collapse" href="#collapse1<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse1<?php echo $i; ?>">
                        <div class="table-responsive-md">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td width="10%">訂單編號</td>
                                        <td width="10%">下單時間</td>
                                        <td width="10%">付款方式</td>
                                        <td width="10%">訂單狀態</td>
                                        <td width="10%">收件人</td>
                                        <td width="10%">地址 </td>
                                        <td width="10%">備註 </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?php echo $data01['orderid']; ?></td>
                                        <td><?php echo $data01['udate']; ?></td>
                                        <td><?php echo epayCode($data01['howpay']); ?></td>
                                        <td><?php echo processCode($data01['status']); ?></td>
                                        <td><?php echo $data01['cname']; ?></td>
                                        <td><?php echo $data01['address']; ?></td>
                                        <td><?php echo $data01['remark']; ?></td>
                                    </tr>
                                    <tr><td colspan="7"><button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-alt-circle-down"></i> 查 看 訂 單 詳 細 清 單 <i class="fas fa-arrow-alt-circle-down"></i></button></td></tr>
                                </tbody>
                            </table>
                        </div>
                    </a>
                </div>
                <?php
                //處理訂單詳細商品資料列表
                $subQuery = sprintf("SELECT * FROM cart,product,product_img WHERE cart.orderid='%s' AND cart.p_id=product.p_id AND product.p_id=product_img.p_id AND product_img.sort='1' ORDER BY cart.create_date DESC", $data01['orderid']);
                $details_rs = mysqli_query($link, $subQuery);
                $ptotal = 0;
                ?>

                <div id="collapse1<?php echo $i; ?>" class="collapse <?php echo ($i == 1) ? 'show' : ''; ?> " aria-labelledby="heading1<?php echo $i; ?>" data-parent="#accordion_order">
                    
                        <div class="table-responsive-md" style="width: 100%;">
                            <table>
                                <thead>
                                    <tr style="color: white;">
                                        <td width="10%">產品編號</td>
                                        <td width="10%">圖片</td>
                                        <td width="25%">名稱</td>
                                        <td width="15%">價格</td>
                                        <td width="10%">數量</td>
                                        <td width="15%">小計</td>
                                        <td width="15%">狀態</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($data02 = mysqli_fetch_array($details_rs)) { ?>
                                        <tr>
                                            <td><?php echo $data02['p_id']; ?></td>
                                            <td><img src="product_img/<?php echo $data02['img_file']; ?>" alt="<?php echo $data02['p_name']; ?>" class="img-fluid"></td>
                                            <td><?php echo $data02['p_name']; ?></td>
                                            <td>
                                                <h4 class="color_e600a0 pt-1">$<?php echo $data02['p_price']; ?></h4>
                                            </td>
                                            <td>
                                                <?php echo $data02['qty']; ?>
                                            </td>
                                            <td>
                                                <h4 class="color_e600a0 pt-1">$<?php echo $data02['p_price'] * $data02['qty']; ?></h4>
                                            </td>
                                            <td><?php echo processCode($data02['status']); ?></td>
                                        </tr>
                                    <?php $ptotal += $data02['p_price'] * $data02['qty'];
                                    } ?>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">累計：<?php echo $ptotal; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">運費：100</td>
                                    </tr>
                                    <tr>
                                        <td colspan="7" class="color_red">總計：<?php echo $ptotal + 100; ?></td>
                                    </tr>

                                </tfoot>
                            </table>
                        </div>
                    
                </div>
            </div>
            
        <?php $i++;
        }  //while結束 
        ?>
    </div>
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
            $pages_rs = buildNavigation($pageNum_rs, $totalPages_rs, $prev_rs, $next_rs, $separator, $max_links, true, 3, "order_rs");
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
<?php } else { ?>
    <div class="alert alert-danger" role="alert">
        抱歉!目前還沒有任何的訂單。
    </div>
<?php } ?>