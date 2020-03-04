
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
	<div id="about">
		<div class="about-content">
			<div class="container">
				<section>
					<h1>Panduan Ukuran</h1>
					<h2><p><img src="<?= base_url()?>assets/images/bg_all/panduan_warna.jpg" data-filename="info web-02.jpg" style="width: 1102px;"><br></p></h2>	
				</section>
			</div>
		</div>
		
		<div class="about-card">
		</div>
	</div>
</section>
<?php 
$this->load->view('public/footer');
?>
	