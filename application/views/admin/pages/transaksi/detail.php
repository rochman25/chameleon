<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Transaksi</title>
    <?php $this->load->view('admin/assets/stylesheets') ?>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- header content -->
            <?php $this->load->view('admin/master/header') ?>

            <!-- main content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Data Detail Transaksi</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Transaksi</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <!-- <h2 class="section-title">Detail Transaksi</h2>
                        <p class="section-lead">
                            Berikut data detail transaksi.
                        </p> -->
                        <div class="invoice">
                            <div class="invoice-print">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="invoice-title">
                                            <h2>Detail Transaksi</h2>
                                            <div class="invoice-number"> #<?= $transaksi[0]->kode_transaksi ?></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Data diri pembayar:</strong><br>
                                                    <?= $transaksi[0]->nama_lengkap ?><br>
                                                    <?= $transaksi[0]->alamat_1 ?><br>
                                                    <?= $transaksi[0]->alamat_2 ?><br>
                                                    <?= $transaksi[0]->kota ?>, <?= $transaksi[0]->kode_pos ?>
                                                </address>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong>Waktu Transaksi:</strong><br>
                                                    <?= $transaksi[0]->waktu_transaksi ?><br><br>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Email dan No Telphone:</strong><br>
                                                    <?= $transaksi[0]->no_telp ?><br>
                                                    <?= $transaksi[0]->email ?>
                                                </address>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <div class="section-title">Daftar Pesanan Produk</div>
                                        <p class="section-lead">List barang ini tidak bisa dihapus.</p>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-hover table-md">
                                                <tbody>
                                                    <tr>
                                                        <th data-width="40" style="width: 40px;">#</th>
                                                        <th>Nama</th>
                                                        <th class="text-center">Harga</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                    <?php 
                                                    $no = 1;
                                                    foreach ($transaksi as $row => $val) { ?>
                                                        <tr>
                                                            <td><?=$no++;?></td>
                                                            <td><?=$val->nama_produk?></td>
                                                            <td class="text-center">Rp.<?=number_format($val->harga_produk,2)?></td>
                                                            <td class="text-center"><?=$val->jumlah_produk?></td>
                                                            <td class="text-right">Rp.<?=number_format($val->jumlah_produk * $val->harga_produk,2)?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-8">
                                            </div>
                                            <div class="col-lg-4 text-right">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Subtotal</div>
                                                    <div class="invoice-detail-value">Rp.<?=number_format($val->total_harga,2)?></div>
                                                </div>
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Ongkir</div>
                                                    <div class="invoice-detail-value">Rp.<?=number_format($val->total_ongkir,2)?></div>
                                                </div>
                                                <hr class="mt-2 mb-2">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Total</div>
                                                    <div class="invoice-detail-value invoice-detail-value-lg">Rp.<?=number_format($val->total_harga + $val->total_ongkir,2)?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-md-right">
                                <div class="float-lg-left mb-lg-0 mb-3">
                                    <button class="btn btn-primary btn-icon icon-left"><i class="fas fa-credit-card"></i> Process Payment</button>
                                    <button class="btn btn-danger btn-icon icon-left"><i class="fas fa-times"></i> Cancel</button>
                                </div>
                                <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- footer content -->
        <?php $this->load->view('admin/master/footer') ?>
    </div>
    <?php $this->load->view('admin/assets/javascript') ?>
</body>

</html>