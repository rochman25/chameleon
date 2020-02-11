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
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        <div class="card-header">
                                            <h4>Detail Produk</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="nama_p">Nama Produk</label>
                                                        <input type="text" class="form-control" name="nama_p" id="nama_p" value="<?php if (isset($produk)) {
                                                                                                                                        echo $produk->nama_produk;
                                                                                                                                    } ?>" placeholder="Masukkan nama produk">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="kat_p">Kategori Produk</label>
                                                        <select class="form-control" name="kat_p" id="kat_p">
                                                            <option>Pilih kategori produk</option>
                                                            <?php foreach ($kat_p as $row) { ?>
                                                                <option value="<?= $row['id_kategori'] ?>" <?php if (isset($produk) && $produk->id_kategori == $row['id_kategori']) {
                                                                                                                echo 'selected';
                                                                                                            } ?>><?= $row['nama_kategori'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <label for="size_p">Ukuran Produk</label>
                                                        <input type="text" name="size_p" id="size_p" placeholder="Masukkan ukuran produk" value="<?php if (isset($produk)) {
                                                                                                                                                        echo $produk->size_produk;
                                                                                                                                                    } ?>" class="form-control">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="stok_p">Stok Produk</label>
                                                        <input type="number" name="stok_p" id="stok_p" placeholder="Masukkan stok produk" value="<?php if (isset($produk)) {
                                                                                                                                                        echo $produk->stok_produk;
                                                                                                                                                    } ?>" class="form-control">
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <label for="harga_p">Harga Produk</label>
                                                        <input type="number" name="harga_p" id="harga_p" placeholder="Masukkan harga produk" value="<?php if (isset($produk)) {
                                                                                                                                                        echo $produk->harga_produk;
                                                                                                                                                    } ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="desc_p">Deskripsi Produk</label>
                                                        <textarea class="summernote" name="desc_p" id="desc_p"><?php if (isset($produk)) {
                                                                                                                    echo $produk->deskripsi_produk;
                                                                                                                } ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="thumbnail">Foto Produk</label>
                                                        <div class="dropzone-previews"></div>
                                                        <input type="file" class="form-control" name="thumbnail[]" accept="image/*" multiple>
                                                        *note : blok file yang akan diupload jika lebih dari 1
                                                    </div>
                                                </div>
                                            </div> -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="foto_p">Foto Produk</label>
                                                        <div class="dropzone" id="mydropzone">
                                                            <!-- <div class="fallback">
                                                                <input name="file" type="file" multiple/>
                                                            </div> -->
                                                        </div>
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
    <script src="<?= base_url() ?>assets/admin/node_modules/dropzone/dist/min/dropzone.min.js"></script>
    <!-- Page Specific JS File -->
    <script>
        var nama="default"
        // document()
        $(function(){
            nama = $("#nama_p").val()
        })
        // let nama = $("#nama_p").val()
        Dropzone.autoDiscover = false;

        var foto_upload = new Dropzone(".dropzone", {
            url: "<?php echo base_url('admin/produk/uploadFile') ?>",
            maxFilesize: 2,
            method: "post",
            acceptedFiles: "image/*",
            paramName: "userfile",
            dictInvalidFileType: "Type file ini tidak dizinkan",
            addRemoveLinks: true,
        });


        //Event ketika Memulai mengupload
        foto_upload.on("sending", function(a, b, c) {
            console.log(nama);
            c.append("file_name",nama)
            // c.append("")
            // a.token = Math.random();
            // c.append("token_foto", a.token); //Menmpersiapkan token untuk masing masing foto
        });

        // foto_upload.on("sendingmultiple",function(a, b, c){
        //     c.append("file_name",nama)
        // });

        foto_upload.on("success", function(a,b,c){
            console.log(nama);
        });
    </script>
    <!-- <script src="<?= base_url() ?>assets/admin/js/page/components-multiple-upload.js"></script> -->
    <script src="<?= base_url() ?>assets/admin/node_modules/summernote/dist/summernote-bs4.js"></script>
</body>

</html>