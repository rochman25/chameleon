<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Toko Chameleon</title>
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
                        <h1>Profile Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Profile Toko</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Form Profile</h2>
                        <p class="section-lead">
                            Silahkan lengkapi form dibawah ini untuk mengisi informasi profile toko.
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <form action="<?= base_url()?>admin/toko/simpan" enctype="multipart/form-data" method="POST">
                                        <div class="card-header">
                                            <h4>Detail Profile</h4>
                                        </div>
                                        <div class="card-body">
                                            <?php echo $this->session->flashdata('pesan') ?>
                                            <input type="hidden" name="id" value="<?php if (isset($toko)) {echo $toko->id_toko; }?>"> 
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="nama_t">Nama Toko</label>
                                                        <input type="text" class="form-control" name="nama_t" id="nama_t" value="<?php if (isset($toko)) {
                                                                                                                                        echo $toko->nama_toko;
                                                                                                                                    } ?>" placeholder="Masukkan nama toko">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="no_telp">No Telphone</label>
                                                        <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?php if (isset($toko)) {
                                                                                                                                        echo $toko->no_telp;
                                                                                                                                    } ?>" placeholder="Masukkan No Telphone toko">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" name="email" id="email" value="<?php if (isset($toko)) {
                                                                                                                                    echo $toko->email;
                                                                                                                                } ?>" placeholder="Masukkan Email toko">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="desc_t">Tentang Toko</label>
                                                        <textarea class="summernote" name="desc_t" id="desc_t"><?php if (isset($toko)) {
                                                                                                                    echo $toko->deskripsi_toko;
                                                                                                                } ?></textarea>
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
</body>

</html>