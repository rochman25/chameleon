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

			<div class="container">
				<section>
                <form action="" method="post">
                <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2>Atas Nama</h2>
                                    <input type="password" placeholder="text" name="password" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2></h2>
                                    <input type="password" placeholder="text" name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2>Catatan </h2>
                                    <textarea name="catatan" class="notes"></textarea>
                                </div>
                            </div>
                 
                    <input type="submit" name="kirim" value="BELI">
                </form>
				</section>
			</div>

</section>

<?php
$this->load->view('public/footer');
?>

