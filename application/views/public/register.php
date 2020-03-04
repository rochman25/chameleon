
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
		
	<div class="confirm-payment-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-xs-12">
                    <div class="wrapper">
                        <h1>Buat Akun Baru</h1>
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2>Email</h2>
                                    <?php if($email == null || empty($email)){?>
                                        <input type="email" placeholder="Email" name="email" value="" required>
                                    <?php
                                    }else{
                                        ?>
                                        <input type="email" placeholder="Email" name="email" value="<?= $email?>" required>
                                        <?php
                                    }?>
                                    
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2>Username</h2>
                                    <input type="text" placeholder="Nama Depan" name="username" required>
                                </div>
                            </div>
<!-- 
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2>Nama Belakang</h2>
                                    <input type="text" placeholder="Nama Belakang" name="last_name" required>
                                </div>
                            </div> -->

                            <!-- <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2>Nomor Telepon</h2>
                                    <input type="text" placeholder="Nomor Telepon" name="phone" required>
                                </div>
                            </div> -->

                            <!-- <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2>Tanggal Lahir</h2>
                                    <input type="text" id="birth_date" placeholder="YYYY-MM-DD (e.g: 1995-04-23)" name="birth_date" required readonly>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2>Password</h2>
                                    <input type="password" placeholder="Password" name="password" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <h2>Confirm Password</h2>
                                    <input type="password" placeholder="Confirm Password" name="password_confirmation" required>
                                </div>
                            </div>

                            <!-- <h2>Data Alamat</h2>
                            <div class="address_container" style="padding: 20px; border:1px solid #CCCCCC; margin-bottom: 20px;">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Negara</h2>
                                        <select id="country" name="country" required>
                                            <option value="0">Indonesia</option>
                                        </select>
                                    </div>
                                </div> -->

                                <!-- <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2 id="label-province">Provinsi</h2>
                                        <select id="province" name="province" required>
                                            <option value="">Pilih Provinsi</option>
                                                <option value="1-Bali">Bali</option>
                                                <option value="1-Bali">Bali</option>
                                                <option value="1-Bali">Bali</option>
                                                <option value="1-Bali">Bali</option>
                                                <option value="2-Bangka Belitung">Bangka Belitung</option>
                                                <option value="3-Banten">Banten</option>
                                                <option value="4-Bengkulu">Bengkulu</option>
                                                <option value="5-DI Yogyakarta">DI Yogyakarta</option>
                                                <option value="6-DKI Jakarta">DKI Jakarta</option>
                                                <option value="7-Gorontalo">Gorontalo</option>
                                                <option value="8-Jambi">Jambi</option>
                                                <option value="9-Jawa Barat">Jawa Barat</option>
                                                <option value="10-Jawa Tengah">Jawa Tengah</option>
                                                <option value="11-Jawa Timur">Jawa Timur</option>
                                                <option value="12-Kalimantan Barat">Kalimantan Barat</option>
                                                <option value="13-Kalimantan Selatan">Kalimantan Selatan</option>
                                                <option value="14-Kalimantan Tengah">Kalimantan Tengah</option>
                                                <option value="15-Kalimantan Timur">Kalimantan Timur</option>
                                                <option value="16-Kalimantan Utara">Kalimantan Utara</option>
                                                <option value="17-Kepulauan Riau">Kepulauan Riau</option>
                                                <option value="18-Lampung">Lampung</option>
                                                <option value="19-Maluku">Maluku</option>
                                                <option value="20-Maluku Utara">Maluku Utara</option>
                                                <option value="21-Nanggroe Aceh Darussalam (NAD)">Nanggroe Aceh Darussalam (NAD)</option>
                                                <option value="22-Nusa Tenggara Barat (NTB)">Nusa Tenggara Barat (NTB)</option>
                                                <option value="23-Nusa Tenggara Timur (NTT)">Nusa Tenggara Timur (NTT)</option>
                                                <option value="24-Papua">Papua</option>
                                                <option value="25-Papua Barat">Papua Barat</option>
                                                <option value="26-Riau">Riau</option>
                                                <option value="27-Sulawesi Barat">Sulawesi Barat</option>
                                                <option value="28-Sulawesi Selatan">Sulawesi Selatan</option>
                                                <option value="29-Sulawesi Tengah">Sulawesi Tengah</option>
                                                <option value="30-Sulawesi Tenggara">Sulawesi Tenggara</option>
                                                <option value="31-Sulawesi Utara">Sulawesi Utara</option>
                                                <option value="32-Sumatera Barat">Sumatera Barat</option>
                                                <option value="33-Sumatera Selatan">Sumatera Selatan</option>
                                                <option value="34-Sumatera Utara">Sumatera Utara</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2 id="label-city">Kota</h2>
                                        <select id="city" name="city" required></select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2 id="label-district">Kecamatan</h2>
                                        <select id="district" name="district" required></select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Alamat Lengkap</h2>
                                        <textarea name="address" required></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <h2>Kode Pos</h2>
                                        <input type="text" name="postal" required></input>
                                    </div>
                                </div> -->

                            </div>

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xs-12">
                                    <input type="submit" name="kirim" value="REGISTER">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
	</section>
    <?php 

$this->load->view('public/footer');
?>
	