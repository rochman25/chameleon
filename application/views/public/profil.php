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
                                        <?=$a->alamat_1?>
                                        <?=$a->alamat_2?>
                                        <?=$a->kabupaten?>
                                        <?=$a->kode_pos?>
                                        <!-- Jawa Tengah -->
                                    </span>
                                </li>
                        <?php
                            }
                        } ?>
                        <!-- <li><i class="svg-icon svg_icon__dashboard_phone"></i> <span><?=$alamat[0]->no_telp?></span></li> -->

                    </ul>
                    <button class="expand">
                        <i class="svg-icon svg_icon__dashboard_chevron"></i>
                    </button>
                    <a href="<?= base_url() ?>logout" class="logout">
                        <i class="svg-icon svg_icon__dashboard_logout"></i> <span>logout</span> </a>
                </div>
                <div class="right-side">
                    <div class="list-transaction page">
                        <h1>Daftar Transaksi</h1>
                        <table style="color:black;" class="table table-hover">
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            <?php 
                            $no=1;
                            foreach($transaksi as $row){ ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$row['kode_transaksi']?></td>
                                <td><?=$row['status_transaksi']?></td>
                                <td>
                                <form action="<?= base_url()?>pembayaran" method="POST">
                                    <input type="hidden" name="idtransaksi" value="<?=$row['id_transaksi']?>">
                                    <input class="btn btn-success"  type="submit" value="Konfirmasi">
                                </form>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
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
