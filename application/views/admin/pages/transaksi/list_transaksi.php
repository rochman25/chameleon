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
                        <h1>Data Transaksi Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Transaksi</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Transaksi</h2>
                        <p class="section-lead">
                            Berikut data transaksi yang terekam website ini.
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
                                        <div class="table-responsive">
                                            <table class="table table-hover">
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
                                                            <td id="kode_t" data-id="<?= $row['id_transaksi'] ?>"><a href="<?= base_url() ?>admin/transaksi/detail?id=<?= $row['id_transaksi'] ?>"><?= $row['kode_transaksi'] ?></a></td>
                                                            <td><?= $row['username'] ?></td>
                                                            <td><?= $row['waktu_transaksi'] ?></td>
                                                            <td>
                                                                <?php if($row['status_transaksi'] == 'pending'){
                                                                    echo "<span class='badge badge-secondary'>".$row['status_transaksi']."</span>";
                                                                }else if($row['status_transaksi'] == 'kirim'){
                                                                    echo "<span class='badge badge-info'>".$row['status_transaksi']."</span>";
                                                                }else if($row['status_transaksi'] == 'selesai'){
                                                                    echo "<span class='badge badge-success'>".$row['status_transaksi']."</span>";
                                                                }else if($row['status_transaksi'] == 'batal'){
                                                                    echo "<span class='badge badge-danger'>".$row['status_transaksi']."</span>";
                                                                } ?>
                                                            </td>
                                                            <td>
                                                                <button class="btn btn-primary btn-icon icon-left" id="btnProses" data-target="#proses_modal" data-toggle="modal" data-id="<?= $row['id_transaksi'] ?>"><i class="fas fa-credit-card"></i> Proses</button>
                                                                <button class="btn btn-danger btn-icon icon-left" id="btnBatal" data-target="#batal_modal" data-toggle="modal" data-id="<?= $row['id_transaksi'] ?>"><i class="fas fa-times"></i> Batalkan</button>
                                                                <!-- <a href="#" class="btn btn-info" data-id="<?= $row['id_transaksi'] ?>">Detail</a> -->
                                                                <!-- <button class="btn btn-danger" id="btnHapus" data-id="<?= $row['id_transaksi'] ?>" data-target="#hapusModal" data-toggle="modal">Hapus</button> -->
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

            <!-- modal hapus -->
            <!-- modal proses -->
            <div class="modal fade" tabindex="-1" role="dialog" id="proses_modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Proses Transaksi</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/transaksi/update" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Status Transaksi</label>
                                            <div class="input-group">
                                                <select id="status" name="status" class="form-control" required>
                                                    <option>Pilih Status Transaksi</option>
                                                    <option value="proses">Proses</option>
                                                    <option value="kirim">Kirim</option>
                                                    <!-- <option value="selesai">Selesai</option> -->
                                                </select>
                                                <!-- <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required> -->
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <label>Nomor Resi</label>
                                            <div class="input-group">
                                                <input type="text" id="noresi" class="form-control" placeholder="Nomor Resi" name="noresi">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" id="id_proses" name="id" required>
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

        <!-- modal batal -->
        <div class="modal fade" tabindex="-1" role="dialog" id="batal_modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Batalkan Transaksi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?= base_url() ?>admin/transaksi/update" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <input type="hidden" class="form-control" id="id_batal" name="id" required>
                                            <input type="hidden" class="form-control" name="status" value="batal">
                                            <p>
                                                <h6>Apakah anda yakin membatalkan transaksi ini?</h6>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-whitesmoke br">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <input type="submit" name="kirim" value="Ya, Batalkan!" class="btn btn-danger">
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
        $(document).on("click", "#btnBatal", function() {
            let id = $(this).data("id");
            $("#id_batal").val(id);
        })

        $(document).on("click", "#btnProses", function() {
            let id = $(this).data("id");
            $('#id_proses').val(id);
        })

        $(document).on("click","#kode_t",function(){
            let id = $(this).data('id');
            window.location.href="<?=base_url()?>admin/transaksi/detail?id="+id
        });

    </script>


</body>

</html>