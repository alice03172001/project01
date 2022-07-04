<?php
//建立訂單查詢
$maxRows_rs = 5;  //分頁設定數量
$pageNum_rs = 0;  //起啟頁=0
if (isset($_GET['pageNum_order_rs'])) {
    $pageNum_rs = $_GET['pageNum_order_rs'];
}
$startRow_rs = $pageNum_rs * $maxRows_rs;
$queryFirst = sprintf("SELECT *,message.msgdate as udate FROM message,member WHERE message.emailid='%d' AND message.emailid=member.emailid ORDER BY message.msgdate DESC", $_SESSION['emailid']);
$query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRow_rs, $maxRows_rs);
$message_rs = mysqli_query($link, $query);
$i = 1; //控制第一筆訂單開啟
?>

<h4 class="product animated bounceInDown">愛麗絲扑克之夜：站內通知信</h4>

<!-- 建立while結束處理 -->
<?php if ($message_rs->num_rows != 0) { ?>
    <div class="accordion" id="accordion_message">
        <?php while ($data01 = mysqli_fetch_array($message_rs)) { ?>
            <div class="card">
                <div class="card-header" id="heading1<?php echo $i; ?>">
                    <a data-toggle="collapse" href="#collapse1<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse1<?php echo $i; ?>">
                        <div class="table-responsive-md">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td width="15%">操作</td>
                                        <td width="20%">通知時間</td>
                                        <td width="15%">會員姓名</td>
                                        <td width="35%" style="text-align: left;">通知信標題</td>
                                        <td width="15%">通知客服</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><button type="button" id="btn[]" name="btn[]" class="btn btn-secondary" onclick="btn_confirmLink('確定刪除本資料？','shopcart_del2.php?mode=1&messageid=<?php echo $data01['messageid']; ?>');">刪除</button></td>
                                        <td><?php echo $data01['udate']; ?></td>
                                        <td><?php echo $data01['cname']; ?></td>
                                        <td style="text-align: left;"><?php echo $data01['msgtitle']; ?></td>
                                        <td><?php echo $data01['msgcs']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"><button type="button" class="btn btn-outline-danger"><i class="fas fa-arrow-alt-circle-down"></i> 查 看 通 知 信 詳 細 內 容 <i class="fas fa-arrow-alt-circle-down"></i></button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </a>
                </div>
                <div id="collapse1<?php echo $i; ?>" class="collapse <?php echo ($i == 1) ? 'show' : ''; ?> " aria-labelledby="heading1<?php echo $i; ?>" data-parent="#accordion_message">
                    <div class="table-responsive-md">
                        <table>
                            <thead>
                                <tr>
                                    <td style="text-align: left;padding-left: 7%;padding-right: 7%;"><?php echo $data01['msgcontent']; ?></td>
                                </tr>
                            </thead>
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
        抱歉!目前還沒有任何的站內通知信。
    </div>    
<?php } ?>