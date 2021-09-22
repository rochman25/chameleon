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
                <div class="title">Nama Lengkap</div>
                <input type="text" disabled name="nama_lengkap" style="color:black" value="<?= $profil->nama_lengkap ?>" required>
                <div class="title">Nomor Telepon:</div>
                <input type="text" disabled name="no_telp" style="color:black" value="<?= $profil->no_telp ?>" required>

                <div class="title">Email:</div>
                <input type="text" disabled style="color:black" disabled name="email" value="<?= $profil->email ?>">

                <div class="title" style="margin-top: 10px;">Alamat Pengiriman:</div>
                <div class="address">
                    <div class="address-box selected">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="title">Alamat 1</div>
                                <input type="text" name="alamat_1" disabled placeholder="contoh: jln pramuka" style="color:black" value="<?= $profil->alamat_1 ?>" required>
                            </div>
                            <div class="col-lg-6">
                                <div class="title">Alamat 2</div>
                                <input type="text" name="alamat_2" disabled placeholder="contoh: Desa Sungai Raya Rt 01 / Rw 02" style="color:black" value="<?= $profil->alamat_2 ?>" required>
                            </div>
                            <input type="hidden" value="<?= $profil->id_alamat ?>" name="id_alamat">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="title">Provinsi</div>
                                <select style="color:black" name="provinsi_id" id="provinsi_id" disabled>
                                    <?php if ($profil->provinsi_id == "") { ?>
                                        <option value="">Pilih Provinsi</option>
                                    <?php } else { ?>
                                        <option value="<?= $profil->provinsi_id . "," . $profil->provinsi ?>"><?= $profil->provinsi ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="title">Kabupaten</div>
                                <select style="color:black" name="kabupaten_id" disabled id="kabupaten_id">
                                    <?php if ($profil->kabupaten_id == "") { ?>
                                        <option value="">Pilih Kabupaten</option>
                                    <?php } else { ?>
                                        <option value="<?= $profil->kabupaten_id . "," . $profil->kabupaten ?>"><?= $profil->kabupaten ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="title">Kecamatan</div>
                                <select style="color:black" name="kecamatan_id" disabled id="kecamatan_id">
                                    <?php if ($profil->kecamatan_id == "") { ?>
                                        <option value="">Pilih Kecamatan</option>
                                    <?php } else { ?>
                                        <option value="<?= $profil->kecamatan_id . "," . $profil->kecamatan ?>"><?= $profil->kecamatan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <div class="title">Kode Pos</div>
                                <input type="text" style="color:black" disabled name="kode_pos" value="<?= $profil->kode_pos ?>">
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </section>
        <section class="right-column">
            <div class="content" style="overflow: hidden;">
                <?php foreach ($detail_transaksi as $row) {
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
                <?php } ?>
                <div class="title">Pilih Pengiriman:</div>
                <div class="kurir">
                    <select style="color:black" name="kurir" id="kurir" disabled required>
                        <option value=""><?= strtoupper($transaksi->kurir) ?></option>
                        <!-- <option value="pos">POS Indonesia</option> -->
                    </select>
                </div>
                <br>
                <div class="title">Catatan untuk Chameleon Cloth (optional)</div>
                <textarea style="color:black" name="catatan" class="notes" disabled> <?= $transaksi->catatan; ?> </textarea>
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