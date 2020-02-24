<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kategori produk</title>
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
                        <h1>Data kategori produk chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Kategori</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Kategori Produk</h2>
                        <p class="section-lead">
                            Berikut data kategori produk .
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Kategori List</h4>
                                    </div>
                                    <div class="card-body">
                                        <button data-target="#tambahModal" data-toggle="modal" class="btn btn-primary" style="margin-bottom:10px"><i class="fa fa-plus"></i> Tambah Kategori</button>
                                        <?php echo $this->session->flashdata('pesan') ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Kategori</th>
                                                    <th scope="col">Foto</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($kategori as $row) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td><?= $row['nama_kategori'] ?></td>
                                                        <td><img src="<?= base_url() ?>assets/uploads/thumbnail_kategori/<?= $row['thumbnail_kategori'] ?>" alt="<?= $row['nama_kategori'] ?>"></td>
                                                        <td>
                                                            <button id="btnUbah" class="btn btn-success" data-target="#ubahModal" data-toggle="modal" data-id="<?= $row['id_kategori'] ?>" data-nama="<?= $row['nama_kategori'] ?>" data-deskripsi="<?= $row['deskripsi_kategori'] ?>">Ubah</button>
                                                            <button id="btnHapus" class="btn btn-danger" data-target="#hapusModal" data-toggle="modal" data-id="<?= $row['id_kategori'] ?>">Hapus</button>
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
                            <h5 class="modal-title">Tambah Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/kategori/tambah" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Nama</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="Nama Kategori" name="nama" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Deskripsi (optional)</label>
                                            <div class="input-group">
                                                <textarea class="form-control" style="height:80px" placeholder="Deskripsi kategori" name="desc"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="thumbnail">Foto Kategori</label>
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
                            <h5 class="modal-title">Ubah Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/kategori/ubah" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Nama</label>
                                            <div class="input-group">
                                                <input type="hidden" class="form-control" name="id" id="id">
                                                <input type="text" id="nama_kategori" class="form-control" placeholder="Nama Kategori" name="nama" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Deskripsi (optional)</label>
                                            <div class="input-group">
                                                <textarea class="form-control" id="deskripsi_kategori" style="height:80px" placeholder="Deskripsi kategori" name="desc"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label for="thumbnail">Foto Kategori</label>
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
                            <h5 class="modal-title">Hapus Kategori</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/kategori/hapus" method="POST">
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
    <script type="text/javascript">
        $(document).on("click", "#btnUbah", function() {
            let id = $(this).data('id');
            let nama = $(this).data('nama');
            let desc = $(this).data('deskripsi');
            $('input[id="id"]').val(id);
            $('input[id="nama_kategori"]').val(nama);
            $('#deskripsi_kategori').val(desc)
        });
        $(document).on("click", "#btnHapus", function() {
            let id = $(this).data('id');
            $('input[id="id_hapus"]').val(id);
        });
    </script>
</body>

</html>