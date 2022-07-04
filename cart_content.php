<?php
//建立購物車資料庫查詢
$SQLstring = "SELECT * FROM cart,product,product_img WHERE ip='" . $_SERVER['REMOTE_ADDR'] . "' AND orderid is NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
$cart_rs = mysqli_query($link, $SQLstring);
$pTotal = 0;  //設定累加變數$pTotal
?>
<h4 class="product animated bounceInDown">愛麗絲扑克之夜：購物車</h4>
<?php if ($cart_rs->num_rows != 0) { ?>
    <!-- 建立form表單   -->
    <form action="checkout.php" method="post" id="cartForm1" name="cartForm1">
        <a href="index.php" id="btn01" name="btn01" class="btn btn-primary">繼續購物</a>
        <button type="button" class="btn btn-info" onclick="window.history.go(-1)">回上一頁</button>
        <button type="button" class="btn btn-secondary" onclick="btn_confirmLink('確定清空購物車？','shopcart_del.php?mode=2');">清空購物車</button>
        <button type="submit" id="btn04" name="btn04" class="btn btn-danger">前往結帳</button>
        <!-- Responsive tables -->
        <div class="table-responsive-md col-12">
            <table class="table mt-3">
                <thead>
                    <tr>
                        <td width="20%">產品編號</td>
                        <td width="35%">產品名稱</td>
                        <!-- <td width="25%">名稱</td> -->
                        <td width="20%">價格<br>數量</td>
                        <!-- <td width="15%">數量</td> -->
                        <td width="25%">小計</td>
                        <!-- <td width="15%">產品編號</td> -->
                    </tr>
                </thead>
                <tbody>
                    <?php while ($cart_data = mysqli_fetch_array($cart_rs)) { ?>
                        <tr>
                        <td><?php echo $cart_data['p_id']; ?><br> <button type="button" id="btn[]" name="btn[]" class="btn btn-secondary" onclick="btn_confirmLink('確定刪除本資料？','shopcart_del.php?mode=1&cartid=<?php echo $cart_data['cartid']; ?>');">刪除</button> </td>
                            <!-- <td><?php //echo $cart_data['p_id']; 
                                        ?></td> -->
                            <td> <?php echo $cart_data['p_name']; ?><br><img src="./product_img/<?php echo $cart_data['img_file']; ?>" alt="<?php echo $cart_data['p_name']; ?>" title="<?php echo $cart_data['p_name']; ?>" class="img-fluid"></td>
                            <!-- <td><?php //echo $cart_data['p_name']; 
                                        ?></td> -->
                            <td>
                                <h4 class="color_e600a0 pt-1">$<?php echo $cart_data['p_price']; ?></h4><br>
                                <div class="input-group">
                                    <input type="number" style="text-align: center;" class="form-control" id="qty[]" name="qty[]" min="1" max="49" value="<?php echo $cart_data['qty']; ?>" cartid="<?php echo $cart_data['cartid']; ?>" required>
                                </div>
                            </td>

                            <td>
                                <h4 class="color_e600a0 pt-1">$<?php echo $cart_data['p_price'] * $cart_data['qty']; ?></h4>
                            </td>
                            
                        </tr>
                    <?php $pTotal += $cart_data['p_price'] * $cart_data['qty'];
                    } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="4">累計：<?php echo $pTotal; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4">運費：100</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="color_red">總計：<?php echo $pTotal + 100; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4"><a href="index.php" id="btn01" name="btn01" class="btn btn-primary">繼續購物</a>

                            <button type="submit" id="btn04" name="btn04" class="btn btn-danger">前往結帳</button>
                        </td>
                    </tr>


                </tfoot>
            </table>
        </div>
    </form>
<?php } else { ?>
    <a href="index.php" id="btn01" name="btn01" class="btn btn-primary">繼續購物</a>
    <p></p>
    <div class="alert alert-danger" role="alert"> 抱歉，目前購物車沒有相關產品!</div>
<?php } ?>