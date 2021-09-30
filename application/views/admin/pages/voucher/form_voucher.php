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

    <!-- include summernote css/js -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js" defer></script>
    <style>
        .note-editable p {
            line-height: 1;
        }
    </style>
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
                        <h1>Form Produk Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Admin</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Form Produk</h2>
                        <p class="section-lead">
                            Silahkan lengkapi form dibawah ini untuk menambahkan produk baru.
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        <div class="card-header">
                                            <h4>Detail Produk</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="code_voucher">Kode Voucher</label>
                                                        <input type="text" class="form-control" name="code_voucher" id="code_voucher" required value="<?php if (isset($voucher)) {
                                                                                                                                                            echo $voucher->code_voucher;
                                                                                                                                                        } else {
                                                                                                                                                            echo set_value('code_voucher');
                                                                                                                                                        } ?>" placeholder="Masukkan Kode Voucher">
                                                        <b style="color:red"><?php echo form_error('code_voucher'); ?></b>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="kat_p">Besaran Discount</label>
                                                        <input type="number" name="discount_voucher" min="1" required id="discount_voucher" placeholder="Masukkan Besaran Discount" value="<?php if (isset($voucher)) {
                                                                                                                                                                                                            echo $voucher->discount_voucher;
                                                                                                                                                                                                        } else {
                                                                                                                                                                                                            echo set_value('discount_voucher');
                                                                                                                                                                                                        } ?>" class="form-control">
                                                        <b style="color:red"><?php echo form_error('discount_voucher'); ?></b>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top: 10px;">
                                                    <div class="col-lg-6">
                                                        <label for="kat_p">Aktif </label>
                                                        <br />
                                                        <input type="radio" name="is_active" value="TRUE" <?php if (isset($voucher) && $voucher->is_active) {
                                                                                                                echo "checked";
                                                                                                            }?>>Ya
                                                        <br />
                                                        <input type="radio" name="is_active" value="FALSE" <?php if (isset($voucher) && !$voucher->is_active) {
                                                                                                                echo "checked";
                                                                                                            }?>>Tidak
                                                        <b style="color:red"><?php echo form_error('discount_voucher'); ?></b>
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
    <!-- <script src="<?= base_url() ?>assets/admin/js/page/components-multiple-upload.js"></script> -->
</body>

</html>