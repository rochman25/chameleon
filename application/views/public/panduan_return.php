
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
<!DOCTYPE html>
<html lang="en">
<title>Garansi</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Page content -->
<div class="w3-content" style="max-width:2000px;margin-top:0px;background: #020202;">

  <!-- Automatic Slideshow Images -->
    <img src="/assets/images/banner-garansi.jpg" style="width:100%">
  
  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">GARANSI</h2>
    <p class="w3-opacity"><i>Tukar size</i></p>
    <p class="w3-justify">Dalam transaksi online, kami menyadari besarnya resiko kesalahan dalam pemilihan size. Untuk itu kami menyediakan layanan penukaran ukuran yang bisa kamu manfaatkan apabila memilih produk yang salah, baik itu kekecilan atau kebesaran. Syaratnya sebagai berikut :</p>
    <br></br>
    <p class="w3-justify">• Pengembalian maksimal 3 hari setelah barang sampai</p>
    <p class="w3-justify">• Belum terkena wewangian</p>
    <p class="w3-justify">• Belum di pakai (kecuali di coba)</p>
    <p class="w3-justify">• Label masih utuh</p>
    <p class="w3-justify">• Setelah konfirmasi penukaran, pembeli harus mengirimkan resi dalam kurun waktu 1 x 24 jam untuk menjaga barang yang akan ditukar tetap tersedia</p>
    
    </div>
  </div>

<!-- Footer -->
<footer>
</footer>

</body>
</html>

<?php 
$this->load->view('public/footer');
?>
	