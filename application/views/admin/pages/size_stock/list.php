<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Akun admin</title>
    <?php $this->load->view('admin/assets/stylesheets') ?>
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css">
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
                        <h1>Data Voucher Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Admin</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Size Stock Produk</h2>
                        <p class="section-lead">
                            Berikut data Size Stock Produk yang terdapat pada website ini.
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Stock List</h4>
                                    </div>
                                    <div class="card-body">
                                        <a href="<?= base_url() ?>admin/sizestock/tambah?id_produk=<?= $id_produk ?>" class="btn btn-primary" style="margin-bottom:10px"><i class="fa fa-plus"></i> Tambah Stock</a>
                                        <?= $this->session->flashdata('pesan') ?>
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Kode Produk</th>
                                                        <th scope="col">Size</th>
                                                        <th scope="col">Stock</th>
                                                        <th scope="col">Terakhir diupdate</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($size_stock as $row) { ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td id="data-produk" data-id="<?= $row['kode_produk'] ?>"><a href="<?= base_url() ?>admin/produk/ubah/<?= $row['id_produk'] ?>"><?= $row['kode_produk'] ?></a></td>
                                                            <td><?= $row['size'] ?></td>
                                                            <td>
                                                                <?= $row['stock'] ?>
                                                            </td>
                                                            <td><?= $row['updated_at'] ?></td>
                                                            <td>
                                                                 <a href="<?= base_url() ?>admin/SizeStock/ubah/<?= $row['id'] ?>" class="btn btn-success">Ubah</a>
                                                                 <button id="btnHapus" data-target="#hapusModal" data-toggle="modal" data-id="<?= $row['id'] ?>" data-id_produk=<?=$row['id_produk']?> class="btn btn-danger">Hapus</button> 
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
                    <h5 class="modal-title">Hapus Size Stock Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url() ?>admin/SizeStock/hapus" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="input-group">
                                        <input type="hidden" class="form-control" id="id_hapus" name="id" required>
                                        <input type="hidden" class="form-control" id="id_produk_modal_hapus" name="id_produk" required>
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

    <?php $this->load->view('admin/assets/javascript') ?>
    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/admin/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).on("click", "#btnHapus", function() {
            let id = $(this).data("id");
            let id_produk = $(this).data("id_produk");
            $("#id_hapus").val(id);
            $("#id_produk_modal_hapus").val(id_produk);
        });
        $(document).on("click", "#data-produk", function() {
            // alert($(this).data('id'))
            window.location.href = "<?= base_url() ?>admin/produk/ubah?id=" + $(this).data('id')
        });

        $("#table-1").dataTable({
            "columnDefs": [{
                "sortable": false,
                "targets": [2, 3]
            }]
        });
    </script>
</body>

</html>