<?php
$this->load->view('public/header');
$this->load->view('public/heading');
?>
<div class="overlay-desktop"></div>

<!-- header mobile -->
<?php

$this->load->view('public/m_heading');
?>
<!-- CART -->

<?php

$this->load->view('public/cart');
?>
<section id="content">

    <div class="dashboard-user">
        <div class="background-layout"></div>
        <div class="container">
            <h1>MY PROFILE</h1>
            <div class="left-right">

                <div class="left-side">
                    <i class="svg-icon svg_icon__dashboard_pencil" onclick="window.location.href = '<?= base_url() ?>profil';">
                    </i>
                    <br>
                    <!-- <img src="https://www.mensrepublic.id/assets/images/dashboard/default-avatar.png" alt=""> -->
                    <h1><?= $profil->username; ?></h1>
                    <!-- <span>Joined 13 Februari 2020</span> -->
                    <hr>
                    <ul class="info-profile">
                        <li> <i class="svg-icon svg_icon__dashboard_mail"></i> <span><a href="#" class="__cf_email__" data-cfemail="1876776e71767c79766d6a7e2920587f75797174367b7775"><?= $profil->email; ?></a> </span> </li>
                        <!-- <li> <i class="svg-icon svg_icon__dashboard_gift"></i> <span>16 Sepember 1998 </span>  </li> -->
                        <!-- <li> <i class="svg-icon svg_icon__dashboard_phone"></i> <span>081226809435 </span>  </li> -->
                        <?php if ($alamat) {
                            foreach ($alamat as $a) {
                        ?>
                                <li class="alamat"> <i class="svg-icon svg_icon__dashboard_pin"></i>
                                    <span>
                                        <?= $a->alamat_1 ?>
                                        <?= $a->alamat_2 ?>
                                        <?= $a->kabupaten ?>
                                        <?= $a->kode_pos ?>
                                        <!-- Jawa Tengah -->
                                    </span>
                                </li>
                        <?php
                            }
                        } ?>
                        <!-- <li><i class="svg-icon svg_icon__dashboard_phone"></i> <span><?= $alamat[0]->no_telp ?></span></li> -->

                    </ul>
                    <button class="expand">
                        <i class="svg-icon svg_icon__dashboard_chevron"></i>
                    </button>
                    <a href="<?= base_url() ?>logout" class="logout">
                        <i class="svg-icon svg_icon__dashboard_logout"></i> <span>logout</span> </a>
                </div>
                <div class="right-side">
                    <div class="list-transaction page">
                        <h1>Edit Profile</h1>
                        <div class="data-diri">
                            <form action="<?= base_url() ?>ubah_profil" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="title">Username</div>
                                        <input type="text" name="username" value="<?= $profil->username ?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="title">Nama Lengkap</div>
                                        <input type="text" name="nama_lengkap" value="<?= $alamat[0]->nama_lengkap ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="title">Alamat 1</div>
                                        <input type="text" name="alamat_1" value="<?= $alamat[0]->alamat_1 ?>">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="title">Alamat 2</div>
                                        <input type="text" name="alamat_2" value="<?= $alamat[0]->alamat_2 ?>">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal review -->
    <div id="modal_review" class="modal fade modal-review" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    Review
                </div>
                <div class="modal-body"></div>
                <div class="msg"></div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- end of modal review -->
</section>
<?php

$this->load->view('public/footer');
?>