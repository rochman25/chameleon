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
                        <h1>Form Stock Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Admin</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Form Stock</h2>
                        <p class="section-lead">
                            Silahkan lengkapi form dibawah ini untuk menambahkan Stock Size baru.
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <form action="" enctype="multipart/form-data" method="POST">
                                        <div class="card-header">
                                            <h4>Detail Stock Size</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <input type="hidden" name="id_produk" value="<?php if(isset($id_produk)){ echo $id_produk; }else{
                                                        echo $size_stock->id_produk ?? "-";
                                                    }?>">
                                                    <div class="col-lg-6">
                                                        <label for="code_voucher">Label Ukuran</label>
                                                        <input type="text" class="form-control" name="size" id="size" required value="<?php if (isset($size_stock)) {
                                                                                                                                                            echo $size_stock->size;
                                                                                                                                                        } else {
                                                                                                                                                            echo set_value('size');
                                                                                                                                                        } ?>" placeholder="Masukkan Label Ukuran Ex: L">
                                                        <b style="color:red"><?php echo form_error('size'); ?></b>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="kat_p">Stok</label>
                                                        <input type="number" name="stock" min="1" required id="stock" placeholder="Masukkan Stok" value="<?php if (isset($size_stock)) {
                                                                                                                                                                    echo $size_stock->stock;
                                                                                                                                                                } else {
                                                                                                                                                                    echo set_value('stock');
                                                                                                                                                                } ?>" class="form-control">
                                                        <b style="color:red"><?php echo form_error('stock'); ?></b>
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