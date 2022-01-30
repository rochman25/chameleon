<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Reseller</title>
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
                        <h1>Data Detail Reseller</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/reseller">Reseller</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <div class="invoice">
                            <div class="invoice-print">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="invoice-title">
                                            <h2>Detail Reseller</h2>
                                            <div class="invoice-number"> #<?= $pengguna->id_pengguna ?></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <address>
                                                    <strong>Data diri reseller:</strong><br>
                                                    <?= $pengguna->nama_lengkap ?? "kosong" ?><br>
                                                    <?= $pengguna->alamat_1 ?? "kosong" ?><br>
                                                    <?= $pengguna->alamat_2 ?? "kosong" ?><br>
                                                    <?= $pengguna->kota ?? "kosong" ?>, <?= $pengguna->kode_pos ?? "kosong" ?>
                                                </address>
                                            </div>
                                        </div>
                                    </div>
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