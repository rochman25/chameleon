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
                    <div class="title">Catatan untuk Chameleon cloth (optional)</div>
                    <textarea name="catatan" class="notes"></textarea>
                    <input type="submit" name="kirim" value="BELI">
                </form>
				</section>
			</div>

</section>

<?php
$this->load->view('public/footer');
?>

