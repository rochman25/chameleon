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
                                                    Kecamatan <?= $transaksi[0]->kecamatan ?>, Kabupaten <?= $transaksi[0]->kabupaten ?>
                                                    ,Provinsi <?= $transaksi[0]->provinsi ?> <?= $transaksi[0]->kode_pos ?>
                                                </address>
                                            </div>
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong>Waktu Transaksi:</strong><br>
                                                    <?= $transaksi[0]->waktu_transaksi ?><br><br>
                                                    <strong>Status Transaksi:</strong><br>
                                                    <?= $transaksi[0]->status_transaksi ?>
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
                                            <div class="col-md-6 text-md-right">
                                                <address>
                                                    <strong>No Resi:</strong><br>
                                                    <?= ($transaksi[0]->no_resi == "" || $transaksi[0]->no_resi == null) ? "No resi belum tersedia." : $transaksi[0]->no_resi ?>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Catatan Pemesan:</strong><br>
                                                    <?php if ($transaksi[0]->catatan == null || $transaksi[0]->catatan == "") {
                                                        echo "Tidak ada catatan dari pemesan";;
                                                    } else {
                                                        echo $transaksi[0]->catatan;
                                                    } ?>
                                                </address>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>System Note:</strong><br>
                                                    <?php if ($transaksi[0]->system_note == null || $transaksi[0]->system_note == "") {
                                                        echo "Tidak ada catatan system";;
                                                    } else {
                                                        $arr = explode(":",$transaksi[0]->system_note);
                                                        echo $arr[0]."<br/>".$arr[3]." ".$arr[4];
                                                    } ?>
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
                                                        <th data-width="100" style="width:100px;">Image</th>
                                                        <th>Nama</th>
                                                        <th>Ukuran</th>
                                                        <th class="text-center">Harga</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-right">Total</th>
                                                    </tr>
                                                    <?php
                                                    $no = 1;
                                                    $totalHarga = 0;
                                                    foreach ($transaksi as $row => $val) {
                                                        if ($val->id_sub_produk == null && $val->kode_produk != null) {
                                                            $foto = explode(",", $val->thumbnail_produk);
                                                    ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><img width="100" src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $foto[0] ?>"></td>
                                                                <td><?= $val->nama_produk ?></td>
                                                                <td><?= $val->ukuran ?></td>
                                                                <td class="text-center">Rp.<?= number_format($val->harga_produk, 2) ?></td>
                                                                <td class="text-center"><?= $val->jumlah_produk ?></td>
                                                                <td class="text-right">Rp.<?= number_format($val->jumlah_produk * $val->harga_produk, 2) ?></td>
                                                            </tr>
                                                        <?php
                                                        } else if ($val->id_sub_produk != null && $val->kode_produk == null) {
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><img width="100" src="<?= base_url() ?>assets/images/add_on.png"></td>
                                                                <td><?= $val->nama_sub ?></td>
                                                                <td><?= $val->ukuran ?></td>
                                                                <td class="text-center">Rp.<?= number_format($val->harga_produk, 2) ?></td>
                                                                <td class="text-center"><?= $val->jumlah_produk ?></td>
                                                                <td class="text-right">Rp.<?= number_format($val->jumlah_produk * $val->harga_produk, 2) ?></td>
                                                            </tr>
                                                        <?php
                                                        } else {
                                                            $foto = explode(",", $val->thumbnail_produk);
                                                        ?>
                                                            <tr>
                                                                <td><?= $no++; ?></td>
                                                                <td><img width="100" src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $foto[0] ?>"></td>
                                                                <td><?= $val->nama_produk ?></td>
                                                                <td><?= $val->ukuran ?></td>
                                                                <td class="text-center">Rp.<?= number_format($val->harga_produk, 2) ?></td>
                                                                <td class="text-center"><?= $val->jumlah_produk ?></td>
                                                                <td class="text-right">Rp.<?= number_format($val->jumlah_produk * $val->harga_produk, 2) ?></td>
                                                            </tr>
                                                    <?php
                                                        }
                                                        $totalHarga += $val->total;
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-8">
                                            </div>
                                            <div class="col-lg-4 text-right">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Subtotal</div>
                                                    <div class="invoice-detail-value">Rp.<?= number_format($totalHarga, 2) ?></div>
                                                </div>
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Ongkir</div>
                                                    <div class="invoice-detail-value">Rp.<?= number_format($val->total_ongkir, 2) ?> (<?= strtoupper($val->kurir) ?>)</div>
                                                </div>
                                                <hr class="mt-2 mb-2">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Total</div>
                                                    <div class="invoice-detail-value invoice-detail-value-lg">Rp.<?= number_format($val->total_harga, 2) ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="text-md-right">
                                <div class="float-lg-left mb-lg-0 mb-3">
                                    <button class="btn btn-primary btn-icon icon-left" id="btnProses" data-target="#proses_modal" data-toggle="modal" data-id="<?= $transaksi[0]->id_transaksi ?>"><i class="fas fa-credit-card"></i> Proses</button>
                                    <button class="btn btn-danger btn-icon icon-left" id="btnBatal" data-target="#batal_modal" data-toggle="modal" data-id="<?= $transaksi[0]->id_transaksi ?>"><i class="fas fa-times"></i> Batalkan</button>
                                    <a href="<?= base_url() ?>admin/transaksi/export_address?id=<?=$transaksi[0]->id_transaksi?>" class="btn btn-info btn-icon icon-left" target="_blank"><i class="fas fa-print"></i> Cetak Alamat</a>
                                </div>
                                <p><?= date("d/m/Y") ?></p>
                                <!-- <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button> -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- modal proses -->
        <div class="modal fade" tabindex="-1" role="dialog" id="proses_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Proses Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>admin/transaksi/update" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Status Transaksi</label>
                                        <div class="input-group">
                                            <select id="status" name="status" class="form-control" required>
                                                <option>Pilih Status Transaksi</option>
                                                <option value="proses">Proses</option>
                                                <option value="kirim">Kirim</option>
                                                <!-- <option value="selesai">Selesai</option> -->
                                            </select>
                                            <!-- <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required> -->
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label>Nomor Resi</label>
                                        <div class="input-group">
                                            <input type="text" id="noresi" class="form-control" placeholder="Nomor Resi" name="noresi">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <input type="hidden" class="form-control" id="id_proses" name="id" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name="kirim" value="Simpan" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- modal batal -->
    <div class="modal fade" tabindex="-1" role="dialog" id="batal_modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Batalkan Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>admin/transaksi/update" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" id="id_batal" name="id" required>
                                        <input type="hidden" class="form-control" name="status" value="batal">
                                        <p>
                                        <h6>Apakah anda yakin membatalkan transaksi ini?</h6>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" name="kirim" value="Ya, Batalkan!" class="btn btn-danger">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- footer content -->
    <?php $this->load->view('admin/master/footer') ?>
    </div>
    <?php $this->load->view('admin/assets/javascript') ?>
</body>
<script type="text/javascript">
    $(document).on("click", "#btnBatal", function() {
        let id = $(this).data("id");
        $("#id_batal").val(id);
    })

    $(document).on("click", "#btnProses", function() {
        let id = $(this).data("id");
        $('#id_proses').val(id);
    })
</script>

</html>