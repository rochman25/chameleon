
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
		
        <div class="dashboard-user">
    <div class="background-layout"></div>
    <div class="container">
        <h1>MY PROFILE</h1>
        <div class="left-right">

            <div class="left-side">
<i class="svg-icon svg_icon__dashboard_pencil" onclick="window.location.href = 'https://www.mensrepublic.id/dashboard/profile';">
</i>
<img src="https://www.mensrepublic.id/assets/images/dashboard/default-avatar.png" alt="">
<h1>Trian Damai</h1>
<span>Joined 13 Februari 2020</span>
<hr>
<ul class="info-profile">
    <li> <i class="svg-icon svg_icon__dashboard_mail"></i> <span><a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="1876776e71767c79766d6a7e2920587f75797174367b7775">[email&#160;protected]</a> </span>  </li>
    <li> <i class="svg-icon svg_icon__dashboard_gift"></i> <span>16 Sepember 1998 </span>  </li>
    <li> <i class="svg-icon svg_icon__dashboard_phone"></i> <span>081226809435 </span>  </li>
    <li class="alamat"> <i class="svg-icon svg_icon__dashboard_pin"></i>
        <span>
                                                    Jl. Tentara Pelajar No.23, Kembaran Kulon, Kec. Purbalingga, Kabupaten Purbalingga, Jawa Tengah 53319
Purbalingga<br>
                Purbalingga<br>
                Purbalingga<br>
                Jawa Tengah
                        </span>
    </li>
</ul>
<button class="expand">
    <i class="svg-icon svg_icon__dashboard_chevron"></i>
</button>
<a href="https://www.mensrepublic.id/logout" class="logout"> <i class="svg-icon svg_icon__dashboard_logout"></i> <span>logout</span> </a>
</div>
            <div class="right-side">
                <div class="list-transaction page">
                    <h1>Daftar Transaksi</h1>
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
</section>    <?php 

$this->load->view('public/footer');
?>
	