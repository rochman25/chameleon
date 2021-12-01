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

<style>
    .clockdiv {
        font-family: sans-serif;
        color: #1f1f1f;
        display: inline-block;
        font-weight: 20;
        text-align: center;
        font-size: 14px;
        margin: auto;
        width: 100%;
    }

    .clockdiv>div {
        padding: 1px;
        border-radius: 3px;
        background: transparent;
        display: inline-block;
    }

    .clockdiv div>span {
        padding: 10px;
        border-radius: 3px;
        background: #fff;
        opacity: 90%;
        display: inline-block;
    }
</style>

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
                    } else { ?>
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
                                    <?php if (isset($row['pre_release'])) { ?>
                                        <div class="column" style="width: 100%; display: unset;position: absolute;margin: 0;top: 50%;-ms-transform: translateY(-50%);transform: translateY(-50%);">
                                            <div id="clockdiv-<?= $row['id_produk'] ?>" class="clockdiv">
                                                <div>
                                                    <span class="days"></span>
                                                </div>
                                                <div>
                                                    <span class="hours"></span>
                                                </div>
                                                <div>
                                                    <span class="minutes"></span>
                                                </div>
                                                <div>
                                                    <span class="seconds"></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <img src="" style="height:auto;" alt="" data-src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[$row['id_produk']] ?>" loading="lazy">
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
</section>
<?php

$this->load->view('public/footer');
?>

<script>
    function getTimeRemaining(endtime) {
        const total = Date.parse(endtime) - Date.parse(new Date());
        const seconds = Math.floor((total / 1000) % 60);
        const minutes = Math.floor((total / 1000 / 60) % 60);
        const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
        const days = Math.floor(total / (1000 * 60 * 60 * 24));

        return {
            total,
            days,
            hours,
            minutes,
            seconds
        };
    }

    function initializeClock(id, endtime) {
        const clock = document.getElementById(id);
        const daysSpan = clock.querySelector('.days');
        const hoursSpan = clock.querySelector('.hours');
        const minutesSpan = clock.querySelector('.minutes');
        const secondsSpan = clock.querySelector('.seconds');
        const timeinterval = setInterval(updateClock, 1000);
        updateClock();

        function updateClock() {
            const t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
                // location.reload();
            }
        }


    }
    var products = <?= json_encode($produk) ?>;
    console.log(products);
    products.forEach(element => {
        if (typeof element.pre_release != "undefined") {
            console.log(element.pre_release);
            const deadline = new Date(Date.parse(element.pre_release));
            console.log(deadline)
            initializeClock('clockdiv-' + element.id_produk, deadline);
        }
    });
</script>