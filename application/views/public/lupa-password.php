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
        <div class="new-login" style="height:auto; margin-top:5%">
            <h1>Lupa Password</h1>
            <p>Masukkan email anda, kami akan mengirimkan link untuk mereset password anda.</p>
            <!-- <p>Belum punya akun Men’s Republic <strong>Daftar</strong></p> -->
            <p style="color: red"><b><?= $this->session->flashdata('pesan') ?></b></p>
            <form action="<?=base_url()?>user/home/lupa_password" method="post">
                <h2>Email</h2>
                <input type="email" name="email">
                <input type="submit" name="kirim" value="Kirim">
            </form>
        </div>
    </div>
</section>
<?php $this->load->view('public/footer'); ?>