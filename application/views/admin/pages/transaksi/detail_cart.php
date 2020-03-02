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
                        <h1>Data Detail Keranjang</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Transaksi</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <!-- <h2 class="section-title">Detail Keranjang</h2>
                        <p class="section-lead">
                            Berikut data detail keranjang.
                        </p> -->
                        <div class="invoice">
                            <div class="invoice-print">
                                <div class="row mt-0">
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
                                                    foreach ($cart as $row => $val) { ?>
                                                        <tr>
                                                            <td><?= $no++; ?></td>
                                                            <td><?= $val['nama_produk'] ?></td>
                                                            <td class="text-center">Rp.<?= number_format($val['harga_produk'], 2) ?></td>
                                                            <td class="text-center"><?= $val['quantity'] ?></td>
                                                            <td class="text-right">Rp.<?= number_format($val['quantity'] * $val['harga_produk'], 2) ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-8">
                                            </div>
                                            <div class="col-lg-4 text-right">
                                                <hr class="mt-2 mb-2">
                                                <div class="invoice-detail-item">
                                                    <div class="invoice-detail-name">Total</div>
                                                    <div class="invoice-detail-value invoice-detail-value-lg">Rp.<?= number_format($total, 2) ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <!-- <div class="text-md-right">
                                <div class="float-lg-left mb-lg-0 mb-3">
                                    <button class="btn btn-primary btn-icon icon-left" id="btnProses" data-target="#proses_modal" data-toggle="modal" data-id="<?=$transaksi[0]->id_transaksi?>"><i class="fas fa-credit-card"></i> Proses</button>
                                    <button class="btn btn-danger btn-icon icon-left" id="btnBatal" data-target="#batal_modal" data-toggle="modal" data-id="<?=$transaksi[0]->id_transaksi?>"><i class="fas fa-times"></i> Batalkan</button>
                                </div>
                                <p><?= date("d/m/Y") ?></p>
                                <button class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</button>
                            </div> -->
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
    $(document).on("click", "#btnBatal", function(){
        let id = $(this).data("id");
        $("#id_batal").val(id);
    })

    $(document).on("click", "#btnProses",function(){
        let id = $(this).data("id");
        $('#id_proses').val(id);
    })
</script>
</html>