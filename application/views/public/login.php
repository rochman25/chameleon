
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
<section id="content">
	<div class="new-login-register">
        <div class="new-register none">
            <h1>Daftar</h1>
            <p>Sudah punya akun Men’s Republic <strong>Masuk</strong></p>
            <form action="<?= base_url()?>daftar" method="post">
                <h2>Email</h2>
                    <input type="email" name="email">
                    <input type="submit" value="Daftar">
            </form>
        </div>
        <div class="new-login">
            <h1>Masuk</h1>
        <p>Belum punya akun Men’s Republic <strong>Daftar</strong></p>
        <p style="color: red"><b><?= $this->session->flashdata('pesan') ?></b></p>
        <form action="" method="post">
            <h2>Email</h2>
            <input type="email" name="email">
            <h2>Password</h2>
            <input type="password" name="password">
            <a class="forget-pass" href="#">Lupa Password ?</a>
            <input type="submit" name="kirim" value="Masuk">
        </form>
    </div>
</div>
	</section>
	<?php $this->load->view('public/footer'); ?>
	