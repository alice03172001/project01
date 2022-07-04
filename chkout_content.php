<?php
//取得收件者地址資料
$SQLstring = sprintf("SELECT *,city.Name AS ctName,town.Name AS toName FROM addbook,city,town WHERE emailid='%d' AND setdefault='1' AND addbook.myzip=town.Post AND town.AutoNo=city.AutoNo", $_SESSION['emailid']);
$addbook_rs = mysqli_query($link, $SQLstring);
if ($addbook_rs && $addbook_rs->num_rows != 0) {
    $data = mysqli_fetch_array($addbook_rs);
    $cname = $data['cname'];
    $mobile = $data['mobile'];
    $myzip = $data['myzip'];
    $address = $data['address'];
    $ctName = $data['ctName'];
    $toName = $data['toName'];
}
?>
<h4 class="product animated bounceInDown">愛麗絲扑克之夜：會員結帳作業<h4>
        <div class="row">
            <div class="card ml-2 col-11 col-md-5">
                <h4 class="card-header" style="color: #007bff;"> <i class="fas fa-truck fa flip-horizontal mr-1"></i>配送資訊</h4>
                <div class="card-body pl-3 pt-2 pb-2">
                    <h4 class="card-title">收件人資訊：</h4>
                    <h5 class="card-title">姓名：<?php echo $cname; ?></h5>
                    <p class="card-text">電話：<?php echo $mobile; ?></p>
                    <p class="card-text">郵遞區號：<?php echo $myzip . $ctName . $toName; ?></p>
                    <p class="card-text">地址：<?php echo $address; ?></p>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#staticBackdrop">選擇其他收件人</button>

                </div>
            </div>
            <div class="card ml-2 col-11 col-md-6">
                <h4 class="card-header" style="color: #007bff;"> <i class="fas fa-credit-card mr-1"></i>付款方式</h4>
                <div class="card-body pl-3 pt-2 pb-2">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true" style="color:#007bff !important;font-size:14pt;">貨到付款</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false" style="color:#007bff !important;font-size:14pt;">信用卡</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false" style="color:#007bff !important;font-size:14pt;">銀行轉帳</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="epay-tab" data-toggle="tab" href="#epay" role="tab" aria-controls="epay" aria-selected="false" style="color:#007bff !important;font-size:14pt;">電子支付</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <h4 class="card-title pt-3">收件人資訊：</h4>
                            <h5 class="card-title"><?php echo $cname; ?></h5>
                            <p class="card-text"><?php echo $mobile; ?></p>
                            <p class="card-text"><?php echo $myzip . $ctName . $toName . $address; ?></p>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <h4 class="card-title pt-3">選擇付款帳戶：</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" colspan="2" style="color: aliceblue;">信用卡系統</th>
                                        <th scope="col" width="35%" style="color: aliceblue;">發卡銀行</th>
                                        <th scope="col" width="35%" style="color: aliceblue;">信用卡號</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" width="5%"><input type="radio" name="creditCard" id="creditCard[]" checked /></th>
                                        <th width="25%"> <img src="./images/Visa_Inc._logo.svg" alt="visa" class="img-fluid"> </th>
                                        <th style="color: aliceblue;">玉山商業銀行</th>
                                        <th style="color: aliceblue;">1234****</th>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="radio" name="creditCard" id="creditCard[]" /></th>
                                        <th> <img src="./images/MasterCard_Logo.svg" alt="visa" class="img-fluid"> </th>
                                        <th style="color: aliceblue;">玉山商業銀行</th>
                                        <th style="color: aliceblue;">1234****</th>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="radio" name="creditCard" id="creditCard[]" /></th>
                                        <th> <img src="./images/UnionPay_logo.svg" alt="visa" class="img-fluid"> </th>
                                        <th style="color: aliceblue;">玉山商業銀行</th>
                                        <th style="color: aliceblue;">1234****</th>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <button type="button" class="btn btn-outline-info">使用新信用卡付款</button>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <h4 class="card-title pt-3">ATM匯款資訊：</h4>
                            <img src="images/Cathay-bk-rgb-db.png" alt="cathay" class="img-fluid">
                            <hr>
                            <h5 class="card-title">匯款銀行：國泰世華銀行 銀行
                                代碼：013</h5>
                            <h5 class="card-title">姓名：林小強</h5>
                            <p class="card-text">匯款帳號：1234-4567-7890-1234</p>
                            <p class="card-text">備註：匯款完成後，需要1、2個
                                工作天，待系統入款完成後，將以簡訊通
                                知訂單完成付款。
                            </p>
                        </div>
                        <div class="tab-pane fade" id="epay" role="tabpanel" aria-labelledby="epay-tab">
                            <h4 class="card-title pt-3">選擇電子支付方式：</h4>
                            <table class="table">
                                <!-- <thead>
                                                <tr>
                                                    <th scope="col" ></th>
                                                    <th scope="col">電子支付系統</th>
                                                    <th scope="col">電子支付公司</th>
                                                </tr>
                                            </thead> -->
                                <tbody>
                                    <tr>
                                        <th scope="row" width="5%"><input type="radio" name="epay" id="epay[]" checked /></th>
                                        <th width="25%"> <img src="./images/Apple_Pay_logo.png" alt="ApplePay" class="img-fluid"> </th>
                                        <th width="70%" style="color: aliceblue;">Apple Pay</th>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="radio" name="epay" id="epay[]" /></th>
                                        <th> <img src="./images/Line_pay_logo.svg" alt="Linepay" class="img-fluid"> </th>
                                        <th style="color: aliceblue;">Line pay</th>
                                    </tr>
                                    <tr>
                                        <th scope="row"><input type="radio" name="epay" id="epay[]" /></th>
                                        <th> <img src="./images/JKOPAY_logo.svg" alt="JKOPAY" class="img-fluid"> </th>
                                        <th style="color: aliceblue;">JKOPAY</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        //建立結帳表格資料查詢
        $SQLstring = "SELECT * FROM cart,product,product_img where ip='" . $_SERVER['REMOTE_ADDR'] . "' AND orderid is NULL AND cart.p_id=product_img.p_id AND cart.p_id=product.p_id AND product_img.sort=1 ORDER BY cartid DESC";
        $cart_rs = mysqli_query($link, $SQLstring);
        $pTotal = 0; //設定累加變數$pTotal
        ?>
        <div class="table-responsive-md" style="width: 100%;">
            <table class="table table-hover mt-3">
                <thead>
                    <tr class="bg-primary" style="color: white;">
                        <td width="15%">產品編號</td>
                        <td width="35%">產品名稱</td>
                        <!-- <td width="30%">名稱</td> -->
                        <td width="15%">價格</td>
                        <td width="10%">數量</td>
                        <td width="25%">小計</td>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($cart_data = mysqli_fetch_array($cart_rs)) { ?>
                        <tr>
                            <td><?php echo $cart_data['p_id']; ?></td>
                            <td><?php echo $cart_data['p_name']; ?><br><img src="product_img/<?php echo $cart_data['img_file']; ?>" alt="<?php echo $cart_data['p_name']; ?>" class="img-fluid"></td>

                            <td>
                                <h4 class="color_e600a0 pt-1">$<?php echo $cart_data['p_price']; ?></h4>
                            </td>
                            <td>
                                <?php echo $cart_data['qty']; ?>
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
                        <td colspan="5">累計：<?php echo $pTotal; ?></td>
                    </tr>
                    <tr>
                        <td colspan="5">運費：100</td>
                    </tr>
                    <tr>
                        <td colspan="5" class="color_red">總計：<?php echo $pTotal + 100; ?></td>
                    </tr>
                    <tr>
                        <td colspan="5"><button type="button" id="btn04" name="btn04" class="btn btn-danger"><i class="fas fa-cart-arrow-down pr-2"></i>確認結帳</button>
                            <a href="cart.php" id="btn01" name="btn01" class="btn btn-info"><i class="fas fa-undo-alt pr-2"></i>回上一頁</a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div id="main2">
            <?php require_once("main2.php"); ?>
        </div>


        </div>