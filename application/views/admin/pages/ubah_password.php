<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Password</title>
    <?php $this->load->view('admin/assets/stylesheets') ?>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="<?= base_url() ?>assets/images/chameleon_cloth_logo_black.png" alt="logo" width="100" class="shadow-light rounded-circle">
                        </div>


                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Ubah Password</h4>
                            </div>

                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="form-group">
                                        <label for="password">Password Lama</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="pass_lama" tabindex="2" required>
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password-confirm">Password Baru</label>
                                        <input id="password-confirm" type="password" class="form-control" name="pass_baru" tabindex="2" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4" value="Simpan" name="kirim">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; Stisla 2018
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php $this->load->view('admin/assets/javascript') ?>
</body>

</html>