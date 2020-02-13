<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Akun admin</title>
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
                        <h1>Data Produk Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Admin</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Produk List</h2>
                        <p class="section-lead">
                            Berikut data produk yang terdapat pada website ini.
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Admin List</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?= base_url() ?>admin/produk/tambah" class="btn btn-primary" style="margin-bottom:10px"><i class="fa fa-plus"></i> Tambah Produk</a>
                                        <?= $this->session->flashdata('pesan') ?>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Kode Produk</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Stok</th>
                                                        <th scope="col">Harga Satuan</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($produk as $row) { ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td id="data-produk" data-id="<?= $row['kode_produk'] ?>"><a href="<?= base_url() ?>admin/produk/ubah?id=<?= $row['id_produk'] ?>"><?= $row['kode_produk'] ?></a></td>
                                                            <td><?= $row['nama_produk'] ?></td>
                                                            <td>
                                                                <?= $row['stok_produk'] ?>
                                                            </td>
                                                            <td><?= $row['harga_produk'] ?></td>
                                                            <td>
                                                                <img style="margin:10px" width="100px" height="100px" src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[$row['id_produk']] ?>">
                                                            </td>
                                                            <td>
                                                                <!-- <a href="<?= base_url() ?>admin/produk/ubah?id=<?= $row['id_produk'] ?>" class="btn btn-success">Ubah</a> -->
                                                                <button id="btnHapus" data-target="#hapusModal" data-toggle="modal" data-id="<?= $row['id_produk'] ?>" class="btn btn-danger">Hapus</button>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>

            <!-- footer content -->
            <?php $this->load->view('admin/master/footer') ?>
        </div>
    </div>
    <!-- modal hapus -->
    <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>admin/produk/hapus" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" id="id_hapus" name="id" required>
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
    <?php $this->load->view('admin/assets/javascript') ?>
    <script type="text/javascript">
        $(document).on("click", "#btnHapus", function() {
            let id = $(this).data("id");
            $("#id_hapus").val(id);
        });
        $(document).on("click", "#data-produk", function() {
            // alert($(this).data('id'))
            window.location.href = "<?= base_url() ?>admin/produk/ubah?id=" + $(this).data('id')
        });
    </script>
</body>

</html>