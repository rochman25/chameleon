<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Banner Produk</title>
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
                        <h1>Data banner produk chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/banner">Banner</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Banner Produk</h2>
                        <p class="section-lead">
                            Berikut data banner produk .
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Banner List</h4>
                                    </div>
                                    <div class="card-body">
                                        <button data-target="#tambahModal" data-toggle="modal" class="btn btn-primary" style="margin-bottom:10px"><i class="fa fa-plus"></i> Tambah Banner</button>
                                        <?php echo $this->session->flashdata('pesan') ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <!-- <th scope="col">Produk</th> -->
                                                    <th scope="col">Foto</th>
                                                    <th scope="col">Order</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($banner as $row) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <!-- <td><?= $row['nama_produk'] ?></td> -->
                                                        <td><img style="margin:10px;" width="150px" src="<?= base_url() ?>assets/images/bg_all/<?= $row['filename'] ?>" alt="<?= $row['filename'] ?>"></td>
                                                        <td><?= $row['order'] ?></td>
                                                        <td><?= $row['active'] ?></td>
                                                        <td>
                                                            <button id="btnUbah" class="btn btn-success" data-target="#ubahModal" data-toggle="modal" data-id="<?= $row['id'] ?>" data-produk="<?= $row['produk_id'] ?>" data-order="<?= $row['order'] ?>" data-link="<?=$row['link_redirect']?>" data-status="<?= $row['active'] ?>">Ubah</button>
                                                            <button id="btnHapus" class="btn btn-danger" data-target="#hapusModal" data-toggle="modal" data-id="<?= $row['id'] ?>" data-foto="<?= $row['filename'] ?>">Hapus</button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>

            <!-- modal tambah -->
            <div class="modal fade" tabindex="-1" role="dialog" id="tambahModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Banner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/banner/tambah" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Link Redirect</label>
                                            <div class="input-group">
                                                <input type="text" name="link_redirect" class="form-control">
                                                <!-- <select class="form-control" name="produk_id">
                                                    <option value=""> -- Pilih Produk -- </option>
                                                    <?php foreach ($produk as $key => $item) { ?>
                                                        <option value="<?= $item['id_produk'] ?>"><?= $item['nama_produk'] ?></option>
                                                    <?php } ?>
                                                </select> -->
                                                <!-- <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Urutan</label>
                                            <div class="input-group">
                                                <input type="number" class="form-control" placeholder="Urutan Banner" name="order" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Status</label>
                                            <div class="input-group">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="1" id="radio1" name="active">
                                                        <label class="form-check-label" for="radio1">
                                                            Aktif
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="0" id="radio2" name="active">
                                                        <label class="form-check-label" for="radio2">
                                                            Tidak Aktif
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="thumbnail">Foto Banner </label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept="image/gif,image/jpeg,image/png,image/jpg">
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

            <!-- modal ubah -->
            <div class="modal fade" tabindex="-1" role="dialog" id="ubahModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Banner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/banner/ubah" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Link Redirect</label>
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" name="id" id="id">
                                                <input type="text" name="link_redirect" id="ubahLink" class="form-control">
                                                <!-- <select class="form-control" name="produk_id" id="ubahProduk">
                                                    <option value=""> -- Pilih Produk -- </option>
                                                    <?php foreach ($produk as $key => $item) { ?>
                                                        <option value="<?= $item['id_produk'] ?>"><?= $item['nama_produk'] ?></option>
                                                    <?php } ?>
                                                </select> -->
                                                <!-- <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Urutan</label>
                                            <div class="input-group">
                                                <input type="number" id="ubahUrutan" class="form-control" placeholder="Urutan Banner" name="order" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Status</label>
                                            <div class="input-group">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="1" id="ubahRadio1" name="active">
                                                        <label class="form-check-label" for="ubahRadio1">
                                                            Aktif
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" value="0" id="ubahRadio2" name="active">
                                                        <label class="form-check-label" for="ubahRadio2">
                                                            Tidak Aktif
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="thumbnail">Foto Banner </label>
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="thumbnail" id="thumbnail" accept="image/gif,image/jpeg,image/png,image/jpg">
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
            <!-- modal hapus -->
            <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus Banner</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/banner/hapus" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" id="id_hapus" name="id" required>
                                                <input type="hidden" class="form-control" id="foto" name="thumbnail" required>
                                                <p>
                                                    <h6>Apakah anda yakin menghapus data ini?</h6>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer bg-whitesmoke br">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <input type="submit" name="kirim" value="Ya, Hapus!" class="btn btn-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer content -->
        <?php $this->load->view('admin/master/footer') ?>
    </div>
    </div>
    <?php $this->load->view('admin/assets/javascript') ?>
    <script type="text/javascript">
        $(document).on("click", "#btnUbah", function() {
            let id = $(this).data('id');
            let produk = $(this).data('produk');
            let order = $(this).data('order');
            let link = $(this).data('link');
            let status = $(this).data('status');
            $('input[id="id"]').val(id);
            $('#ubahProduk').val(produk);
            $('#ubahUrutan').val(order);
            $('#ubahLink').val(link);
            if (status == "1") {
                $('#ubahRadio1').attr('checked', true);
            } else if (status == "0") {
                $('#ubahRadio2').attr('checked', true);
            }
            // $('input[id="nama_kategori"]').val(nama);
            // $('#deskripsi_kategori').val(desc)
        });
        $(document).on("click", "#btnHapus", function() {
            let id = $(this).data('id');
            let foto = $(this).data('foto')
            $('input[id="id_hapus"]').val(id);
            $('input[id="foto"]').val(foto);
        });
    </script>
</body>

</html>