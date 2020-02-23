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
                        <h1>Data akun admin Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Admin</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Akun admin</h2>
                        <p class="section-lead">
                            Berikut data admin yang dapat mengakses website ini.
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Admin List</h4>
                                    </div>
                                    <div class="card-body">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal" style="margin-bottom:10px"><i class="fa fa-plus"></i> Tambah Admin</button>
                                        <?php echo $this->session->flashdata('pesan') ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Role</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($admin as $row) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td><?= $row['username'] ?></td>
                                                        <td><?= $row['email'] ?></td>
                                                        <td>
                                                            <?php if ($row['role'] == 0) {
                                                                echo "Admin";
                                                            } else {
                                                                echo "Super Admin";
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($row['status'] == 0) {
                                                                echo "Tidak Aktif";
                                                            } else {
                                                                echo "Aktif";
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-success" id="btnUbah" data-id="<?= $row['id_admin'] ?>" data-username="<?= $row['username'] ?>" data-role="<?= $row['role'] ?>" data-status="<?= $row['status'] ?>" data-email="<?= $row['email'] ?>" data-toggle="modal" data-target="#updateModal">Ubah</button>
                                                            <button class="btn btn-danger" id="btnHapus" data-id="<?= $row['id_admin'] ?>" data-target="#hapusModal" data-toggle="modal">Hapus</button>
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
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Admin</h5>
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
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ubah Admin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/akun/ubah" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Username</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="username" placeholder="Username" name="username" required>
                                                <input type="hidden" class="form-control" id="id_ubah" name="id" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Email</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                            <p><h6>Apakah anda yakin menghapus data ini?</h6></p>
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
            let username = $(this).data('username');
            let email = $(this).data('email');
            let status = $(this).data('status');
            let id = $(this).data('id');
            $('input[id="username"]').val(username);
            $('input[id="email"]').val(email);
            $('input[id="id_ubah"]').val(id);
            if(status == 1){
                $('input[id="customRadioInline3"]').prop('checked',true);
            }else{
                $('input[id="customRadioInline4"]').prop('checked',true);
            }
        });

        $(document).on("click", "#btnHapus", function() {
            let id = $(this).data('id');
            $('input[id="id_hapus"]').val(id)
        });
    </script>


</body>

</html>