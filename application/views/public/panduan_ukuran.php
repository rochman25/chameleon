
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
    <!-- SIZE JAS -->
    <h2 class="w3-wide">SIZE JAS</h2>
    <br></br>
    <img src="/assets/public/size_jas.jpg" style="width:100%">
    <br></br>
    <br></br>
    <br></br>
    <!-- SIZE KEMEJA -->
    <h2 class="w3-wide">SIZE KEMEJA</h2>
    <br></br>
    <img src="/assets/public/size_kemeja.jpg" style="width:100%">
    <br></br>
    <br></br>
    <br></br>
    <!-- SIZE CELANA -->
    <h2 class="w3-wide">SIZE CELANA</h2>
    <br></br>
    <img src="/assets/public/size_celana.jpg" style="width:100%">
    
    
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
	