<!-- header mobile -->
<header class="mobile">
    <div class="header-fixed">
        <a href="<?= base_url() ?>" class="logo">
            <?php if ($this->config->item('reseller_mode')) { ?>
                <img style="margin-top: 0px; height: 37px;" src="<?= base_url() ?>assets/images/reseller_logo.png">
            <?php } else { ?>
                <img src="<?= base_url() ?>assets/images/chameleon_cloth_logo.png">
            <?php } ?>
        </a>
        <div class="mainheader">
            <div class="icon-left">
                <a href="javascript:;">
                    <i class="svg_icon__header_hamburger svg-icon"></i>
                </a>
            </div>
            <div class="search" style="margin-right: 50px;">
                <form action="#" method="get">
                    <button type="submit"><i class="svg_icon__header_search svg-icon"></i></button>
                    <input type="text" name="search" class="autocomplete" placeholder="Masukan Kata Kunci">
                </form>
            </div>
            <div class="icon-right">
                <!-- <a href="<?= base_url() ?>profil" class="icon-wishlist"> -->
                <!-- <i class="svg_icon__wishlist svg-icon"></i> -->
                <!-- </a> -->
                <a href="javascript:;" class="icon-cart" style="margin-right: 0.5rem;">
                    <i class="svg_icon__header_cart svg-icon"><span class="notif">0</span></i>
                </a>
                <!-- <a href="<?= base_url() ?>login"> -->
                <!-- <i class="svg_icon__header_login svg-icon"></i> -->
                <!-- </a> -->
            </div>
        </div>

        <div class="overlay"></div>

        <div class="menu-lvl1">
            <ul>
                <li>
                    <a href="#">koleksi
                        <!-- <i class="svg-icon svg_icon__header_carret_right"></i> -->
                    </a>
                </li>
                <?php foreach ($kategori as $key => $item) { ?>
                    <li>
                        <a href="<?= base_url() ?>produk/<?= $item['nama_kategori'] ?>">
                            <!-- <div class="gradient"></div> -->
                            <!-- <img src="<?= base_url() ?>assets/images/Celana/Celana-BG.png" alt="Sepatu"> -->
                            <?= $item['nama_kategori'] ?>
                        </a>
                    </li>
                <?php } ?>
                <!-- <div class="menu-lvl2 menu-collection">
                        <div class="header">
                            koleksi <i class="svg-icon svg_icon__header_carret_left"></i>
                        </div>
                        <div class="collection-wrapper">
                            <div class="collection">
                                <div class="header-collection">
                                    <a href="<?= base_url() ?>produk/celana">
                                        <div class="gradient"></div>
                                        <img src="<?= base_url() ?>assets/images/Celana/Celana-BG.png" alt="Sepatu">
                                        <h2>Celana</h2>
                                    </a>
                                </div>
                                <ul>

                                </ul>
                            </div>
                            <div class="collection">
                                <div class="header-collection">
                                    <a href="<?= base_url() ?>produk/jas">
                                        <div class="gradient"></div>
                                        <img src="<?= base_url() ?>assets/images/Jas/Jas-BG.png" alt="Tas">
                                        <h2>Jas</h2>
                                    </a>
                                </div>
                                <ul>

                                </ul>
                            </div>
                            <div class="collection">
                                <div class="header-collection">
                                    <a href="<?= base_url() ?>produk/kemeja">
                                        <div class="gradient"></div>
                                        <img src="<?= base_url() ?>assets/images/Kemeja/Kemeja-BG.png" alt="Apparel">
                                        <h2>Kemeja</h2>
                                    </a>
                                </div>
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                <!-- </li> -->

                <li><a href="<?= base_url() ?>profil"><span>konfirmasi pembayaran</span></a></li>

            </ul>
            <!-- <div class="icon-right icon-wishlist"> -->
            <!-- <a href="<?= base_url() ?>profil" class="logout">
                <i class="svg-icon svg_icon__"></i>Profil
            </a> -->
            <!-- <div class="logout icon-right icon-wishlist" style="color:black"> -->
            <a class="logout" href="<?= base_url() ?>profil">
                <i class="svg-icon svg_icon__header_user" style="background-color: black;"></i>Akun
            </a>
            <!-- </div> -->
            <!-- </div> -->
            <?php if (
                isset($this->session->userdata['user_data']) &&
                $this->session->userdata['user_data'] == true
            ) { ?>
                <a href="<?= base_url() ?>keluar" class="logout">
                    <i class="svg-icon svg_icon__header_logout"></i>keluar
                </a>
            <?php } ?>
        </div>
        <?php if (isset($voucher)) { ?>
            <div class="voucher">
                <p>Get Free Shipping <b> <?= number_format($voucher->discount_voucher, 0) ?> </b> with Voucher Code <b><?= $voucher->code_voucher ?></b> </p>
            </div>
        <?php } ?>
    </div>
</header>