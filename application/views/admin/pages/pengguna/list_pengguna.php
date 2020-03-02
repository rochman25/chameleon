<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Akun Pengguna</title>
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
                        <h1>Data akun pengguna Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Pengguna</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Akun Pengguna</h2>
                        <p class="section-lead">
                            Berikut data pengguna yang terdaftar di website ini.
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Admin List</h4>
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal" style="margin-bottom:10px"><i class="fa fa-plus"></i> Tambah Pengguna</button>
                                        <?php echo $this->session->flashdata('pesan') ?>
                                        <div class="table-responsive">
                                            <table class="table table-hover" id="table-1">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Username</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($pengguna as $row) { ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td id="detail_col" data-id="<?= $row['id_pengguna'] ?>">
                                                                <a href="<?= base_url() ?>admin/pengguna/detail?id=<?= $row['id_pengguna'] ?>"><?= $row['username'] ?></a>
                                                            </td>
                                                            <td><?= $row['email'] ?></td>
                                                            <td>
                                                                <?php if ($row['status'] == 0) {
                                                                    echo "Tidak Aktif";
                                                                } else {
                                                                    echo "Aktif";
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-success" id="btnUbah" data-id="<?= $row['id_pengguna'] ?>" data-username="<?= $row['username'] ?>" data-status="<?= $row['status'] ?>" data-email="<?= $row['email'] ?>" data-toggle="modal" data-target="#updateModal">Ubah</button>
                                                                <!-- <button class="btn btn-danger" id="btnHapus" data-id="<?= $row['id_pengguna'] ?>" data-target="#hapusModal" data-toggle="modal">Hapus</button> -->
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
            <!-- modal tambah -->
            <div class="modal fade" tabindex="-1" role="dialog" id="tambahModal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/akun/tambah" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Username</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Username" name="username" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Email" name="email" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" placeholder="Password" name="password" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Status</label>
                                            <div class="input-group">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="1" required>
                                                    <label class="custom-control-label" for="customRadioInline1">Aktif</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="0" required>
                                                    <label class="custom-control-label" for="customRadioInline2">Tidak Aktif</label>
                                                </div>
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
            <div class="modal fade" tabindex="-1" role="dialog" id="updateModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Status Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/pengguna/ubah" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Status</label>
                                            <div class="input-group">
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline3" name="status_u" class="custom-control-input" value="1" required>
                                                    <label class="custom-control-label" for="customRadioInline3">Aktif</label>
                                                </div>
                                                <div class="custom-control custom-radio custom-control-inline">
                                                    <input type="radio" id="customRadioInline4" name="status_u" class="custom-control-input" value="0" required>
                                                    <label class="custom-control-label" for="customRadioInline4">Tidak Aktif</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="hidden" class="form-control" name="id" id="id_ubah">
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
        </div>

        <!-- modal hapus -->
        <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>admin/akun/hapus" method="POST">
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



    <!-- footer content -->
    <?php $this->load->view('admin/master/footer') ?>
    </div>
    </div>
    <?php $this->load->view('admin/assets/javascript') ?>
    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/admin/node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/admin/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript">
        $(document).on("click", "#btnUbah", function() {
            let status = $(this).data('status');
            let id = $(this).data('id');
            $('input[id="id_ubah"]').val(id);
            if (status == 1) {
                $('input[id="customRadioInline3"]').prop('checked', true);
            } else {
                $('input[id="customRadioInline4"]').prop('checked', true);
            }
        });

        $(document).on("click", "#btnHapus", function() {
            let id = $(this).data('id');
            $('input[id="id_hapus"]').val(id)
        });

        $(document).on("click","#detail_col", function() {
            let id = $(this).data('id');
            window.location.href = "<?= base_url() ?>admin/pengguna/detail?id="+id;
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