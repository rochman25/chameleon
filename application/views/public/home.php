
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
                <a href="https://www.mensrepublic.id/promo/yoi-indonesiamelangkah">
                    <div class="banner-card">
                        <img src="https://www.mensrepublic.id/assets/images/uploads/banner/desktop/44-1572367791-h81mzAOzym36.jpg">
                    </div>
                </a>
                <a href="https://www.mensrepublic.id/promo/yoi-indonesiamelangkah">
                    <div class="banner-card">
                        <img src="https://www.mensrepublic.id/assets/images/uploads/banner/desktop/45-1572367798-oBIfj796m6yZ.jpg">
                    </div>
                </a>
                <a href="https://www.mensrepublic.id/product/mystery-box">
                    <div class="banner-card">
                        <img src="https://www.mensrepublic.id/assets/images/uploads/banner/desktop/39-1572367739-iCQI4SceWpxN.jpg">
                    </div>
                </a>
                <a href="https://www.mensrepublic.id/category/sepatu/formal">
                    <div class="banner-card">
                        <img src="https://www.mensrepublic.id/assets/images/uploads/banner/desktop/40-1572367745-4FYXR5e5qA1M.jpg">
                    </div>
                </a>
                <a href="https://www.mensrepublic.id/category/sepatu/sneakers">
                    <div class="banner-card">
                        <img src="https://www.mensrepublic.id/assets/images/uploads/banner/desktop/41-1572367752-ZN0ZHbzB4EL7.jpg">
                    </div>
                </a>
            </div>
        </section>
        <section class="hot-product">
            <h1>Laku Banget Nih Men</h1>
                <div class="container">
               
                    <?php foreach($produk as $p){?>
                    <div class="product-hotcard">
                        <a href="https://www.mensrepublic.id/product/edgard-coffee">
                            <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[$p['id_produk']] ?>" alt="">
                                <h1><?= $p['nama_produk'];?></h1>
                                    <!-- <div class="price-before">Rp 429,000</div> -->
                                    <div class="price-after"><?= $p['harga_produk'];?></div>
                                    <div class="rating-wrapper">
                                        <!-- <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[$p['id_produk']] ?>" alt=""> -->
                                        <span>Stok : <?= $p['stok_produk'];?></span>
                                    </div>
                        </a>
                    </div>
                    <?php }?>
                </div>
        </section>
        <section class="six-banner">
            <div class="banner-container" onclick="window.location.href='<?= base_url();?>produk/jas'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    <h2>YOI RED</h2>
                    <!-- <h3>Nationalism</h3> -->
                </div>
                <img src="<?= base_url()?>assets/images/Jas/1.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url();?>produk/jas'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    <h2>YOI BLUE</h2>
                    <!-- <h3>Education</h3> -->
                </div>
                <img src="<?= base_url()?>assets/images/Jas/6.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url();?>produk/jas'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    <h2>YOI BLACK</h2>
                    <!-- <h3>Youth</h3> -->
                </div>
                <img src="<?= base_url()?>assets/images/Jas/9.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url();?>produk/celana'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    <h2>ORD Series</h2>
                    <!-- <h3>Casual Formal</h3> -->
                </div>
                <img src="<?= base_url()?>assets/images/Celana/P1.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url();?>produk/celana''" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    <h2></h2>
                    <h3></h3>
                </div>
                <img src="<?= base_url()?>assets/images/Celana/P2.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url();?>produk/celana'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    <h2>Sneez</h2>
                    <!-- <h3>Everlasting Shoes</h3> -->
                </div>
                <img src="<?= base_url()?>assets/images/Celana/P3.png" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url();?>produk/kemeja'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    <h2>Semerus</h2>
                    <h3>Temen Ngantor</h3>
                </div>
                <img src="<?= base_url()?>assets/images/Kemeja/LRM_EXPORT_4.jpeg" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url();?>produk/kemeja'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    <h2>Sparky Black</h2>
                    <h3>Nyaman Banget</h3>
                </div>
                <img src="<?= base_url()?>assets/images/Kemeja/LRM_EXPORT_5.jpeg" alt="">
            </div>
            <div class="banner-container" onclick="window.location.href='<?= base_url();?>produk/kemeja'" style="cursor: pointer;">
            <div class="border"></div>
                <div class="content">
                    <h2>Musca</h2>
                    <h3>Comfortable Sandal</h3>
                </div>
                <img src="<?= base_url()?>assets/images/Kemeja/LRM_EXPORT_6.jpeg" alt="">
            </div>
        </section>
        <section class="promo">
            <h1>YOI #IndonesiaMelangkah</h1>
            <div class="owl-carousel owl-theme">
                <a class="promo-card" href="https://www.mensrepublic.id/promo/yoi-indonesiamelangkah">
                    <img src="https://www.mensrepublic.id/assets/images/uploads/card/desktop/3-1572368332-sU3SiYJDFoEV.jpg">
                </a>
                <a class="promo-card" href="https://www.mensrepublic.id/promo/yoi-indonesiamelangkah">
                    <img src="https://www.mensrepublic.id/assets/images/uploads/card/desktop/4-1572368337-JvMU00W4aKhw.jpg">
                </a>
            </div>
        </section>
        <section class="signup" style="background-image:url('https://www.mensrepublic.id/assets/images/index/logobg.png')">
            <i class="svg-icon svg_icon__home_envelope"></i>
            <h1>Daftar untuk Email dari MR</h1>
            <h2>Jadi yang pertama untuk mendapatkan produk terbaru dan penawaran dari Men’s Republic</h2>
            <a href="https://www.mensrepublic.id/login" class="signup-button-wrapper">
                <div class="signup-button">hajar men</div>
                <div class="signup-border"></div>
            </a>
        </section>
        <?php $this->load->view('public/home-ig'); ?>

    </div>
</section>
<?php 
$this->load->view('public/footer');
?>
	