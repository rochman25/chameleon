<?php
$this->load->view('public/header');
$this->load->view('public/heading');
?>
<div class="overlay-desktop"></div>
<!-- header mobile -->
<?php
$this->load->view('public/m_heading');
?>
<!-- CART -->
<?php
$this->load->view('public/cart');
?>
<section id="content">
    <div class="homepage">
        <section class="banner">
            <div class="owl-carousel owl-theme">
                <!-- <a href="<?= base_url() ?>promo" -->
                <?php
                if (!empty($banner)) {
                    foreach ($banner as $key => $item) { ?>
                        <a href="<?= base_url('detail?produk=' . $item['produk_id']) ?>">
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
        <section class="hot-product">
            <h1>Laku Banget Nih Men</h1>
            <div class="container">
                <?php foreach ($produk as $p) {
                    $harga = $p['harga_produk'];
                ?>
                    <div class="product-hotcard" style="padding-bottom: 0;">
                        <a href="<?= base_url() ?>detail?produk=<?= $p['id_produk'] ?>" style="position: inherit;">
                            <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[$p['id_produk']] ?>" alt="">
                            <div class="row" style="margin-right: 0;margin-left: 0px;margin-bottom:10px">
                                <?php if ($p['label_produk'] != null) { ?>
                                    <div class="column" style="width: 70%;">
                                    <?php } else { ?>
                                        <div class="column" style="width: 100%;">
                                        <?php } ?>
                                        <p style="font-size: 13px; color:white; font-weight: bold;"><?= $p['nama_produk']; ?></p>
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
                                        <?php if ($p['label_produk'] != null) { ?>
                                            <div class="column" style="float: right;width: 25%;">
                                                <?php $label_p = explode(",", $p['label_produk']);
                                                foreach ($label_p as $key_l => $val_l) {
                                                ?>
                                                    <div class="badge_label_<?php echo str_replace(" ", "_", $val_l) ?>">
                                                        <p style="font-size: 8px;"><?= strtoupper($val_l) ?></p>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        <?php } ?>
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
        <section class="signup">
            <i class="svg-icon svg_icon__home_envelope"></i>
            <h1>Daftar Dengan Email</h1>
            <h2>Jadi yang pertama untuk mendapatkan produk terbaru dan penawaran dari Chameleon</h2>
            <a href="<?= base_url() ?>login" class="home_button">

                GABUNG SEKARANG

                <!-- <div class="signup-button">hajar men</div> -->
                <!-- <div class="signup-border"></div> -->
            </a>
        </section>
        <?php //$this->load->view('public/home-ig'); 
        ?>

    </div>
</section>
<?php
$this->load->view('public/footer');
?>