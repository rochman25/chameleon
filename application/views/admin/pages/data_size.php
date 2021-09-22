<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Size Produk</title>
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
                        <h1>Data size produk chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/banner">Size</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Data Size Produk</h2>
                        <p class="section-lead">
                            Berikut data size produk .
                        </p>

                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Data Size List</h4>
                                    </div>
                                    <div class="card-body">
                                        <button data-target="#tambahModal" data-toggle="modal" class="btn btn-primary" style="margin-bottom:10px"><i class="fa fa-plus"></i> Tambah Size</button>
                                        <?php echo $this->session->flashdata('pesan') ?>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <!-- <th scope="col">Produk</th> -->
                                                    <th scope="col">Size</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                foreach ($size as $row) { ?>
                                                    <tr>
                                                        <th scope="row"><?= $no++ ?></th>
                                                        <td><?= $row['size_produk'] ?></td>
                                                        <td>
                                                            <button id="btnUbah" class="btn btn-success" data-target="#ubahModal" data-toggle="modal" data-no="<?= $row['no'] ?>" data-size="<?= $row['size_produk'] ?>">Ubah</button>
                                                            <button id="btnHapus" class="btn btn-danger" data-target="#hapusModal" data-toggle="modal" data-no="<?= $row['no'] ?>">Hapus</button>
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
                            <h5 class="modal-title">Tambah Size</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/datasize/tambah" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Size Produk</label>
                                            <div class="input-group">
                                                <input type="text" name="size" class="form-control" placeholder="Size" name="order" required>
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
                            <h5 class="modal-title">Ubah Size</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/datasize/ubah" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                <input type="text" class="form-control hidden" name="no" id="no" hidden>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label>Size</label>
                                            <div class="input-group">
                                                <input type="text" id="ubah_size" class="form-control" placeholder="Size" name="ubah_size" required>
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
                            <h5 class="modal-title">Hapus Size</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url() ?>admin/datasize/hapus" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="no_hapus" name="no_hapus" hidden>
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
            let no = $(this).data('no');
            let size = $(this).data('size');
            console.log(no);
            $('#no').val(no);
            $('#ubah_size').val(size);
            
            // $('input[id="nama_kategori"]').val(nama);
            // $('#deskripsi_kategori').val(desc)
        });
        $(document).on("click", "#btnHapus", function() {
            let no = $(this).data('no');
            console.log(no);
            $('#no_hapus').val(no);
        });
    </script>
</body>

</html>