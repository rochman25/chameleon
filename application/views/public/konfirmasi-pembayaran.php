<?php
$this->load->view('public/header');
$this->load->view('public/heading');
?>
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
<div class="overlay-desktop"></div>

<!-- header mobile -->
<?php
$this->load->view('public/m_heading');
$this->load->view('public/cart');
?>
<section id="content">

    <div class="dashboard-user">
        <div class="background-layout"></div>
        <div class="container">
            <h1>Rincian Pembayaran</h1>
            <div class="left">
                <?= $this->session->flashdata('pesan') ?>
                <!-- <div class="left-side" style="margin-left:0px; height:auto">
                    <div style="margin:10px">
                        <h3 style="color:black !important;">Info Pembayaran</h3>
                        <p style="color:black !important;">Pembayaran dapat dikirim ke nomor rekening berikut: </p>
                        <p style="color:black !important;"><b>BRI</b></p>
                        <p style="color:black !important;"><b> - 677901015573536</b> An <b>Naufal Hunaif</b></p>
                        <p style="color:black !important;"></p>
                        <p style="color:black !important;"><b>Mandiri</b></p>
                        <p style="color:black !important;"><b> - 1800004486124</b> An <b>Naufal Hunaif</b></p>
                        <p style="color:black !important;"></p>
                        <p style="color:black !important;">Sebesar <b>Rp.<?= number_format($data->total_harga, 0, ",", ".") ?></b></p>
                    </div>
                </div> -->
                <div class="left-side">
                    <div class="card">
                        <div class="card-row">
                            <div class="list-transaction page" style="color: white;">
                                <p>
                                    Pesanan anda <b><?= $data->kode_transaksi ?></b> telah dipesan Jumlah yang perlu dibayar <b>Rp <?= number_format($data->total_harga, 0, ",", ".") ?></b>
                                </p>
                                <p>
                                    Terimakasih atas pesanan anda! Pesanan akan diproses setelah anda melakukan pembayaran. Mohon membayar sebelum <b><?= date("d/m/Y H:i:s",strtotime($data->waktu_transaksi."+1 days")) ?></b> (WIB) di ATM atau internet banking manapun ke nomor rekening dibawah ini : 
                                </p>
                                <p>
                                    <b>
                                        BRI 677901015573536 A/N NAUFAL HUNAIF
                                    </b><br>
                                    <b>
                                        Mandiri 1800004486124 A/N NAUFAL HUNAIF
                                    </b>
                                </p>
                                <!-- <h1>Detail Transaksi</h1> -->
                                <!-- <table style="color:black;" class="table table-hover">
                                    <tr>
                                        <th>Kode Transaksi</th>
                                        <th>Harga</th>
                                        <th>Ongkir</th>
                                    </tr>
                                    <tr>
                                        <td><?= $data->kode_transaksi; ?></td>
                                        <td>Rp <?= $data->total_harga - $data->total_ongkir; ?></td>
                                        <td>Rp <?= $data->total_ongkir; ?></td>
                                    <tr>
                                </table> -->
                                <form action="<?= base_url() ?>prosespembayaran" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="idtransaksi" value="<?= $data->id_transaksi; ?>" />
                                    <label style="color:white !important;" for="myfile">Bukti pembayaran <b style="color: orange;">(extensi : jpg | jpeg | png / max size: 1MB)</b> </label>
                                    <input style="color:white !important;" type='file' name='bukti' accept='image/*' />

                                    <input type="submit" value="Konfirmasi Pembayaran">
                                </form>
                            </div>
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