<?php
$this->load->view('public/header');
$this->load->view('public/heading');
?>
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
<div class="overlay-desktop"></div>

<!-- header mobile -->
<?php
$this->load->view('public/m_heading');
$this->load->view('public/cart');
?>
<section id="content">
    <!-- <div class="container"> -->
    <div class="orderpage">
        <section class="left-column">
            <div class="ticker">
                <i class="svg-icon svg_icon__order_speaker"></i>
                <span>Hubungi Whatsapp 083116200500 jika terjadi kendala dalam proses belanja</span>
            </div>
            <div class="content" style="overflow: hidden;">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12" style="margin-bottom: 30px;">
                        <h5 style="font-weight: bold;">Order : <?= $transaksi->kode_transaksi ?></h5>
                        <div class="title">Tanggal Order : <b style="color: white;"> <?= date('d-M-Y H:i:s', strtotime($transaksi->waktu_transaksi)) ?> </b></div>
                        <div class="title">Kode Transaksi : <b style="color: white;"> <?= $transaksi->kode_transaksi ?> </b></div>
                        <div class="title">Status : <b style="color: white;"> <?= $transaksi->status_transaksi ?> </b></div>
                        <div class="title">Harap membayar sebelum tanggal : <b style="color: red;"> <?= date("d-M-Y H:i:s", strtotime("+1 day", strtotime($transaksi->waktu_transaksi))) ?> </b></div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h5 style="font-weight: bold;">SHIPPING - <?= strtoupper($transaksi->kurir) ?></h5>
                        
                        <div class="title"><b style="color: white;"> <?= $profil->nama_lengkap ?> </b></div>
                        <div class="title">
                            <p style="color: white;"> <?= $profil->alamat_1 . " " . $profil->alamat_2 ?> </p>
                        </div>
                        <div class="title">
                            <p style="color: white;"> <?= $profil->kecamatan ?> </p>
                        </div>
                        <div class="title">
                            <p style="color: white;"> <?= $profil->kabupaten . " " . $profil->kode_pos ?> </p>
                        </div>
                        <div class="title">
                            <p style="color: white;"> <?= $profil->provinsi ?> </p>
                        </div>
                        <div class="title">
                            <p style="color: white;"> <?= "Indonesia" ?> </p>
                        </div>
                        <div class="title">No Resi : <b style="color: white;"><?= ($transaksi->no_resi == "" || $transaksi->no_resi == null ) ? "No resi belum tersedia." : $transaksi->no_resi ?></b></div>
                        <div class="title">Nomor Telphone : <b style="color: white;"> <?= $profil->no_telp ?> </b></div>
                        <div class="title">Email : <b style="color: white;"> <?= $profil->email ?> </b></div>
                        <div class="title">Catatan : <p style="color: white"> <?= ($transaksi->catatan == "" || $transaksi->catatan == null) ? "Tidak ada catatan khusus" : $transaksi->catatan ?> </p></div>
                    </div>
                </div>
            </div>
        </section>
        <section class="right-column">
            <div class="content" style="overflow: hidden;">
                <?php foreach ($detail_transaksi as $row) {
                    if ($row['id_sub_produk'] == null) {
                        $foto = explode(',', $row['thumbnail_produk']);
                ?>
                        <div class="products">
                            <div class="product-box" id="product-box__39395">
                                <img src="<?= base_url() . "assets/uploads/thumbnail_produk/" . $foto[0] ?>" alt="">
                                <div class="product-info">
                                    <div class="title"><?= $row['nama_produk'] ?></div>
                                    <?php if ($row['diskon_produk'] != 0) { ?>
                                        <div class="old-price">RP <?= number_format($row['harga_produk']) ?></div>
                                        <div class="price">Rp <?= number_format($row['harga_produk'] - (($row['diskon_produk'] / 100) * $row['harga_produk'])) ?></div>
                                    <?php } else { ?>
                                        <div class="price">Rp <?= number_format($row['harga_produk']) ?></div>
                                    <?php } ?>
                                    <div class="qty-size">
                                        Jumlah : <strong class="cart_quantity"><?= $row['jumlah_produk'] ?></strong> /
                                        Ukuran : <strong><?= $row['ukuran'] ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="products">
                            <div class="product-box" id="product-box__39395">
                                <img src="<?= base_url() ?>/assets/images/add_on.png" alt="">
                                <div class="product-info">
                                    <div class="title"><?= $row['nama_sub'] ?></div>
                                    <div class="price">Rp <?= number_format($row['harga_sub']) ?></div>
                                    <div class="qty-size">
                                        Jumlah : <strong class="cart_quantity"><?= $row['jumlah_produk'] ?></strong> /
                                        Ukuran : <strong><?= $row['ukuran'] ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                } ?>
                <div class="order-summary" id="order">
                    <h1>Ringkasan Belanja</h1>
                    <hr>
                    <div class="summary-ongkir">
                        <span>Ongkos Kirim</span>
                        <span class="summary-ongkir-value"><b>Rp</b> <b id="ongkos-kirim"> <?= $transaksi->total_ongkir ?></b> </span>
                    </div>
                    <div class="summary-belanja">
                        <span>Total Belanja</span>
                        <span class="summary-belanja-value"><b>Rp <?= number_format($transaksi->total_harga - $transaksi->total_ongkir, 2) ?></b></span>
                    </div>
                    <hr>
                    <div class="summary-all">
                        <span>Total Bayar</span>
                        <span><strong class="summary-all-value"></strong><b>Rp</b> <b id="total-bayar"><?= number_format($transaksi->total_harga, 2) ?></b> </span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<?php
$this->load->view('public/footer');
?>