<!-- header mobile -->
<header class="mobile">
    <div class="header-fixed">
        <a href="<?= base_url()?>" class="logo">
            <img src="<?= base_url()?>assets/images/chameleon_cloth_logo.png">
        </a>
        <div class="mainheader">
            <div class="icon-left">
                <a href="javascript:;">
                    <i class="svg_icon__header_hamburger svg-icon"></i>
                </a>
            </div>
            <div class="search">
                <form action="#" method="get">
                    <button type="submit"><i class="svg_icon__header_search svg-icon"></i></button>
                    <input type="text" name="search" class="autocomplete" placeholder="Masukan Kata Kunci">
                </form>
            </div>
            <div class="icon-right">
                <a href="<?= base_url()?>profil" class="icon-wishlist">
                    <i class="svg_icon__wishlist svg-icon"></i>
                </a>
                <a href="javascript:;" class="icon-cart">
                    <i class="svg_icon__header_cart svg-icon"><span class="notif">0</span></i>
                </a>
                <a href="<?= base_url()?>login">
                    <i class="svg_icon__header_login svg-icon"></i>
                </a>
            </div>
        </div>

        <div class="overlay"></div>

        <div class="menu-lvl1">
            <ul>
                <li>
                    <a href="javascript:;">koleksi <i class="svg-icon svg_icon__header_carret_right"></i> </a>
                    <div class="menu-lvl2 menu-collection">
                        <div class="header">
                            koleksi <i class="svg-icon svg_icon__header_carret_left"></i>
                        </div>
                            <div class="collection-wrapper">
                                <div class="collection">
                                    <div class="header-collection">
                                        <a href="<?= base_url()?>produk/celana">
                                            <div class="gradient"></div>
                                            <img src="<?= base_url()?>assets/images/Celana/P5.png" alt="">
                                            <h2>Celana</h2>
                                        </a>
                                    </div>
                                    <ul>
                                       
                                    </ul>
                                </div>
                                <div class="collection">
                                    <div class="header-collection">
                                        <a href="<?= base_url()?>produk/jas">
                                            <div class="gradient"></div>
                                            <img src="<?= base_url()?>assets/images/Jas/11.png" alt="">
                                            <h2>Jas</h2>
                                        </a>
                                    </div>
                                    <ul>
     
                                    </ul>
                                </div>
                                <div class="collection">
                                    <div class="header-collection">
                                        <a href="<?= base_url()?>produk/kemeja">
                                            <div class="gradient"></div>
                                            <img src="<?= base_url()?>assets/images/Kemeja/LRM_EXPORT_5.jpeg" alt="">
                                            <h2>Kemeja</h2>
                                        </a>
                                    </div>
                                    <ul>
                                        
                                    </ul>
                                </div>
                            </div>
                    </div>
                </li>

                <li><a href="https://api.whatsapp.com/send?phone=6283116200500"><span>konfirmasi pembayaran</span></a></li>
              
            </ul>
            <a href="<?= base_url()?>keluar" class="logout">
                <i class="svg-icon svg_icon__header_logout"></i>keluar
            </a>
        </div>

    </div>
</header>
