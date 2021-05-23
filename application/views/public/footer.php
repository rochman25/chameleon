<footer class="footer nav-footer" style="background-color: black;">
  <div class="container">
    <div class="nav-footer-item nav col-lg-3 col-md-4 col-sm-6">
      <h4 style="margin-top: 0; 
                  font-size: 14px;
	                font-weight: 600;
	                font-style: normal;
	                font-stretch: normal;
	                line-height: normal;
	                letter-spacing: normal;
	                color: #fff;
	                text-transform: uppercase;">koleksi</h4>
      <ul>
        <li><a href="<?= base_url() ?>produk/jas">Jas</a></li>
        <li><a href="<?= base_url() ?>produk/kemeja">Kemeja</a></li>
        <li><a href="<?= base_url() ?>produk/celana">Celana</a></li>
      </ul>
    </div>
    <div class="nav-footer-item nav col-lg-3 col-md-4 col-sm-6">
      <h4 style="margin-top: 0; 
                  font-size: 14px;
	                font-weight: 600;
	                font-style: normal;
	                font-stretch: normal;
	                line-height: normal;
	                letter-spacing: normal;
	                color: #fff;
	                text-transform: uppercase;">
        Kontak &amp; Alamat</h4>
      <ul>
        <li>CHAMELEON CLOTH</p>
        <li>Jl. Patimuan - Kedungreja, Cinyawang, Rt.02/03, Kec.Patimuan - Cilacap 53264</li>
        <li>LINE ID : chameleoncloth</li>
        <li>Nomor : 083116200500</li>
        <li>Email : cs@chameleoncloth.co.id</li>
        </li>
    </div>
    <div class="nav-footer-item nav col-lg-3 col-md-4 col-sm-6">
      <h4 style="margin-top: 0; 
                  font-size: 14px;
	                font-weight: 600;
	                font-style: normal;
	                font-stretch: normal;
	                line-height: normal;
	                letter-spacing: normal;
	                color: #fff;
	                text-transform: uppercase;">Layanan</h4>
      <ul>
        <li><a href="<?= base_url() ?>panduan/retur">Garansi</a></li>
        <li><a href="<?= base_url() ?>panduan/pemesanan">Panduan Pemesanan</a></li>
        <li><a href=" <?= base_url() ?>panduan/ukuran">Panduan Ukuran</a> </li>
      </ul>
    </div>
    <div class="nav-footer-item nav col-lg-3 col-md-4 col-sm-6">
      <div class=" pull-right-footer">
        <div class="social">
          <div class="socialmedia-item">
            <a href="https://facebook.com/chameleonclothindonesia" target="blank"><i class="fa fa-facebook fa-2x"></i></a>
          </div>
          <div class="socialmedia-item">
            <a href="https://mobile.twitter.com/chameleoncloth_" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
          </div>
          <div class="socialmedia-item">
            <a href="https://instagram.com/chameleoncloth.co.id" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
          </div>
          <div class="socialmedia-item">
            <a href="https://m.youtube.com/channel/UCDdDpkjX-TVzufeMUq3D0Hw" target="_blank"><i class="fa fa-youtube fa-2x"></i></a>
          </div>
          <div class="socialmedia-item">
            <a href="https://api.whatsapp.com/send?phone=6283116200500" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container copyright">
    � All Right Reserved</a>
  </div>
</footer>
<script type="text/javascript">
  $(window).on('load', function() {
    $(".svg-container").fadeOut("slow");
  });
  jQuery(".nav-footer h4").click(function() {
    jQuery(this).parent(".nav").toggleClass("open");
  });
</script>
</body>

</html>