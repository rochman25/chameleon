
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
<div class="w3-content" style="max-width:2000px;margin-top:0px">

  <!-- Automatic Slideshow Images -->
    <img src="" style="width:100%">
  
  <!-- The Band Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px;margin-bottom: 27px;" id="band">
    <!-- SIZE Jas -->
    <p class="w3-justify" style="display: flex;font-size: 27px;font-weight: 700;justify-content: center;">SIZE JAS</p>
    <img src="/assets/public/size_jas.jpg" style="width:100%;border-radius: 18px;border: 1px solid #ccc;">
    <br></br>
    <br></br>
    <br></br>
    <!-- SIZE KEMEJA -->
    <p class="w3-justify" style="display: flex;font-size: 27px;font-weight: 700;justify-content: center;">SIZE KEMEJA</p>
    <img src="/assets/public/size_kemeja.jpg" style="width:100%;border-radius: 18px;border: 1px solid #ccc;">
    <br></br>
    <br></br>
    <br></br>
    <!-- SIZE CELANA -->
    <p class="w3-justify" style="display: flex;font-size: 27px;font-weight: 700;justify-content: center;">SIZE CELANA</p>
    <img src="/assets/public/size_celana.jpg" style="width:100%;border-radius: 18px;border: 1px solid #ccc;">
    
    
    </div>
  </div>

<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
</footer>

</body>
</html>

<?php 
$this->load->view('public/footer');
?>
	