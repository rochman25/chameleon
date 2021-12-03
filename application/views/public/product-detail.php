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
    <div id="product" data-product-nama="<?= $produk->nama_produk; ?>" data-product-id="<?= $produk->id_produk; ?>">
        <div class="container">
            <div class="row" id="row_produk">
                <!--  -->
                <div class="col-lg-5 col-md-5 gallery-container" data-image-count="7">
                    <div id="containergallery" class="image-gallery">
                        <img id="elevate-zoom" class="img-responsive" src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[0]; ?>" data-zoom-image="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[0]; ?>" />
                    </div>
                    <div id="containervideo" class="image-gallery">
                        <iframe src="<?= $produk->video_link; ?>" style="border:0;height:400px;width:400px">

                        </iframe>
                    </div>
                    <div class="image-thumbnail owl-carousel clearfix">
                        <?php foreach ($thumbnail as $p) { ?>
                            <div class="image-thumbnail--list">
                                <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>" data-zoom-image="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>" />
                            </div>
                        <?php } ?>

                    </div>

                </div>

                <!--  -->

                <div id="containermgallery" class="image-gallery-mobile owl-carousel">

                    <?php foreach ($thumbnail as $p) { ?>
                        <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>" />
                    <?php } ?>

                </div>

                <!--  -->
                <div id="containermvideo" class="image-gallery-mobile owl-carousel">
                    <iframe src="<?= $produk->video_link; ?>" style="border:0;height:400px;width:100%;align-content: center;margin-left:50px;">

                    </iframe>

                </div>
                <div class="image-gallery-mobile owl-carousel">


                </div>

                <!--  -->
                <div class="col-lg-7 col-md-7 col-xs-12">

                    <div class="product-ribbon clearfix">
                    </div>
                    <div class="product-info" style="margin-left:10px">
                        <div class="row">
                            <div class="column" style="width: 100%;margin-bottom: 15px;">
                                <div class="column" style="float: left;width: 100%;margin-top:0px;margin-right:10%;text-align: center;display: flex;align-items: center;">
                                    <?php $label_p = explode(",", $produk->label_produk);
                                    foreach ($label_p as $key_l => $val_l) {
                                    ?>
                                        <div class="badge_label_<?php echo str_replace(" ", "_", $val_l) ?>" <?php if ($key_l != 0) { ?> style="margin-top:auto;" <?php } ?>>
                                            <p style="margin-top:0px; font-size:xx-small; font-weight:bold"><?= strtoupper($val_l) ?></p>
                                        </div>
                                    <?php } ?>

                                </div>
                            </div>
                            <div class="column" style="width: 100%;">
                                <h1 style="margin-top:0px;"><?= $produk->nama_produk; ?></h1>
                                <h2 style="font-size: 0;line-height: none;">
                                    <div class="row" style="margin-right: 0;margin-left: 0px;">
                                        <?php if ($produk->diskon_produk != 0) { ?>
                                            <div class="column" style="width: auto; margin-right:10px">
                                                <div class="price_before" style="font-size: 20px;color:#767171"> Rp <?= number_format($produk->harga_produk, 0); ?></div>
                                            </div>
                                            <div class="column" style="width: auto;">
                                                <div class="price_after">
                                                    <p class="value" style="font-size: 20px; margin-top: 0;">Rp <?= number_format($produk->harga_produk - (($produk->diskon_produk / 100) * $produk->harga_produk), 0); ?></p>
                                                    <!-- <span class="value" style="font-size: 16px; margin-top: 0;">Rp <?= number_format($produk->harga_produk - (($produk->diskon_produk / 100) * $produk->harga_produk), 0); ?></span> -->
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <div class="column">
                                                <div class="price_after">
                                                    <span class="value">Rp <?= number_format($produk->harga_produk, 0); ?></span>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="column" style="width: auto;">
                                            <div class="button-action" style="display: none;margin-top:0">
                                                <?php
                                                if (isset($this->session->userdata['user_data'])) {
                                                ?>
                                                    <button class="addToCart">
                                                        <i class="svg-icon svg_icon__pdp_cart"></i> Beli
                                                    </button>
                                                <?php
                                                } else {
                                                ?>
                                                    <a href="<?= base_url(); ?>login" style="padding:15px;" class="addToCart">
                                                        <i class="svg-icon svg_icon__pdp_cart"></i> Beli
                                                    </a>
                                                <?php
                                                } ?>
                                                <span class="out-of-stock" style="display:none">HABIS MEN</span>
                                            </div>
                                        </div>
                                    </div>
                                </h2>
                            </div>

                        </div>
                        <br>
                        <div class="row">
                            <span>Ukuran :</span>
                            <div id="size" class="size-product">
                                <ul class="clearfix">
                                    <?php foreach ($size as $s) {
                                        foreach ($size_stock as $index => $item) {
                                            if ($item->size == $s && $item->stock > 0) {
                                    ?>
                                                <li onclick="setUkuran('<?= $s; ?>');" id="produk<?= $s ?>" style="color:black !important;" class="size">
                                                    <span><?= $s; ?></span>
                                                </li>
                                    <?php
                                            }
                                        }
                                    } ?>

                                </ul>
                            </div>
                            <a href="#" data-toggle="modal" data-target="#findMyFitModal" style="color: black;text-decoration: none;display: flex;align-content: center;justify-content: flex-start;align-items: center;padding-top: 20px;">
                                <div class="" <span="" style="
                            padding-top: 5px;
                            background: #5a5a5a;
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            padding-left: 15px;
                            padding-right: 15px;
                            color: white;
                            align-content: center;
                            padding-bottom: 5px;
                            border-radius: 15px;
                            ">Find My Fit</div>
                            </a>

                            <br>
                            <br>
                            <span>Jumlah :</span>
                            <div id="ukuran" class="size-jumlah">
                                <ul class="clearfix">
                                    <li onclick="ubahjml(2);" class="size">
                                        <span>-</span>
                                    </li>
                                    <li>
                                        <!--<span style="color:black;" id="jumlah" value="1">1</span>-->
                                        <span id="value" value="0">0
                                        </span>
                                        <!--<p id="jumlah">0</p>-->
                                    </li>
                                    <li onclick="ubahjml(1);" class="size">
                                        <span>+</span>
                                    </li>

                                </ul>
                            </div>


                            <div class="button-action">
                                <?php
                                if (isset($this->session->userdata['user_data'])) {
                                ?>
                                    <button class="addToCart">
                                        <i class="svg-icon svg_icon__pdp_cart"></i> Beli
                                    </button>

                                <?php
                                } else {

                                ?>
                                    <a href="<?= base_url(); ?>login" style="padding:15px;" class="addToCart">
                                        <i class="svg-icon svg_icon__pdp_cart"></i> BELi
                                    </a>

                                <?php
                                } ?>
                                <span class="out-of-stock" style="display:none">HABIS MEN</span>
                            </div>

                            <div class="product-order">
                            </div>
                            <ul class="nav nav-tabs">
                                <li class="active" data-target="product-deskripsi">
                                    <a style="color: #5a5a5a;background-color:none;" href="javascript:;">Deskripsi</a>
                                </li>
                                <li class="active" data-target="product-deskripsi">
                                    <a href="#" data-toggle="modal" data-target="#sizeModal" style="color: red;font-weight: bold;/* text-decoration: underline; */-top:10px;">Size Chart</a></a>
                                </li><!-- <li data-target="review"><a href="javascript:;">Rating dan Ulasan ( 5/5 )</a></li> -->
                            </ul>
                            <div class="tab-content">
                                <div class="product-deskripsi">
                                    <font color="5a5a5a">
                                        <?php if (empty($produk->deskripsi_produk)) {
                                            echo "<p>Belum ada deskripsi</p>";
                                        } else {
                                            echo nl2br($produk->deskripsi_produk);
                                        } ?>
                                </div>
                                <div class="review">
                                </div>
                            </div>
                            <?php
                            if (!empty($subProduk)) {
                                foreach ($subProduk as $key => $item) { ?>
                                    <div class="left-right" hidden>
                                        <div class="right-side">
                                            <div class="card" style="margin-right:10px">
                                                <div class="card-row">
                                                    <div class="row" style="margin-right: 0px;margin-left: 0px;">
                                                        <div class="column">
                                                            <input type="radio" name="addon" id="sub<?= $key ?>" value="<?= $item['id_sub_produk'] ?>"> <label for="sub<?= $key ?>" style="margin-left: 10px;"><?= $item['nama_sub'] ?></label>
                                                        </div>
                                                        <div class="column">
                                                            <b id="harga<?= $key ?>"><?= "+ Rp " . number_format($item['harga_sub'], 2) ?></b>
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-right: 0px;margin-left: 0px;">
                                                        <div class="column">
                                                            <p><b>Ukuran</b></p>
                                                            <div id="size" class="size-product2">
                                                                <ul class="clearfix" style="font-size: 10px;">
                                                                    <?php
                                                                    $size = explode(",", $item['size_sub']);
                                                                    foreach ($size as $s) {
                                                                    ?>
                                                                        <li onclick="setUkuran2('<?= $s; ?>');" id="sub<?= $s ?>" style="color:black !important;" class="size ">
                                                                            <span><?= $s; ?></span>
                                                                        </li>
                                                                    <?php
                                                                    } ?>

                                                                </ul>
                                                            </div>

                                                        </div>
                                                        <div class="column">
                                                            <p><b>Jumlah</b></p>
                                                            <div id="ukuran" class="size-product">
                                                                <ul class="clearfix" style="font-size: 10px;">
                                                                    <li onclick="ubahjml2(2,<?= $item['stok_sub'] ?>,<?= $item['id_sub_produk'] ?>);" class="size2 active ">
                                                                        <span>-</span>
                                                                    </li>
                                                                    <li class="size  ">
                                                                        <span style="color:black;" id="valuesub<?= $item['id_sub_produk'] ?>">1</span>
                                                                    </li>
                                                                    <li onclick="ubahjml2(1,<?= $item['stok_sub'] ?>,<?= $item['id_sub_produk'] ?>);" class="size2 active ">
                                                                        <span>+</span>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>

            <div id="kosong" class="card" style=" width: 60%; background: #ffffff;
                                                    border: 1px solid #ccc;
                                                    border-radius: 8px;
                                                    padding: 32px;
                                                    box-sizing: border-box;
                                                    text-align: center;
                                                    position: inherit;
                                                    display: grid;
                                                    justify-content: center;
                                                    margin-left: 20%;
                                                    margin-right: 20%;">
                <p style="font-size: 27px;">SORRY!</p>
                <p style="padding-bottom: 27px;">Stock product habis, apakah mau pre order?</p>
                <a href="https://wa.me/message/367KS3T7RIJXC1" style="padding: 7px;background: #0077ed;padding-left: 27px;padding-right: 27px;border-radius: 17px;margin: 7px;">
                    <i class=""></i><span style="color: white;">Ya</span>
                </a>
                <a href="https://chameleoncloth.co.id/user/home" style="padding: 7px;background: #5a5a5a;padding-left: 27px;padding-right: 27px;border-radius: 17px;margin: 7px;">
                    <i class=""></i><span style="color: white;">Tidak</span>
                </a>
            </div>

        </div>
    </div>
</section>

<!-- Modal -->
<!--<div class="modal fade" id="findMyFitModal" role="dialog">-->
<!--  <div class="modal-dialog">-->

<!-- Modal content-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header">-->
<!--        <button type="button" class="close" data-dismiss="modal">&times;</button>-->
<!--        <h4 class="modal-title">Find My Fit</h4>-->
<!--      </div>-->
<!--      <div class="modal-body">-->
<!--        <div class="form-group">-->
<!--                                  <div class="row">-->
<!--                                      <div class="col-lg-12">-->
<!--                                          <label>Berat</label>-->
<!--                                          <div class="input-group">-->
<!--                                              <input type="text" name="berat" id="berat" class="">-->
<!--                                          </div>-->
<!--                                      </div>-->
<!--                                  </div>-->
<!--                              </div>-->
<!--      </div>-->
<!--      <div class="modal-footer">-->
<!--        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
<!--      </div>-->
<!--    </div>-->

<!--  </div>-->
<!--</div>-->

<div class="modal fade" id="findMyFitModal" tabindex="-1" role="dialog" aria-labelledby="modalFindMyFit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;font-weight: 900;font-size: 20px;text-align: center;">Fit Advisor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="reloadFindMyFit()" style="margin-top: -30px;font-size: xx-large;">
                    <span aria-hidden="true">&times;</span>
                </button>

                <button id="reloadFindMyFit" type="button" class="close" hidden>
                    <span>reloaad</span>
                </button>

            </div>
            <div class="modal-body">
                <!--<form action="<?= base_url() ?>admin/banner/ubah" method="POST" enctype="multipart/form-data">-->
                <div id="inputFit">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Berat</label>
                                    <div class="input-group" style="width: 100%;">
                                        <input class="form-control" type="text" name="berat" id="berat" style="color: black;" onkeypress="return onlyNumberKey(event)" value="0">
                                        Kg
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Tinggi</label>
                                    <div class="input-group" style="width: 100%;">
                                        <input class="form-control" type="text" name="tinggi" id="tinggi" style="color: black;" onkeypress="return onlyNumberKey(event)" value="0">
                                        Cm
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-whitesmoke br">
                        <button type="submit" id="cari" name="cari" class="btn btn-primary" onclick="findMyFit()">Cari</button>
                    </div>


                </div>

                <div id="pilihGambarDepan" style="display: none;">
                    <div style="height: 100%; width: 100%; display: block; margin: 10px; text-align: center;">
                        Pilih yang paling mirip dengan Badan Anda
                    </div>
                    <div class="row" id="imageDepan" style="height: 100%;width: 100%;display: flex;margin: 10px;text-align: center;padding-top: 50px;padding-bottom: 50px;">
                        <div style="width: 35%; margin: 10px;">
                            <a href="#" onclick="setGambarDepan('kurus');">
                                <img src="<?= base_url() ?>assets/fit_size/gambar_depan/kurus.svg" />
                            </a>
                            Kurus
                        </div>
                        <div style="width: 35%; margin: 10px;">
                            <a href="#" onclick="setGambarDepan('sedang');">
                                <img src="<?= base_url() ?>assets/fit_size/gambar_depan/sedang.svg" />
                            </a>
                            Sedang
                        </div>
                        <div style="width: 35%; margin: 10px;">
                            <a href="#" onclick="setGambarDepan('gemuk');">
                                <img src="<?= base_url() ?>assets/fit_size/gambar_depan/gemuk.svg" />
                            </a>
                            Gemuk
                        </div>
                    </div>
                </div>


                <div id="pilihGambarSamping" style="display: none;">
                    <div style="height: 100%; width: 100%; display: block; margin: 10px; text-align: center;">
                        Pilih yang paling mirip dengan Badan Anda
                    </div>

                    <div class="row" id="imageSamping" style="height: 100%;width: 100%;display: flex;margin: 10px;text-align: center;padding-top: 50px;padding-bottom: 50px;">
                        <div style="width: 35%; margin: 10px;">
                            <a href="#" onclick="setGambarSamping('tipis');">
                                <img src="<?= base_url() ?>assets/fit_size/gambar_samping/tipis.svg" />
                            </a>
                            Datar
                        </div>
                        <div style="width: 35%; margin: 10px;">
                            <a href="#" onclick="setGambarSamping('sedang');">
                                <img src="<?= base_url() ?>assets/fit_size/gambar_samping/sedang.svg" />
                            </a>
                            Rata - Rata
                        </div>
                        <div style="width: 35%; margin: 10px;">
                            <a href="#" onclick="setGambarSamping('buncit');">
                                <img src="<?= base_url() ?>assets/fit_size/gambar_samping/buncit.svg" />
                            </a>
                            Buncit
                        </div>
                    </div>
                </div>


                <div id="hasilFit" style="display: none;">
                    <div id="imageMyFit" class="image-gallery-mobile owl-carousel" style="width: 50%; height: 50%; display: block; margin-left: auto; margin-right: auto;">

                        <?php foreach ($thumbnail as $p) { ?>
                            <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>" style="display: flex; justify-content:center;" />
                        <?php } ?>

                    </div>
                    <br>
                    <div style="text-align: center;">
                        <h5>Ukuran paling cocok</h5>
                        <div class="card" <h3="" id="sizeMyFit" name="sizeMyFit" value="..." style="margin-left: 95px;margin-right: 95px;font-size: 30px;font-weight: 900;">XS</div>
                        <h5 style="font-size: 8px;font-weight: 100;padding-left: 30px;padding-right: 30px;padding-bottom: 20px;padding-top: 15px;">Ukuran yang kami rekomendasikan didasarkan pada bagaimana Desainer menginginkan produk ini agar pas dengan tubuh Anda.</h5>
                    </div>
                </div>

                <!--</form>-->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: black;">Size Chart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if ($produk->nama_kategori == "Celana") { ?>
                    <img src="<?= base_url() ?>assets/public/size_celana.jpg" width="100%">
                <?php } else if ($produk->nama_kategori == "Jas") { ?>
                    <img src="<?= base_url() ?>assets/public/size_jas.jpg" width="100%">
                <?php } else if ($produk->nama_kategori == "Kemeja") { ?>
                    <img src="<?= base_url() ?>assets/public/size_kemeja.jpg" width="100%">
                <?php } ?>
            </div>
        </div>
    </div>
</div>


<?php
$this->load->view('public/footer');
?>


<script type="text/javascript">
    $(window).on('load', function() {
        $(".svg-container").fadeOut("slow");
    });
</script>
<script type="text/javascript">
    var base_url = '<?= base_url() ?>';
    var def_jml = 0;
    var def_jml2 = 1;
    var def_Size = "";
    var def_Size2 = "";
    var def_SizeAdd = "";

    var resData = "";
    var add_on = "";
    var stok = '<?= $stok_produk; ?>';
    var harga = '<?= $produk->harga_produk ?>';
    // var harga = '<?= $produk->diskon_produk != 0 ? $produk->harga_produk - (($produk->diskon_produk / 100) * $produk->harga_produk) : $produk->harga_produk ?>';
    var diskon = '<?= $produk->diskon_produk ?>';

    var containervideo = document.getElementById('containervideo');
    var containergallery = document.getElementById('containergallery');
    var containermvideo = document.getElementById('containermvideo');
    var containermgallery = document.getElementById('containermgallery');
    containervideo.style.display = "none";
    containermvideo.style.display = "none";
    var ishide = true;
    var ismhide = true;
    var jml_barang = "0";
    var gambar_depan = "";
    var gambar_samping = "";
    var tinggi_normal = 170;
    var berat = 0;
    var tinggi = 0;

    var maxStock = 0;
    var sizeStock = <?= json_encode($size_stock); ?>

    function toggleVideo() {
        if (ishide) {
            containervideo.style.display = "none";
            containergallery.style.display = "block";


            ishide = false;
        } else {
            containervideo.style.display = "block";
            containergallery.style.display = "none";

            ishide = true;
        }
    }

    function toggleMVideo() {
        if (ismhide) {

            containermvideo.style.display = "none";
            containermgallery.style.display = "block";

            ismhide = false;
        } else {

            containermvideo.style.display = "block";
            containermgallery.style.display = "none";
            ismhide = true;
        }
    }

    function changeSizeS() {
        var S = document.getElementById('S');
        var M = document.getElementById('M');
        var L = document.getElementById('L');
        var XL = document.getElementById('XL');

        S.classList.add('active');
        M.classList.remove('active');
        L.classList.remove('active');
        XL.classList.remove('active');
        def_Size = "S";
    }

    function changeSizeM() {
        var S = document.getElementById('S');
        var M = document.getElementById('M');
        var L = document.getElementById('L');
        var XL = document.getElementById('XL');

        S.classList.remove('active');
        M.classList.add('active');
        L.classList.remove('active');
        XL.classList.remove('active');
        def_Size = "M";
    }

    function changeSizeL() {
        var S = document.getElementById('S');
        var M = document.getElementById('M');
        var L = document.getElementById('L');
        var XL = document.getElementById('XL');
        S.classList.remove('active');
        M.classList.remove('active');
        L.classList.add('active');
        XL.classList.remove('active');
        def_Size = "L";
    }

    function changeSizeXL() {
        var S = document.getElementById('S');
        var M = document.getElementById('M');
        var L = document.getElementById('L');
        var XL = document.getElementById('XL');
        XL.classList.add('active');
        S.classList.remove('active');
        M.classList.remove('active');
        L.classList.remove('active');
        XL.classList.add('active');
        def_Size = "XL";
    }

    function setUkuran(ukuran) {
        def_Size = ukuran;
        def_jml = 0;
        document.getElementById('value').innerHTML = 0;
        console.log(`defSize:${def_Size}`);
        sizeStock.map(function(item) {
            if (item.size == ukuran) {
                maxStock = item.stock;
            }
        });
        console.log(`maxStock:${maxStock}`);
        // console.log(`sizeStock:${JSON.parse(sizeStock)}`);
        // var id = document.getElementById(id)
        // id.classList.add('active');
    }

    function setUkuran2(ukuran) {
        def_Size2 = ukuran;
        // var id = document.getElementById(id)
        // id.classList.add('active');
    }

    // function setUkuran(ukuran) {
    //     def_Size = ukuran;
    //     // var id = document.getElementById(id)
    //     // id.classList.add('active');
    // }

    // /var size_view = 
    function ubahjml(state) {
        if (def_Size) {
            jml_barang = document.getElementById('value');
            var number = jml_barang.innerHTML;
            def_jml = number;

            var value = document.getElementById("value").innerHTML;
            if (def_jml == 0) {
                if (state == "1") {
                    number++;
                    jml_barang.innerHTML = number;
                } else {
                    number = "0";
                }

            } else {
                if (state == "1") {
                    console.log(`compare`,def_jml<parseInt(maxStock));
                    if (def_jml < parseInt(maxStock)) {
                        number++;
                    }
                } else {
                    number--;
                }
                jml_barang.innerHTML = number;
            }
            def_jml = number;
            console.log(`withStok`,def_jml, stok);
        } else {
            alert("Harap Pilih Ukuran Terlebih dahulu.")
        }
    }

    function ubahjml2(state, jml, id) {
        console.log(state);
        // if (def_Size2) {
        if (state == 1) {
            if (def_jml2 < jml) {
                def_jml2++
            } else {
                //  def_jml = stok;
            }
        } else {
            if (def_jml2 <= 1) {
                def_jml2 = 1;
            } else {
                def_jml2--;
            }
        }
        document.getElementById('valuesub' + id).innerHTML = def_jml2;
        // } else {
        //     alert("Harap Pilih Ukuran Terlebih dahulu.")
        // }
    }

    $(document).ready(function() {
        console.log(stok);

        $(".size-product2 ul li").on("click", function() {
            $(".size-product2 ul li").removeClass("active"),
                $(this).addClass("active");
        });

        $(".size-jumlah ul li").on("click", function() {
            $(".size-jumlah ul li").removeClass("active"),
                $(this).addClass("active");
        });


        $(".addToCart").on("click", function() {
            var id_cart = "";
            console.log("==", def_jml);

            console.log("==", def_SizeAdd);

            // if(def_SizeAdd == def_Size){

            // } else {

            // }

            def_SizeAdd = def_Size;
            if (def_SizeAdd != "" && def_jml != 0) {
                var id_prod = $("#product").data("product-id");
                var nama_barang = $("#product").data("product-nama");
                console.log("idp == ", id_prod);
                $.ajax({
                    url: base_url + "user/Home/add_cart",
                    type: "POST",
                    data: {
                        id_cart: '<?php if (!$id_cart == null || !$id_cart == "") {
                                        echo $id_cart->id_cart;
                                    } else {
                                        echo "";
                                    } ?>',
                        id_pengguna: '<?php if (empty($this->session->userdata['user_data']['id'])) {
                                            echo "";
                                        } else {
                                            echo $this->session->userdata['user_data']['id'];
                                        } ?>',
                        id_produk: '<?= $produk->id_produk; ?>',
                        qty: def_jml,
                        img: '<?= base_url() . 'assets/uploads/thumbnail_produk/' . $thumbnail[0]; ?>',
                        nama_barang: nama_barang,
                        harga: def_jml * harga,
                        real_harga: harga,
                        size: def_Size,
                        diskon: diskon
                    }
                }).done(function(t) {
                    var res = JSON.parse(t);
                    // resData = res;
                    // console.log("res ===== ", resData);

                    if (true == res.success) {
                        id_cart = res.id_cart;
                        add_on = $('input[name="addon"]:checked').val();
                        if (add_on) {
                            // alert(add_on);
                            // id_cart = "Invoice-202003212308-002";
                            var idVal = $('input[name="addon"]:checked').attr("id");
                            var harga_sub = $('#harga' + idVal.replace("sub", "")).text().replace("+ Rp", "")
                            // alert(harga_sub);
                            var nama_sub = $("label[for='" + idVal + "']").text()
                            $.ajax({
                                url: base_url + "user/Home/add_cart",
                                type: "POST",
                                data: {
                                    id_cart: id_cart,
                                    id_pengguna: '<?php if (empty($this->session->userdata['user_data']['id'])) {
                                                        echo "";
                                                    } else {
                                                        echo $this->session->userdata['user_data']['id'];
                                                    } ?>',
                                    id_produk: '<?= $produk->id_produk; ?>',
                                    id_sub_produk: add_on,
                                    qty: 0,
                                    real_harga: harga,
                                    img: '<?= base_url() . "assets/images/add_on.png" ?>',
                                    nama_barang: nama_sub,
                                    harga: def_jml2 * parseFloat(harga_sub),
                                    size: def_Size2,
                                }
                            }).done(function(t) {
                                var res = JSON.parse(t);
                                console.log("myres == ", res);
                                if (true == res.success) {
                                    id_cart = res.id_cart;
                                    $(".cart-wrapper").append(res.element);
                                    var i = parseInt($(".icon-cart").find(".notif").html());
                                    $("#totalharga").html("Rp " + res.total);
                                    $(".menu-cart").addClass("open"),
                                        $(".overlay-desktop").addClass("active")
                                }
                            }).fail(function(t) {
                                console.log(t)
                                location.reload()
                            });


                        }

                        if (res.status == "success") {
                            // $(".cart-wrapper").append(res.element);
                            // var i = parseInt($(".icon-cart").find(".notif").html());
                            // $("#totalharga").html("Rp "+res.total);

                            // $(".menu-cart").addClass("open"),
                            // $(".overlay-desktop").addClass("active")

                            $(".cart-wrapper").empty();

                            var base_url = '<?= base_url() ?>';
                            $.get({
                                url: base_url + "user/Home/get_cart?id=<?php if (!$id_cart == null || !$id_cart == "") {
                                                                            echo $id_cart->id_cart;
                                                                        } else {
                                                                            echo "";
                                                                        };
                                                                        ?>",
                                type: "GET",
                            }).done(function(t) {
                                var res = JSON.parse(t);

                                console.log(res);
                                // if(res.success =="success"){
                                if (res.data.length >= 0) {
                                    var harga = 0;
                                    var notif = res.data.length;
                                    //	console.log("ini"+notif);
                                    res.data.forEach(myFunction);

                                    function myFunction(item, index) {
                                        //	console.log(item.element);
                                        $(".cart-wrapper").append(item.element);

                                        $(".icon-cart").find(".notif").html(notif);
                                        $("#totalharga").html("Rp " + res.total);

                                    }
                                }

                            }).fail(function(t) {
                                console.log(t)
                                // location.reload()
                            })

                            var i = parseInt($(".icon-cart").find(".notif").html());
                            $(".menu-cart").addClass("open"),
                                $(".overlay-desktop").addClass("active")

                        } else {

                            $(".cart-wrapper").empty();

                            var base_url = '<?= base_url() ?>';
                            $.get({
                                url: base_url + "user/Home/get_cart?id=<?php if (!$id_cart == null || !$id_cart == "") {
                                                                            echo $id_cart->id_cart;
                                                                        } else {
                                                                            echo "";
                                                                        }
                                                                        ?>",
                                type: "GET",
                            }).done(function(t) {
                                var res = JSON.parse(t);

                                console.log(res);
                                // if(res.success =="success"){
                                if (res.data.length >= 0) {
                                    var harga = 0;
                                    var notif = res.data.length;
                                    //	console.log("ini"+notif);
                                    res.data.forEach(myFunction);

                                    function myFunction(item, index) {
                                        //	console.log(item.element);
                                        $(".cart-wrapper").append(item.element);

                                        $(".icon-cart").find(".notif").html(notif);
                                        $("#totalharga").html("Rp " + res.total);

                                    }
                                }

                            }).fail(function(t) {
                                console.log(t)
                                // location.reload()
                            })

                            var i = parseInt($(".icon-cart").find(".notif").html());
                            $(".menu-cart").addClass("open"),
                                $(".overlay-desktop").addClass("active")

                        }

                    }

                }).fail(function(t) {
                    console.log(t)
                    // location.reload()
                });
            } else {
                alert("Silahkan Pilih Ukuran dan jumlah terlebih dahulu!")
            }

        })
    })
</script>

<script>
    function callZoom() {
        $('#elevate-zoom').elevateZoom({
            zoomType: "inner",
            cursor: "crosshair"
        });
    }

    $(document).ready(function() {

        callZoom();

        $('.image-thumbnail .owl-item').on('click', function() {

            $('.image-thumbnail--list').removeClass('active');
            $(this).find('.image-thumbnail--list').addClass('active');

            var imgSrc = $(this).find('img').attr('src');

            $('#elevate-zoom').attr('src', imgSrc);
            $('#elevate-zoom').data('zoom-image', imgSrc);
            $('#elevate-zoom').remove('.zoomContainer');
            $('#elevate-zoom').removeData('elevateZoom');

            callZoom();
        });

        if ($('.size-product li:first-child').hasClass('empty')) {
            $('.addToCart').hide();
            $('.out-of-stock').show();
        } else {
            $('.addToCart').show();
            $('.out-of-stock').hide();
        }

        $('.size').on('click', function() {
            var val = $(this).children('span').attr('data-stock');
            if (val == 0) {
                $('.addToCart').css({
                    'display': 'none'
                });
                $('.out-of-stock').css({
                    'display': 'inline-block'
                });
                $('.label-size .text-label').text(val + ' stok tersisa');
                $('.label-size').hide();
            } else {
                if (val >= 1 && val <= 3) {
                    $('.label-size').css('display', 'inline-block');
                    $('.label-size .text-label').text(val + ' stok tersisa');
                } else {
                    $('.label-size').hide();
                    $('.label-size .text-label').text('');
                }
                $('.out-of-stock').css({
                    'display': 'none'
                });
                $('.addToCart').css({
                    'display': 'inline-block'
                });
            }
        });

        $(".option-0").on("click", ".init", function() {
            $(this).closest(".option-0").children('.child-0:not(.init)').toggle();
            if ($(this).closest(".option-0").children('.child-0:not(.init)').is(":hidden")) {
                $(this).closest(".option-0").removeClass("show-option");
            } else {
                $(this).closest(".option-0").addClass("show-option");
            }
        });

        var allOptions = $(".option-0").children('.child-0:not(.init)');
        $(".option-0").on("click", ".child-0:not(.init)", function() {
            allOptions.removeClass('selected');
            $(this).addClass('selected');
            $(".option-0").children('.init').html($(this).html());
            allOptions.toggle();
            $(this).closest(".option-0").removeClass("show-option");

            generateSize(1, $(".option-0").find(".selected").data("value"));
        });

        $(".option-1").on("click", ".init", function() {
            $(this).closest(".option-1").children('.child-1:not(.init)').toggle();
            if ($(this).closest(".option-1").children('.child-1:not(.init)').is(":hidden")) {
                $(this).closest(".option-1").removeClass("show-option");
            } else {
                $(this).closest(".option-1").addClass("show-option");
            }
        });

        var allOptions2 = $(".option-1").children('.child-1:not(.init)');
        $(".option-1").on("click", ".child-1:not(.init)", function() {
            allOptions2.removeClass('selected');
            $(this).addClass('selected');
            $(".option-1").children('.init').html($(this).html());
            allOptions2.toggle();
            $(this).closest(".option-1").removeClass("show-option");

            generateSize(2, $(".option-1").find(".selected").data("value"));
        });

        $(".option-2").on("click", ".init", function() {
            $(this).closest(".option-2").children('.child-2:not(.init)').toggle();
            if ($(this).closest(".option-2").children('.child-2:not(.init)').is(":hidden")) {
                $(this).closest(".option-2").removeClass("show-option");
            } else {
                $(this).closest(".option-2").addClass("show-option");
            }
        });

        var allOptions3 = $(".option-2").children('.child-2:not(.init)');
        $(".option-2").on("click", ".child-2:not(.init)", function() {
            allOptions3.removeClass('selected');
            $(this).addClass('selected');
            $(".option-2").children('.init').html($(this).html());
            allOptions3.toggle();
            $(this).closest(".option-2").removeClass("show-option");

            generateSize(3, $(".option-2").find(".selected").data("value"));
        });

        var radios = document.getElementsByName('addon');
        for (i = 0; i < radios.length; i++) {
            radios[i].onclick = function(e) {
                if (e.ctrlKey || e.metaKey) {
                    this.checked = false;
                }
            }
        }

        console.log("stok == ", stok);

        if (stok == 0) {
            $("#row_produk").hide();
            $("#kosong").show();
        } else {
            $("#kosong").hide();
        }

        document.getElementById('hasilFit').style.display = 'none';
        document.getElementById('inputFit').style.display = 'block';

        // $('#findMyFitModal').modal({
        //     backdrop: 'static',
        //     keyboard: true
        //  })
    });

    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }


    // document.getElementById("cari").addEventListener("click", findMyFit);
    // document.getElementById("berat").value("");
    // document.getElementById("tinggi").value("");

    function reloadFindMyFit() {
        document.getElementById('inputFit').style.display = 'block';
        document.getElementById('hasilFit').style.display = 'none';

        document.getElementById('berat').value = 0;
        document.getElementById('tinggi').value = 0;
    }

    function findMyFit() {
        berat = document.getElementById('berat').value;
        tinggi = document.getElementById('tinggi').value;

        const sizeMyFit = document.getElementById("sizeMyFit");

        if (berat == 0 || tinggi == 0) {
            alert("Silahkan masukkan berat dan tinggi terlebih dahulu!")
        } else {
            document.getElementById('pilihGambarDepan').style.display = 'block';
            document.getElementById('inputFit').style.display = 'none';
        }

    }

    function setGambarDepan(size) {
        gambar_depan = size;
        document.getElementById('pilihGambarDepan').style.display = 'none';
        document.getElementById('pilihGambarSamping').style.display = 'block';
        console.log(gambar_depan);
    }

    function setGambarSamping(size) {
        gambar_samping = size;
        console.log(gambar_samping, gambar_depan);
        document.getElementById('pilihGambarSamping').style.display = 'none';
        document.getElementById('hasilFit').style.display = 'block';

        // berat = (parseInt(berat) + 100);
        if (gambar_depan == "sedang" && gambar_samping == "sedang") {
            berat = (parseInt(berat) + 0);
        } else if (gambar_depan == "kurus" || gambar_samping == "tipis") {
            berat = (parseInt(berat) - 1);
        } else if (gambar_depan == "gemuk" || gambar_samping == "buncit") {
            berat = (parseInt(berat) + 1);
        }

        //tinggi kurang dari tinggi normal
        if (tinggi < tinggi_normal) {
            tinggi = (tinggi_normal - parseInt(tinggi));

            if ((tinggi >= 1 && tinggi <= 5)) {
                berat = (parseInt(berat) - 1);
            } else if ((tinggi >= 6 && tinggi <= 10)) {
                berat = (parseInt(berat) - 2);
            } else if ((tinggi >= 11 && tinggi <= 15)) {
                berat = (parseInt(berat) - 3);
            } else if ((tinggi >= 16 && tinggi <= 20)) {
                berat = (parseInt(berat) - 4);
            } else if ((tinggi >= 21 && tinggi <= 25)) {
                berat = (parseInt(berat) - 5);
            }
            console.log(tinggi);
        } else { //tinggi lebih dari tinggi normal
            tinggi = (parseInt(tinggi) - tinggi_normal);

            if ((tinggi >= 1 && tinggi <= 5)) {
                berat = (parseInt(berat) + 1);
            } else if ((tinggi >= 6 && tinggi <= 10)) {
                berat = (parseInt(berat) + 2);
            } else if ((tinggi >= 11 && tinggi <= 15)) {
                berat = (parseInt(berat) + 3);
            } else if ((tinggi >= 16 && tinggi <= 20)) {
                berat = (parseInt(berat) + 4);
            } else if ((tinggi >= 21 && tinggi <= 25)) {
                berat = (parseInt(berat) + 5);
            }
            console.log(tinggi);
        }

        console.log(berat);

        if (berat < 40) {
            sizeMyFit.innerHTML = "Berat kamu kurang dari 40.";
        } else if ((berat >= 40 && berat <= 47)) {
            sizeMyFit.innerHTML = "XS";
        } else if ((berat >= 48 && berat <= 55)) {
            sizeMyFit.innerHTML = "S";
        } else if (((berat >= 56 && berat <= 65))) {
            sizeMyFit.innerHTML = "M";
        } else if (((berat >= 66 && berat <= 75))) {
            sizeMyFit.innerHTML = "L";
        } else if ((berat >= 76 && berat <= 85)) {
            sizeMyFit.innerHTML = "XL";
        } else if ((berat >= 86 && berat <= 95)) {
            sizeMyFit.innerHTML = "XXL";
        } else if ((berat >= 96)) {
            sizeMyFit.innerHTML = "Ukuran melebihi batas. ";
        }

    }
</script>
</body>

</html>