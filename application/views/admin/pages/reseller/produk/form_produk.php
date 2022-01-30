<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Produk</title>
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/dropzone/dist/min/dropzone.min.css">
    <?php $this->load->view('admin/assets/stylesheets') ?>
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/select2/dist/css/select2.min.css">
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
                        <h1>Form Produk Reseller Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Admin</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Form Produk Reseller</h2>
                        <p class="section-lead">
                            Silahkan lengkapi form dibawah ini untuk menambahkan produk reseller baru.
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        <div class="card-header">
                                            <h4>Detail Produk</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="nama_p">Pilih Produk</label>
                                                        <select class="form-control select2" name="id_ps" disabled>
                                                            <?php foreach($master_produk as $index => $item){ ?>
                                                                <option value="<?=$item->id_produk?>" <?php if(isset($produk) && $produk->id_produk == $item->id_produk) echo "selected"; ?>><?=$item->kode_produk." - ".$item->nama_produk?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id_p" value="<?=isset($produk) ? $produk->id_produk : null?>">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="harga_p">Harga Produk</label>
                                                        <input type="number" name="harga_p" id="harga_p" placeholder="Masukkan harga produk" value="<?php if (isset($produk)) {
                                                                                                                                                        echo $produk->harga_produk;
                                                                                                                                                    } ?>" class="form-control">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="harga_p">Harga Diskon Produk</label>
                                                        <input type="number" min="0" name="diskon_p" id="diskon_p" placeholder="Masukkan harga diskon produk" value="<?php if (isset($produk)) {
                                                                                                                                                                            echo $produk->harga_produk - ($produk->diskon_produk / 100 * $produk->harga_produk);
                                                                                                                                                                        } ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <input type="submit" name="kirim" class="btn btn-primary" value="Simpan">
                                            <input type="reset" class="btn btn-secondary" value="Reset">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php $this->load->view('admin/master/footer') ?>
        </div>
    </div>
    <?php $this->load->view('admin/assets/javascript') ?>
    <script src="<?= base_url() ?>assets/admin/node_modules/select2/dist/js/select2.full.min.js" type="text/javascript"></script>
</body>

</html>