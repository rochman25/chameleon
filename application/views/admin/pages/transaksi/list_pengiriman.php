<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Transaksi</title>
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
                        <h1>Data Transaksi Pengiriman Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Pengiriman</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Transaksi Pengiriman</h2>
                        <p class="section-lead">
                            Berikut data transaksi pengiriman yang terekam website ini.
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Transaksi List</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#tambahModal" style="margin-bottom:10px"><i class="fa fa-plus"></i> Tambah Admin</button> -->
                                        <?php echo $this->session->flashdata('pesan') ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Kode Transaksi</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Waktu Transaksi</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($transaksi as $row) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td><?= $row['kode_transaksi'] ?></td>
                                                        <td><?= $row['username'] ?></td>
                                                        <td><?= $row['waktu_transaksi'] ?></td>
                                                        <td>
                                                            <?php
                                                             if($row['status_transaksi'] == "kirim"){
                                                                echo "<div class='badge badge-info'>Sedang Dikirim</div>";
                                                             }else if($row['status_transaksi'] == "selesai"){
                                                                echo "<div class='badge badge-success'>Terkirim</div>";
                                                             }else{
                                                                echo "<div class='badge badge-warning'>Proses</div>";
                                                             }
                                                              ?>
                                                        </td>
                                                        <td>
                                                            <!-- <button class="btn btn-success" id="btnUbah" data-id="<?= $row['id_admin'] ?>" data-username="<?= $row['username'] ?>" data-role="<?= $row['role'] ?>" data-status="<?= $row['status'] ?>" data-email="<?= $row['email'] ?>" data-toggle="modal" data-target="#updateModal">Ubah</button> -->
                                                            <button class="btn btn-success" id="btnHapus" data-id="<?= $row['id_transaksi'] ?>" data-status="<?= $row['status_transaksi'] ?>" data-noresi="<?= $row['no_resi']?>" data-target="#hapusModal" data-toggle="modal">Update</button>
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

            <!-- modal hapus -->
            <div class="modal fade" tabindex="-1" role="dialog" id="hapusModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Data Transaksi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/transaksi/update" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Status Pengiriman</label>
                                            <div class="input-group">
                                                <select id="status" name="status" class="form-control" required>
                                                    <option>Pilih Status Pengiriman</option>
                                                    <option value="kirim">Dikirim</option>
                                                    <option value="selesai">Selesai</option>
                                                </select>
                                                <!-- <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Nomor Resi</label>
                                            <div class="input-group">
                                                <input type="text" id="noresi" class="form-control" placeholder="Nomor Resi" name="noresi" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" id="id_hapus" name="id" required>
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

        <!-- footer content -->
        <?php $this->load->view('admin/master/footer') ?>
    </div>
    </div>
    <?php $this->load->view('admin/assets/javascript') ?>
    <script type="text/javascript">
        $(document).on("click", "#btnHapus", function() {
            let id = $(this).data('id')
            let status = $(this).data('status')
            let noresi = $(this).data('noresi')
            $('input[id="id_hapus"]').val(id)
            $("div.input-group select").val(status)
            // $("div.input-group option[value="+status+"]").attr('selected', 'selected')
            $('#noresi').val(noresi)
        });
    </script>


</body>

</html>