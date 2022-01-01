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
<section id="content" style="display: flex;flex-direction: column;align-content: center;align-items: center;background: white;">
    <!-- <div class="container"> -->
    <div class="orderpage">
        <section class="left-column">
            <div class="ticker">
                <i class="svg-icon svg_icon__order_speaker"></i>
                <span>Hubungi Whatsapp 083116200500 jika terjadi kendala dalam proses belanja</span>
            </div>
            <div class="content" style="overflow: hidden;">
                <div class="row">
                    <h5 style="font-weight: bold;padding-bottom: 15px;text-align: center;font-size: xx-large;">Order Detail</h5>
                    <div class="col-lg-6 col-md-12 col-sm-12" style="margin-bottom: 30px;background: #ffffff;">
                        <div class="title">Kode Transaksi : <b style="color: #5a5a5a;"> <?= $transaksi->kode_transaksi ?> </b></div>
                        <div class="title">Tanggal Order : <b style="color: #5a5a5a;"> <?= date('d-M-Y H:i:s', strtotime($transaksi->waktu_transaksi)) ?> </b></div>
                        <div class="title">Harap membayar sebelum tanggal : <b style="color: red;"> <?= date("d-M-Y H:i:s", strtotime("+1 day", strtotime($transaksi->waktu_transaksi))) ?> </b></div>
                        <div class="title">Status : <b style="color: #5a5a5a;"> <?= $transaksi->status_transaksi ?> </b></div>
                        <div class="title">No Resi : <b style="color: #5a5a5a;"><?= ($transaksi->no_resi == "" || $transaksi->no_resi == null) ? "No resi belum tersedia." : $transaksi->no_resi ?></b></div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h5 style="font-weight: bold;">SHIPPING - <?= strtoupper($transaksi->kurir) ?></h5>

                        <div class="title"><b style="color: #5a5a5a;"> <?= $profil->nama_lengkap ?> </b></div>
                        <div class="title">
                            <p style="margin: 0;color: #5a5a5a;"> <?= $profil->alamat_1 . " " . $profil->alamat_2 ?> </p>
                        </div>
                        <div class="title">
                            <p style="margin: 0;color: #5a5a5a;"> <?= $profil->kecamatan ?> </p>
                        </div>
                        <div class="title">
                            <p style="margin: 0;color: #5a5a5a;"> <?= $profil->kabupaten . " " . $profil->kode_pos ?> </p>
                        </div>
                        <div class="title">
                            <p style="margin: 0;color: #5a5a5a;"> <?= $profil->provinsi ?> </p>
                        </div>
                        <div class="title">
                            <p style="margin: 0;color: #5a5a5a;padding-bottom: 15px;"> <?= "Indonesia" ?> </p>
                        </div>
                        <div class="title">Nomor Telphone : <b style="color: #5a5a5a;"> <?= $profil->no_telp ?> </b></div>
                        <div class="title">Email : <b style="color: #5a5a5a;"> <?= $profil->email ?> </b></div>
                        <div class="title">Catatan : <p style="color: #5a5a5a"> <?= ($transaksi->catatan == "" || $transaksi->catatan == null) ? "Tidak ada catatan khusus" : $transaksi->catatan ?> </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="right-column">
            <div class="content" style="overflow: hidden;">
                <?php 
                $jumlah_item = 0;
                $totalHarga = 0;
                $totalRealHarga = 0;
                foreach ($detail_transaksi as $row) {
                    $totalRealHarga += ($row['harga_produk'] * $row['jumlah_produk']);
                    $totalDiskon = 0;
                    if ($row['id_sub_produk'] == null) {
                        $diskon = (($row['diskon_produk'] / 100) * $row['harga_produk']);
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
                                        <?php $totalHarga += (($row['harga_produk'] - (($row['diskon_produk'] / 100) * $row['harga_produk'])) * $row['jumlah_produk']); ?>
                                    <?php } else { ?>
                                        <div class="price">Rp <?= number_format($row['harga_produk']) ?></div>
                                        <?php $totalHarga += ($row['harga_produk'] * $row['jumlah_produk']); ?>
                                    <?php } ?>
                                    <div class="qty-size">
                                         Size : <strong><?= $row['ukuran'] ?></strong>
                                        × <strong class="cart_quantity"><?= $row['jumlah_produk'] ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    $totalDiskon += ($diskon  * $row['jumlah_produk']);
                    } else { ?>
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
                    <div class="summary-belanja">
                        <span>Subtotal</span>
                        <span class="summary-belanja-value"><b>Rp <?= number_format($totalRealHarga, 0) ?></b></span>
                    </div>
                    <div class="summary-ongkir">
                        <span>Ongkos Kirim</span>
                        <span class="summary-ongkir-value"><b>Rp</b> <b id="ongkos-kirim"> <?= number_format($transaksi->total_ongkir) ?></b> </span>
                    </div>
                    <div class="summary-ongkir">
                        <span>Diskon</span>
                        <span class="summary-ongkir-value" style="color: red;"><b> - Rp</b> <b id="diskon-produk"><?= number_format($totalDiskon) ?></b> </span>
                    </div>
                    <div class="summary-ongkir">
                        <?php
                            if($transaksi->system_note){
                                $arr = explode(":", $transaksi->system_note);
                                // $arr[3] . " " . $arr[4];
                            }
                        ?>
                        <span>Diskon Ongkos Kirim</span>
                        <span class="summary-ongkir-value" style="color: red;"><b> - Rp</b> <b id="diskon-ongkir"><?=number_format($arr[6]??0,0)?></b> </span>
                    </div>
                    <hr>
                    <div class="summary-all">
                        <span style="font-size: larger;font-weight: 900;color: #5a5a5a;">Total</span>
                        <span style="font-size: larger;font-weight: 900;color: #5a5a5a;"><strong class="summary-all-value"></strong><b>Rp</b> <b id="total-bayar"><?= number_format($transaksi->total_harga, 0) ?></b> </span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<?php
$this->load->view('public/footer');
?>