<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
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
                        <h1>Laporan Penjualan</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Laporan Penjualan</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Laporan Penjualan</h2>
                        <p class="section-lead">
                            Laporan penjualan dapat dilihat dengan memasukkan tanggal pada form berikut.
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Range Waktu</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <!-- <label>Date Range Picker</label> -->
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">
                                                                    <i class="fas fa-calendar"></i>
                                                                </div>
                                                            </div>
                                                            <input type="text" name="tgl" class="form-control daterange-cus" value="<?php if (!empty($tgl)) {
                                                                                                                                        echo $tgl;
                                                                                                                                    } ?>" <?php if (!empty($tgl)) { ?> readonly="readonly" <?php } ?>>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <!-- <label></label> -->
                                                        <input type="submit" name="kirim" value="Tampilkan" class="btn btn-info">
                                                        <?php if (!empty($transaksi)) { ?>
                                                            <input type="submit" name="export" class="btn btn-success" value="Export Excel">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <?php if (!empty($transaksi)) { ?>
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">No</th>
                                                            <th scope="col">Kode Transaksi</th>
                                                            <th scope="col">Username</th>
                                                            <th scope="col">Waktu Transaksi</th>
                                                            <th scope="col">Status</th>
                                                            <!-- <th scope="col">Action</th> -->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($transaksi as $row) { ?>
                                                            <tr>
                                                                <th scope="row"><?= $no++ ?></th>
                                                                <td id="kode_t" data-id="<?= $row['id_transaksi'] ?>"><a href="<?= base_url() ?>admin/transaksi/detail?id=<?= $row['id_transaksi'] ?>"><?= $row['kode_transaksi'] ?></a></td>
                                                                <td><?= $row['username'] ?></td>
                                                                <td><?= $row['waktu_transaksi'] ?></td>
                                                                <td>
                                                                    <?php if ($row['status_transaksi'] == 'pending') {
                                                                        echo "<span class='badge badge-warning'>" . $row['status_transaksi'] . "</span>";
                                                                    } else if ($row['status_transaksi'] == 'validasi') {
                                                                        echo "<span class='badge badge-secondary'>" . $row['status_transaksi'] . "</span>";
                                                                    } else if ($row['status_transaksi'] == 'kirim') {
                                                                        echo "<span class='badge badge-info'>" . $row['status_transaksi'] . "</span>";
                                                                    } else if ($row['status_transaksi'] == 'selesai') {
                                                                        echo "<span class='badge badge-success'>" . $row['status_transaksi'] . "</span>";
                                                                    } else if ($row['status_transaksi'] == 'batal') {
                                                                        echo "<span class='badge badge-danger'>" . $row['status_transaksi'] . "</span>";
                                                                    } ?>
                                                                </td>
                                                                <!-- <td> -->
                                                                <!-- <a href="#" class="btn btn-info" data-id="<?= $row['id_transaksi'] ?>">Detail</a> -->
                                                                <!-- <button class="btn btn-danger" id="btnHapus" data-id="<?= $row['id_transaksi'] ?>" data-target="#hapusModal" data-toggle="modal">Hapus</button> -->
                                                                <!-- </td> -->
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('admin/assets/javascript'); ?>
<!-- Page Specific JS File -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.daterange-cus').daterangepicker({
            locale: {
                format: 'YYYY/MM/DD'
            },
            drops: 'up',
            opens: 'right'
        });
    });
</script>
<!-- <script src="<?= base_url() ?>assets/admin/js/page/forms-advanced-forms.js"></script> -->

</html>