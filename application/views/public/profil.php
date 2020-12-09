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

<style>
    .section {
        overflow: hidden;
        transition: max-height 0.3s ease-out;
        /* note that we're transitioning max-height, not height! */
        height: auto;
        max-height: 600px;
        /* still have to hard-code a value! */
    }

    .section.collapsed {
        max-height: 0;
    }
</style>

<section id="content">

    <div class="dashboard-user">
        <div class="background-layout"></div>
        <div class="container">
            <?php if ($this->session->flashdata('pesan')) { ?>
                <div style="margin-top:5px; margin-bottom:5px" class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p style="color:black">
                        <b><?= $this->session->flashdata('pesan') ?></b>
                    </p>
                </div>
            <?php } ?>
            <div class="left-right">
                <div class="left-side">
                    <h1 style="font-size: 18px; text-align: center;">Account</h1>
                    <div class="card">
                        <div class="card-row">
                            <!-- <img src="https://www.mensrepublic.id/assets/images/dashboard/default-avatar.png" alt=""> -->
                            <h1 style="margin-top:20px"><?= $profil->username; ?> <i class="fa fa-edit" onclick="window.location.href = '<?= base_url('ubah_profile') ?>';">
                                </i></h1>
                            <!-- <span>Joined 13 Februari 2020</span> -->
                            <hr>
                            <ul class="info-profile">
                                <li> <i class="fa fa-envelope"></i> <span><a href="#" class="__cf_email__" data-cfemail="1876776e71767c79766d6a7e2920587f75797174367b7775"><?= $profil->email; ?></a> </span> </li>
                                <!-- <li> <i class="svg-icon svg_icon__dashboard_gift"></i> <span>16 Sepember 1998 </span>  </li> -->
                                <!-- <li> <i class="svg-icon svg_icon__dashboard_phone"></i> <span>081226809435 </span>  </li> -->
                                <?php if ($alamat) {
                                    foreach ($alamat as $a) {
                                ?>
                                        <li class="alamat"> <i class="svg-icon svg_icon__dashboard_pin"></i>
                                            <span>
                                                <?= $a->alamat_1 ?>
                                                <?= $a->alamat_2 ?>
                                                <?= "Kecamatan " . $a->kecamatan ?>
                                                <?= "Kabupaten " . $a->kabupaten ?>
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
                        </div>
                    </div>
                    <!-- <a href="<?= base_url() ?>keluar" class="logout">
                        <i class="svg-icon svg_icon__dashboard_logout"></i> <span>logout</span> </a> -->
                </div>
                <div class="right-side">
                    <h1 style="font-size: 18px; text-align: center;">Orders</h1>
                    <!-- <div class="list-transaction page"> -->
                    <?php
                    $no = 1;
                    foreach ($transaksi as $row) { ?>
                        <div class="card">
                            <div class="card-row">
                                <div class="row" style="margin-right: 0px;margin-left: 0px;">
                                    <div class="column">
                                        <b><?= $no++ . ". "; ?></b>
                                        <b style="text-decoration: underline;"><?= $row['kode_transaksi'] ?></b>
                                    </div>
                                    <div class="column">
                                        <div class="row" style="margin-right: 0; margin-left: 0px;">
                                            <div class="column"></div>
                                            <div class="column" style="float: right;">
                                                <?php if ($row['bukti_transfer'] == null && $row['status_transaksi'] !== "batal" ) { ?>
                                                    <!-- <span style="float: right;"> -->
                                                    <form action="<?= base_url() ?>pembayaran" method="POST">
                                                        <input type="hidden" name="idtransaksi" value="<?= $row['id_transaksi'] ?>">
                                                        <input class="btn-sm btn-success" style="margin-top:0px;" type="submit" value="Konfirmasi">
                                                    </form>
                                                    <!-- </span> -->
                                                <?php } else { ?>
                                                    <p style="text-align:right; font-weight:bold ;"><a href="#" class="btntoggle" data-id="<?= $row['kode_transaksi'] ?>">Check</a></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-row">
                                <div class="collapsed" id="panel<?=$row['kode_transaksi']?>">
                                    <hr style="margin: 0px;">
                                    <b>&#8203; &#8203; &#8203;</b>
                                    <p><b>Status : </b>
                                        <?php if ($row['status_transaksi'] == 'batal') {
                                            echo '<span class="" style="color:red">Pesanan anda dibatalkan.</span>';
                                        } else { ?>
                                            <b style="color: #00ff00;"><?= ucfirst($row['status_transaksi']) ?>
                                            </b>
                                        <?php } ?>
                                    </p>
                                    <?php if ($row['status_transaksi'] == 'proses') {
                                        echo '<span class="">Pesanan sedang diproses</span>';
                                    } else if ($row['status_transaksi'] == 'validasi') {
                                        echo '<span class="badge badge-success">Pesanan anda sudah divalidasi</span>';
                                    } else if ($row['status_transaksi'] == "kirim") {
                                        echo '<b>No Resi : ' . (!empty($row['no_resi']) ? $row['no_resi'] . " <b>(" . strtoupper($row['kurir']) . ")</b>" : "No resi belum dimasukkan.") . '</b>';
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <!-- <table style="color:black;" class="table table-hover">
                            <tr>
                                <th>No</th>
                                <th>Kode Transaksi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                            <?php
                            $no = 1;
                            foreach ($transaksi as $row) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row['kode_transaksi'] ?></td>
                                    <td><?= $row['status_transaksi'] ?></td>
                                    <td>
                                        <?php if ($row['status_transaksi'] == 'batal') {
                                            echo '<span class="badge badge-danger">Pesanan anda dibatalkan.</span>';
                                        ?>
                                        <?php } else { ?>
                                            <?php if ($row['bukti_transfer'] == null && $row['status_transaksi'] != "batal") { ?>
                                                <form action="<?= base_url() ?>pembayaran" method="POST">
                                                    <input type="hidden" name="idtransaksi" value="<?= $row['id_transaksi'] ?>">
                                                    <input class="btn btn-success" type="submit" value="Konfirmasi">
                                                </form>
                                            <?php } else {
                                                if ($row['status_transaksi'] == 'proses') {
                                                    echo '<span class="badge badge-success">Pesanan sedang diproses</span>';
                                                } else if ($row['status_transaksi'] == 'validasi') {
                                                    echo '<span class="badge badge-success">Pesanan anda sudah divalidasi</span>';
                                                } else {
                                                    echo '<b>No Resi : </b><span class="badge badge-success">' . $row['no_resi'] . '</span> <b>(' . strtoupper($row['kurir']) . ')</b>';
                                                }
                                            } ?>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table> -->
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

<script type="text/javascript">
    // $(document).ready(function() {
    //     $('.btntoggle').on('click', function() {
    //         alert('woi');
    //     });
    // });
    $('.collapsed').toggle();
    $(document).on('click', '.btntoggle', function(e) {
        e.preventDefault();
        var panel = $('#panel'+$(this).data('id'));
        // console
        panel.toggle('slow');
        // var aid = $(this).data('id');
        // alert(aid);

    });
    // document.querySelector('#btntoggle').addEventListener('click', function() {
    //     document.querySelector('.section.collapsible').classList.toggle('collapsed');
    // });
</script>