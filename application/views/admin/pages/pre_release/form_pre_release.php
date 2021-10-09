<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Pre Release Produk</title>
    <!-- CSS Libraries -->
    <?php $this->load->view('admin/assets/stylesheets') ?>
    <link rel="stylesheet" href="<?=base_url()?>assets/admin/node_modules/select2/dist/css/select2.min.css">
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
                        <h1>Form Pre Release Produk Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Admin</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Form Pre Release</h2>
                        <p class="section-lead">
                            Silahkan lengkapi form dibawah ini untuk menambahkan ataupun mengubah Pre Release Produk.
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        <div class="card-header">
                                            <h4>Detail Pre Release</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <label>Produk</label>
                                                            <select class="form-control select2" name="id_produk" width="100%">
                                                                <option>Pilih Produk</option>
                                                                <?php foreach($produk as $index => $item){ ?>
                                                                    <option value="<?= $item['id_produk'] ?>" <?php if(isset($pre_release) && $pre_release->id_produk == $item['id_produk']){ echo "selected"; } ?>><?= $item['kode_produk']." - ".$item['nama_produk'] ?></option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <b style="color:red"><?php echo form_error('id_produk'); ?></b>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <label for="code_voucher">Tanggal Rilis</label>
                                                        <input type="datetime-local" class="form-control" name="release_date" id="release_date" required value="<?php if (isset($pre_release)) {
                                                                                                                                                            $release_date = date_create($pre_release->release_date);
                                                                                                                                                            echo date("Y-m-d\TH:i", strtotime($pre_release->release_date));
                                                                                                                                                        } else {
                                                                                                                                                            echo set_value('release_date');
                                                                                                                                                        } ?>" placeholder="Masukkan Tanggal Rilis">
                                                        <b style="color:red"><?php echo form_error('release_date'); ?></b>
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
    <!-- JS Libraies -->
    </script>
    <script src="<?=base_url()?>assets/admin/node_modules/select2/dist/js/select2.full.min.js"></script>
    <!-- <script src="<?= base_url() ?>assets/admin/js/page/components-multiple-upload.js"></script> -->
</body>

</html>