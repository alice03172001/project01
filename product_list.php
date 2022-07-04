 <!-- 查詢product資料 -->
 <?php
    //建立product商品rs
    $maxRows_rs = 8;  //分頁設定數量
    $pageNum_rs = 0;   //起始頁=0(就是第1頁)
    if (isset($_GET['pageNum_rs'])) {
        $pageNum_rs = $_GET['pageNum_rs'];
    }
    $startRow_rs = $pageNum_rs * $maxRows_rs;
    if (isset($_GET['search_name'])) {
        //使用關鍵字查詢
        $queryFirst = sprintf("SELECT * FROM product,product_img,pyclass WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid=pyclass.classid AND (product.p_name LIKE '%s' OR product.p_price LIKE '%s') ORDER BY product.p_id DESC", '%' . $_GET['search_name'] . '%', '%' . $_GET['search_name'] . '%');
    } elseif (isset($_GET['level']) && $_GET['level'] == 1) {
        //使用第一層類別查詢(面包屑)
        $queryFirst = sprintf("SELECT * FROM product,product_img,pyclass WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid=pyclass.classid AND pyclass.uplink='%d' ORDER BY product.p_id DESC", $_GET['classid']);
        // 建立類別查詢
    } elseif (isset($_GET['classid'])) {
        //使用產品類別查詢
        $queryFirst = sprintf("SELECT * FROM product,product_img,pyclass WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid='%d' AND product.classid=pyclass.classid ORDER BY product.p_id DESC", $_GET['classid']);
    } else {
        //列出產品product資料查詢
        $queryFirst = sprintf("SELECT * FROM product,product_img,pyclass WHERE p_open=1 AND product_img.sort=1 AND product.p_id=product_img.p_id AND product.classid=pyclass.classid ORDER BY product.p_id DESC");
    }
    $query = sprintf("%s LIMIT %d,%d", $queryFirst, $startRow_rs, $maxRows_rs);
    $pList01 = mysqli_query($link, $query);

    //控制card列出product資料
    $i = 1; //控制每列row產生
    ?>
 <!-- 加入product_list.php程式 -->
 <?php if ($pList01->num_rows != 0) { ?>
     <?php while ($pList01_Rows = mysqli_fetch_array($pList01)) { ?>
         <?php if ($i % 4 == 1) { ?>
             <div class="row text-center"><?php } ?>
             <div class="col-md-3 col-6">
             
     
                 <!-- card  /  example的項目 -->
                 <div class="card"><a href="goods.php?p_id=<?php echo $pList01_Rows['p_id']; ?>">
                         <img src="./product_img/<?php echo $pList01_Rows['img_file']; ?>" class="card-img-top" alt="<?php echo $pList01_Rows['p_name']; ?>" title="<?php echo $pList01_Rows['p_name']; ?>"></a>
                     <div class="card-body"><br>
                         <h5 class="card-title"><?php echo $pList01_Rows['p_name']; ?></h5>
                         <p class="card-text"><?php echo mb_substr($pList01_Rows['p_intro'], 0, 30, "utf-8"); ?></p>
                         <!-- 使用utf-8編碼限定30個字 -->

                         <!-- 如果p_cart是1就要出現NT -->
                         <?php
                            // if ($pList01_Rows['uplink'] != 2  and $pList01_Rows['uplink'] != 3) { 
                            if ($pList01_Rows['p_cart'] == 1) { ?>
                             <h5>NT<?php } ?><?php echo $pList01_Rows['p_price']; ?></h5>

                             <a href="goods.php?p_id=<?php echo $pList01_Rows['p_id']; ?>" class="btn btn-danger">更多資訊</a>

                             <!-- 如果uplink是2、3就不要出現放購物車 -->
                             <?php
                                // if ($pList01_Rows['uplink'] != 2  and $pList01_Rows['uplink'] != 3) { 
                                    if ($pList01_Rows['p_cart'] == 1) { ?>
                                 <!-- <a href="#" class="btn btn-primary">放購物車</a> -->
                                 <button type="button" id="button01[]" name="button01[]" class="btn btn-primary" onclick="addcart(<?php echo $pList01_Rows['p_id']; ?>)">放購物車</button>
                             <?php } ?>
                             <p></p>
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
 <?php } else { ?>
     <div class="alert alert-danger" role="alert">
         抱歉，目前沒有相關產品!
     </div>
 <?php } ?>