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
                <a href="goods.php?p_id=<?php echo $data['p_id']; ?>">
                    <img src="product_img/<?php echo $data['caro_pic']; ?>" class="d-block w-100" alt="<?php echo $data['caro_title']; ?>">
                </a>
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