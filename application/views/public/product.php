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
    <div class="category-page">
        <div class="header" style="background-image:url(<?= $bg; ?>)">
            <div class="container">
                <div class="bottom_absolute">
                    <h1> </h1>
                    <?php
                        if ($section == "semua" || $section == "Semua Produk") {
                            ?>
                            <h2>Semua Produk</h2>

                            <?php
                        } else {?>
                             <h2><?= $section; ?></h2>
                             <?php
                     } ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <!--<div class="all-product-card-wrapper clearfix">
                    <!--<div class="left-side-wrapper">
                        <div class="filtering">
                            <div class="sorting">
                                <div style="color: #5a5a5a;" class="labels">Urutkan</div>
                                <div>
                                    <select id="order" onchange="location = this.value" data-sort="" data-order="">
                                        <option value="?sort=published_at&order=">Terbaru</option>
                                        <option value="?sort=price&order=asc">Termurah</option>
                                        <option value="?sort=price&order=desc">Termahal</option>
                                    </select>
                                </div>
                            </div>
                            <!-- <div class="size">
                                <h2 style="color:white;" >Ukuran</h2>
                                <ul class="size_wrapper">
                                    <li data-id="1" class="size_1">S</li>
                                    <li data-id="2" class="size_2">M</li>
                                    <li data-id="3" class="size_3">X</li>
                                    <li data-id="4" class="size_4">XL</li>
                                </ul>
                            </div> -->
                            <div class="color">
                                <!-- <h2>Warna</h2> -->
                                <!-- <ul class="color_wrapper">
                                    <li data-id="1" data-toggle="tooltip" title="Black" class="color_1" style="background-color: #000000" ></li>
                                    <li data-id="2" data-toggle="tooltip" title="Brown" class="color_2" style="background-color: #845a16" ></li>
                                    <li data-id="4" data-toggle="tooltip" title="Blue" class="color_4" style="background-color: #1d5ca6" ></li>
                                    <li data-id="5" data-toggle="tooltip" title="Grey" class="color_5" style="background-color: #969696" ></li>
                                    <li data-id="7" data-toggle="tooltip" title="Maroon" class="color_7" style="background-color: #800000" ></li>
                                    <li data-id="3" data-toggle="tooltip" title="Tan" class="color_3" style="background-color: #d17012" ></li>
                                    <li data-id="8" data-toggle="tooltip" title="White" class="color_8" style="background-color: #ffffff" ></li>
                                    <li data-id="10" data-toggle="tooltip" title="Red" class="color_10" style="background-color: #ff2600" ></li>
                                    <li data-id="11" data-toggle="tooltip" title="Green" class="color_11" style="background-color: #126112" ></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="right-side-wrapper">
                        <div class="all-product-card">
                            <?php if ($produk != null) {
                                foreach ($produk as $row) {
                                    $harga = $row['harga_produk'];
                            ?>
                                    <div class="product-card-wrapper" style="margin-bottom: 15%;height:auto;">
                                        <a href="<?= base_url(); ?>detail?produk=<?= $row['id_produk']; ?>">
                                            <div class="product-category">
                                                <?php if ($row['label_produk'] != null) { ?>
                                                                <div class="column" style="float: right;width: 100%;position: absolute;padding-left: 7px;padding-top: 7px;">
                                                                    <?php $label_p = explode(",", $row['label_produk']);
                                                                    foreach ($label_p as $key_l => $val_l) {
                                                                    ?>
                                                                        <div class="badge_label_<?php echo str_replace(" ", "_", $val_l) ?>">
                                                                            <p style="font-size: 8px;"><?= strtoupper($val_l) ?></p>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            <?php } ?>
                                                <img src="" style="height:auto;" alt="" data-src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[$row['id_produk']] ?>">
                                                <div class="row" style="margin-right: 0;margin-left: 0px;margin-bottom:10px; margin-top:0px">
                                                    <?php if ($row['label_produk'] != null) { ?>
                                                        <div class="column" style="width: 100%;">
                                                        <?php } else { ?>
                                                            <div class="column" style="width: 100%;">
                                                            <?php } ?>
                                                            <h2 style="font-size: 15px;font-weight: bold; height:auto; margin-top: 0px;"><?= $row['nama_produk']; ?></h2>
                                                            <div class="row" style="margin-right: 0;margin-left: 0px;margin-bottom:10px;">
                                                                <?php if ($row['diskon_produk'] != 0) { ?>
                                                                    <div class="column" style="width: auto;">
                                                                        <div class="price-before" style="text-decoration : line-through; color:#767171;margin-right:5px">Rp <?php echo number_format($harga, 0); ?></div>
                                                                    </div>
                                                                    <div class="column" style="width: auto;">
                                                                        <div class="price-after" style="font-size: 12px; color:#ff3a3a;"><b> Rp <?= number_format($row['harga_produk'] - (($row['diskon_produk'] / 100) * $row['harga_produk']), 0); ?></b></div>
                                                                    </div>
                                                                <?php } else { ?>
                                                                    <div class="column" style="width: auto;">
                                                                        <div class="price-after" style="font-size: 12px; color:#ff3a3a;"> Rp <?php echo number_format($harga, 0); ?>
                                                                        </div>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        <!-- <h2 style="font-size: 20px;font-weight: bold;"><?= $row['nama_produk']; ?></h2>
                                                        <div class="price-wrapper">
                                                            <div class="row" style="margin-right: 0;margin-left: 0px;">
                                                                <div class="column" style="width: auto;">
                                                                    <div class="price-before" style="text-decoration : line-through; color:#767171;margin-right:5px">Rp 429,000</div>
                                                                </div>
                                                                <div class="column" style="width: auto;">
                                                                    <div class="price"> Rp <?php echo number_format($harga, 0); ?></div>
                                                                </div>
                                                            </div>
                                                        </div> -->

                                                        <!-- <div class="rating-wrapper" style="color: white;">
                                                            <img src="https://www.mensrepublic.id/assets/images/category/rating/star-5.png" alt="">
                                                            <span style="color: white;"><?= $row['nama_kategori']; ?></span>
                                                        </div>
                                                        <div class="rest-day" style="color: white;">
                                                            Stok <?= $row['stok_produk']; ?>
                                                        </div> -->
                                                        <div class="new-po">
                                                        </div>
                                                </div>
                                        </a>
                                    </div>
                            <?php }
                            } else {
                                echo "<p>Tidak ditemukan</p>";
                            } ?>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
<?php

$this->load->view('public/footer');
?>