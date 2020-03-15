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
        <h1>Pembayaran</h1>
        <div class="left-right">

            
            <div class="right-side">
                <div class="list-transaction page">
                    <h1>Detail Transaksi</h1>
                    <table style="color:black;" class="table table-hover">
                        <tr>
                            <th>No</th>
                            <th>Kode Transaksi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                       
                    </table>
                    <form action="<?= base_url()?>prosespembayaran" method="POST">
                        <input type="hidden" name="idtransaksi" value=""/>
                        <input type="file" name="bukti"/>
                    </form>
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

