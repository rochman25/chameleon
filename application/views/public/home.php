<?php
$this->load->view('public/header');
$this->load->view('public/heading');
?>
<div class="overlay-desktop"></div>
<!--- header mobile --->
<?php
$this->load->view('public/m_heading');
?>
<!-- CART -->
<?php
$this->load->view('public/cart');
?>

<style>
* {
  box-sizing: border-box;
}

/* Clearfix (clear floats) */
.row_images {
    content: "";
    clear: both;
    display: table;
    text-align:center;
    margin:0 auto;
    background-color: #f4f4f4;
}

.row_images_full {
    height: 70%;
    width: 100%;
    content: "";
    clear: both;
}

.column_images_one {
    height: 100px;
    width: 100%;
}

.column_images_two {
    float: left;
    width: 50%;
    height: 50%;
    padding: 10px;
}

.column_images_two .btn {
   width: 100%;
  left: 0;
  bottom: 10px;
  position: absolute;
  vertical-align: bottom;
  background-color: red;
  width: 100px;
  color: white;
  font-size: 16px;
}

.column_btn .btn {
  position: absolute;
  background-color: red;
  width: 100px;
  color: white;
  font-size: 16px;
}

.column_images_three {
    float: left;
    width: 25%;
    margin: 10px;
    display:inline-block;
    vertical-align: middle;
    float: none;
  /*padding: 5px;*/
}


</style>

<section id="content">
    <div class="homepage">
        <section class="banner" style="padding-bottom: 35%;">
            <div class="owl-carousel owl-theme" style="position: absolute;">
                <!-- <a href="<?= base_url() ?>promo" -->
                <?php
                if (!empty($banner)) {
                    foreach ($banner as $key => $item) { ?>
                        <a href="<?= $item['link_redirect'] ?>">
                            <div class="banner-card">
                                <img src="<?= base_url() ?>assets/images/bg_all/<?= $item['filename'] ?>">
                            </div>
                        </a>
                    <?php }
                } else { ?>
                    <a>
                        <div class="banner-card">
                            <img src="<?= base_url() ?>assets/images/bg_all/formal.jpeg">
                        </div>
                    </a>
                    <!-- <a href="<?= base_url() ?>promo"> -->
                    <a>
                        <div class="banner-card">
                            <img src="<?= base_url() ?>assets/images/bg_all/moff.jpeg">
                        </div>
                    </a>
                    <!-- <a href="<?= base_url() ?>promo"> -->
                    <a>
                        <div class="banner-card">
                            <img src="<?= base_url() ?>assets/images/bg_all/paket-lengkap.jpeg">
                        </div>
                    </a>
                <?php } ?>
            </div>
        </section>
        <section class="signup">    
            <h1>Make your appearance more "Perfect"</h1>
            <h1>with good quality</h1>
        </section>
        <section class="hot-product">
            <h1>SEMUA PRODUK</h1>
            <div class="container">
                <?php foreach ($produk as $p) {
                    $harga = $p['harga_produk'];
                ?>
                    <div class="product-hotcard" style="padding-bottom: 0;">
                        <a href="<?= base_url() ?>detail?produk=<?= $p['id_produk'] ?>" style="position: inherit;">
                            <?php if ($p['label_produk'] != null) { ?>
                                            <div class="column" style="float: right;width: 100%;display: unset;position: absolute;padding-left: 7px;padding-top: 7px;">
                                                <?php $label_p = explode(",", $p['label_produk']);
                                                foreach ($label_p as $key_l => $val_l) {
                                                ?>
                                                    <div class="badge_label_<?php echo str_replace(" ", "_", $val_l) ?>">
                                                        <p style="font-size: 8px;"><?= strtoupper($val_l) ?></p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
                            <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[$p['id_produk']] ?>" alt="">
                            <div class="row" style="margin-right: 0;margin-left: 0px;margin-bottom:10px">
                                <?php if ($p['label_produk'] != null) { ?>
                                    <div class="column" style="width: 70%;">
                                    <?php } else { ?>
                                        <div class="column" style="width: 100%;">
                                        <?php } ?>
                                        <p style="font-size: 13px; color: #5a5a5a; font-weight: bold;"><?= $p['nama_produk']; ?></p>
                                        <div class="row" style="margin-right: 0;margin-left: 0px;margin-bottom:10px">
                                            <?php if ($p['diskon_produk'] != 0) { ?>
                                                <div class="column" style="width: auto;">
                                                    <div class="price-before" style="font-size:11px; text-decoration : line-through; color:#767171;margin-right:5px">Rp <?php echo number_format($harga, 0); ?></div>
                                                </div>
                                                <div class="column" style="width: auto;">
                                                    <div class="price-after" style="font-size: 11px; color:#ff3a3a;"> Rp <?= number_format($p['harga_produk'] - (($p['diskon_produk'] / 100) * $p['harga_produk']), 0); ?></div>
                                                </div>
                                            <?php } else { ?>
                                                <div class="column" style="width: auto;">
                                                    <div class="price-after" style="font-size: 11px; color:#ff3a3a;"> Rp <?php echo number_format($harga, 0); ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    <!-- <div class="price-before" style="text-decoration : line-through">Rp 429,000</div> -->
                                    <!-- <div class="price-after">Rp.<?= number_format($harga, 0); ?></div> -->
                        </a>
                    </div>
                <?php } ?>
            </div>
        </section>
        
        <!-- <section class="six-banner">
            <div class="banner-container" onclick="window.location.href='<?= base_url(); ?>produk/jas'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                </div>
                <img src="<?= base_url() ?>assets/images/Jas/1.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url(); ?>produk/jas'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                </div>
                <img src="<?= base_url() ?>assets/images/Jas/Jas-BG.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url(); ?>produk/jas'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                   
                </div>
                <img src="<?= base_url() ?>assets/images/Jas/9.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url(); ?>produk/celana'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    
                </div>
                <img src="<?= base_url() ?>assets/images/Celana/P1.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url(); ?>produk/celana'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                 
                </div>
                <img src="<?= base_url() ?>assets/images/bg_all/comingsoon.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url(); ?>produk/celana'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                </div>
                <img src="<?= base_url() ?>assets/images/Celana/P3.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url(); ?>produk/kemeja'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                </div>
                <img src="<?= base_url() ?>assets/images/Kemeja/LRM_EXPORT_4.jpeg" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url(); ?>produk/kemeja'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                </div>
                <img src="<?= base_url() ?>assets/images/Kemeja/Kemeja-BG.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url(); ?>produk/kemeja'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                </div>
                <img src="<?= base_url() ?>assets/images/Kemeja/LRM_EXPORT_6.jpeg" alt="">
            </div>
        </section> -->
        <!-- <section class="promo">
            <h1>YOI #IndonesiaMelangkah</h1>
            <div class="owl-carousel owl-theme">
                <a class="promo-card" href="#">
                    <img src="https://www.mensrepublic.id/assets/images/uploads/card/desktop/3-1572368332-sU3SiYJDFoEV.jpg">
                </a>
                <a class="promo-card" href="#">
                    <img src="https://www.mensrepublic.id/assets/images/uploads/card/desktop/4-1572368337-JvMU00W4aKhw.jpg">
                </a>
            </div>
        </section> -->

        <section class="hot-product-two-row" style="height: 50px;">
        </section>
        
        <section class="signup" style="padding-top: 40px;">    
            <h1>Best Seller</h1>
        </section>
        
        <!--best seller-->
        <section class="hot-product-two-row">
            <div class="container-two-row">
                <?php foreach ($dataBestSellerOne as $p) {
                    $harga = $p['harga_produk'];
                ?>
                    <div class="product-hotcard-two-row"  style="width: 50%;">
                        <a href="<?= $p['link_redirect'] ?>" style="position: inherit;">
                            <img style="height: 100%;" src="<?= base_url() ?>assets/uploads/thumbnail_best_seller/<?= $p['filename'] ?>" alt="">
                            <div class="image-two-row">
                            
                                <div class="column" style="width: 100%;">
                                        
                                        <p style="font-size: 13px; color: #5a5a5a; font-weight: bold;"> <?= $p['title'] ?></p>
                                        <button class="btn">Shop Now</button>
                                        </div>
                                        
                                    </div>      
                        </a>
                    </div>
                <?php } ?>
                
                
            </div>
        </section>
        
        
        <section class="signup">    
            <h1>NEW ARRIVAL</h1>
        </section>
        
        <section class="hot-product-two-row">
            <div class="container-two-row">
                <?php foreach ($dataNewArrivalOne as $p) {
                    $harga = $p['harga_produk'];
                ?>
                    <div class="product-hotcard-two-row" style="width: 50%;">
                        <a href="<?= $p['link_redirect'] ?>" style="position: inherit;">
                            <img style="height: 100%;" src="<?= base_url() ?>assets/uploads/thumbnail_new_arrival/<?= $p['filename'] ?>" alt="">
                            <div class="image-two-row">
                            
                                <div class="column" style="width: 100%; margin-bottom: 10px;">
                                        
                                        <p style="font-size: 13px; color: #5a5a5a; font-weight: bold;"> <?= $p['title'] ?></p>
                                        <button class="btn">Shop Now</button>
                                </div>
                                        
                            </div>      
                        </a>
                    </div>
                <?php } ?>
                
            </div>
        </section>
        
        <!--<div class="row_images">-->
        <!--    <div class="column_images_two">-->
        <!--        <button class="btn">Button</button>-->
        <!--        <img src="/assets/images/embaded/77.jpg" alt="" style="width: 100%;height: 80%;border-radius: 0px;position: static;">    -->
                
        <!--    </div>-->
        <!--    <div class="column_images_two">-->
              
        <!--        <img src="/assets/images/embaded/77.jpg" alt="" style="width: 100%;height: 80%;border-radius: 0px;position: static;">    -->
        <!--        <button class="btn">Buttonss</button>-->
        <!--    </div>-->
        <!--</div>-->
        
        <!--<section class="signup">    -->
        <!--    <h1>Best Seller</h1>-->
        <!--</section>-->
        
        
        <!--<div class="row_images">-->
        <!--  <div class="column_images_three">-->
        <!--    <img src="/assets/images/embaded/77.jpg" alt="" class="img-responsive center-block" >     -->
        <!--  </div>-->
        <!--  <div class="column_images_three">-->
        <!--    <img src="/assets/images/embaded/77.jpg" alt="" class="img-responsive center-block" >     -->
        <!--  </div>-->
        <!--  <div class="column_images_three">-->
        <!--    <img src="/assets/images/embaded/77.jpg" alt="" class="img-responsive center-block" >     -->
        <!--  </div>-->
        <!--</div>-->
            
        
            <section class="signup">    
                <h1>NEW RELEASE</h1>
            </section>
        
            <section class="hot-product-two-row" style="height: 50px;">
            </section>
            
        <!--<section class="hot-product-two-row">-->
            <section class="banner" style="padding-bottom: 45%;">
                <div class="owl-carousel owl-theme" style="position: absolute;">
                   
                    <?php foreach ($produk_new_release as $p) {
                        $harga = $p['harga_produk'];
                        ?>
                        <a href="<?= $p['link_redirect'] ?>" style="position: inherit;">
                                
                                    <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[$p['id_produk']] ?>" alt="">
                                    
                                    <div style="position: fixed;bottom: 20px; padding-left: 20px; z-index: 2;">
                                        <p style="font-size: 16px; color: #ffffff; font-weight: bold;"> New Release</p>
                                        <button style="background-color: transparent; border: 1px solid #ffffff; color: #ffffff;cursor: pointer; font-size: 16px;"> Shop Now</button>
                                    </div>
                            </a>
                    <?php } ?>
                </div>
            </section>
        <!--</section>-->
        <section class="signup">
            <h1>DAFTAR DENGAN EMAIL</h1>
            <h2>Jadi yang pertama untuk mendapatkan produk terbaru dan penawaran dari CHAMELEON CLOTH</h2>
            <a href="<?= base_url() ?>login" class="home_button">

                GABUNG SEKARANG

                <!-- <div class="signup-button">hajar men</div> -->
                <!-- <div class="signup-border"></div> -->
            </a>
        </section>
        <section class="signup" style="background-color: #f4f4f4">    
        </section>
        
        <!--<section class="signup">-->
        <!--</a><a href="https://www.instagram.com/p/B5wHsnYps3r/" style="position: static;width: 100%;margin-bottom: 0px;vertical-align: middle;">-->
        <!--                    <img src="/assets/images/embaded/1.jpg" alt="" style="width: 20%;height: 20%;border-radius: 0px;position: static;">-->
        <!--</a><a href="https://www.instagram.com/p/B-Bag_SpiHp/" style="position: static;width: 100%;margin-bottom: 0px;vertical-align: middle;">-->
        <!--                    <img src="/assets/images/embaded/3.jpg" alt="" style="width: 20%;height: 20%;border-radius: 0px;position: static;">-->
        <!--</a>-->
        <!--<a href="https://www.instagram.com/p/CN8xWsVJ0u1/" style="position: static;width: 100%;margin-bottom: 0px;vertical-align: middle;">-->
        <!--                    <img src="/assets/images/embaded/7.jpg" alt="" style="width: 20%;height: 20%;border-radius: 0px;position: static;">-->
        <!--</a>-->
        <!--<a href="https://www.instagram.com/p/CQADJETpV3u/" style="position: static;width: 100%;margin-bottom: 0px;vertical-align: middle;">-->
        <!--                    <img src="/assets/images/embaded/77.jpg" alt="" style="width: 20%;height: 20%;border-radius: 0px;position: static;">                    -->
        
        <!--</a>-->
        <!--</section>-->
        <?php //$this->load->view('public/home-ig'); 
        ?>

    </div>
</section>
<?php
$this->load->view('public/footer');
?>
