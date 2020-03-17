
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
    <div id="product" data-product-nama="<?= $produk->nama_produk;?>" data-product-id="<?= $produk->id_produk;?>">
        <div class="container">
            <div class="row"> 
             <!--  -->
                <div class="col-lg-5 col-md-5 gallery-container" data-image-count="7">
                    <div id="containergallery" class="image-gallery">
                        <img id="elevate-zoom" class="img-responsive" src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[0]; ?>" 
                        data-zoom-image="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[0]; ?>"/>
                    </div>
                    <div id="containervideo" class="image-gallery">
                    <iframe src="https://drive.google.com/file/d/1avvSzpe5BjHDAtkVmxD2oGSB7oxakz4g/preview" 
                    style="border:0;height:400px;width:400px">
                
                    </iframe>
                    </div>
                    <div class="image-thumbnail owl-carousel clearfix">
                        <?php foreach($thumbnail as $p){?>
                        <div class="image-thumbnail--list">
                            <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>" data-zoom-image="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>"/>
                        </div>
                        <?php }?>
                       
                    </div>
                    <input onclick="toggleVideo();" type="button" value="VIDEO"/>
                </div>

                <!--  -->
               
                <div id="containermgallery" class="image-gallery-mobile owl-carousel">
                
                <?php foreach($thumbnail as $p){?>
                    <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>" />
                <?php }?>
                
                </div>
               
                <!--  -->
                <div id="containermvideo" class="image-gallery-mobile owl-carousel">
                    <iframe src="https://drive.google.com/file/d/1avvSzpe5BjHDAtkVmxD2oGSB7oxakz4g/preview" 
                    style="border:0;height:400px;width:100%;align-content: center;margin-left:50px;">
                
                    </iframe>
                
                </div>
                <div class="image-gallery-mobile owl-carousel">
            
                    <input onclick="toggleMVideo();" type="button" value="VIDEO"/>
                </div>
                
                <!--  -->
                <div class="col-lg-7 col-md-7 col-xs-12">
               

                    <div class="product-ribbon clearfix">
                    </div>
                    <div class="product-info">
                        <h1><?= $produk->nama_produk;?></h1>
                        <h2>    
                            <!-- <div class="price_before"> Rp <?= $produk->harga_produk;?> </div> -->
                            <div class="price_after">
                                <span class="value">Rp <?= $produk->harga_produk;?></span>
                                <!-- <span id="stok" class="value">Stok <?= $produk->stok_produk;?></span> -->
                                <!-- <span class="time">Tinggal 7 hari lagi</span> -->
                            </div>
                        </h2>
                        <br>
                        <span>Ukuran :</span>
                        <div id="size" class="size-product">
                            <ul class="clearfix">
                                <?php foreach($size as $s){
                                    ?>
                                       <li id="S" style="color:black !important;" class="size ">
                                        <span ><?= $s; ?></span>
                                    </li>
                                    <?php
                                }?>
                                   
                            </ul>
                        </div>
                        <br>
                        <span>Jumlah :</span>
                        <div id="size" class="size-product">
                            <ul class="clearfix">
                                    <li onclick="ubahjml(2);"  class="size active ">
                                        <span>-</span>
                                    </li>
                                    <li class="size  ">
                                        <span style="color:black;" id="value">1</span>
                                    </li>
                                    <li onclick="ubahjml(1);" class=" size active ">
                                        <span>+</span>
                                    </li>
                                   
                            </ul>
                        </div>
                       
                        <div class="button-action">
                            <?php 
                            if(isset($this->session->userdata['user_data'])){
                            ?>
                                <button class="addToCart">
                                    <i class="svg-icon svg_icon__pdp_cart"></i>hajar men
                                </button>
                               
                            <?php
                            }else{ 
                                
                            ?>
                                <a href="<?= base_url();?>login" 
                                style="padding:15px;"
                                class="addToCart">
                                    <i class="svg-icon svg_icon__pdp_cart"></i>hajar men
                            </a>
                                
                            <?php
                            }?>
                             <span class="out-of-stock" style="display:none">HABIS MEN</span>
                        </div>
                        
                        <div class="product-order">
                            <div class="list clearfix">
                                <a href="#">
                                    <div class="image">
                                        <i class="svg-icon svg_icon__pdp_cart "></i>
                                    </div>
                                    <div class="content">
                                        Cara Pemesanan									
                                    </div>
                                </a>
                            </div>
                            <div class="list clearfix">
                                <a href="#">
                                    <div class="image">
                                        <i class="svg-icon svg_icon__pdp_shoes "></i>
                                    </div>
                                    <div class="content">
                                        Cara Perawatan									
                                    </div>
                                </a>
                            </div>
                            <div class="list clearfix">
                                <a href="#">
                                    <div class="image">
                                        <i class="svg-icon svg_icon__pdp_ruler "></i>
                                    </div>
                                    <div class="content">
                                        Panduan Ukuran									
                                    </div>
                                </a>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active" data-target="product-deskripsi">
                                <a style="color:white;background-color:none;" href="javascript:;">Deskripsi</a></li>
                            <!-- <li data-target="review"><a href="javascript:;">Rating dan Ulasan ( 5/5 )</a></li> -->
                        </ul>
                        <div class="tab-content">
                            <div class="product-deskripsi">
                                <?php if(empty($produk->deskripsi_produk)){
                                    echo "<p>Belum ada deskripsi</p>";
                                }else{
                                    echo $produk->deskripsi_produk;
                                }?>
                            </div>
                        <div class="review">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php 
$this->load->view('public/footer');
?>


<script type="text/javascript">
	$(window).on('load',function(){
		$(".svg-container").fadeOut("slow");
    });
</script>
<script type="text/javascript">
    var base_url = '<?= base_url()?>';
    var def_jml = 1;
    var def_Size = "S";
    var stok = '<?= $produk->stok_produk;?>';
    

    var containervideo = document.getElementById('containervideo');
    var containergallery = document.getElementById('containergallery');
    var containermvideo = document.getElementById('containermvideo');
    var containermgallery = document.getElementById('containermgallery');
    containervideo.style.display="none";
    containermvideo.style.display = "none";
    var ishide = true;
    var ismhide = true;
    function toggleVideo(){
        if(ishide){
            containervideo.style.display ="none";
            containergallery.style.display = "block";
            
            
            ishide= false;
        }else{
            containervideo.style.display = "block";
            containergallery.style.display  ="none";
           
            ishide= true;
        }
    }
    function toggleMVideo(){
        if(ismhide){
          
            containermvideo.style.display ="none";
            containermgallery.style.display = "block";
            
            ismhide= false;
        }else{
          
            containermvideo.style.display = "block";
            containermgallery.style.display  ="none";
            ismhide= true;
        }
    }

    function changeSizeS(){
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
    function changeSizeM(){
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
    function changeSizeL(){
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
    function changeSizeXL(){
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

    // /var size_view = 
    function ubahjml(state){
        console.log(state);
        if(state == 1){
            if(def_jml < stok){
                def_jml++
            }else{
              //  def_jml = stok;
            }
        }else{
            if(def_jml <= 1){
                def_jml = 1;
            }else{
                def_jml--;
            }
        }
        document.getElementById('value').innerHTML = def_jml;
    }

$(document).ready(function () {
    console.log(stok);

    $(".addToCart").on("click", function () {
           
            var id_prod = $("#product").data("product-id");
            var nama_barang = $("#product").data("product-nama");
            $.ajax({
                url: base_url + "user/Home/add_cart",
                type: "POST",
                data: {
                    id_cart : '<?php if (!$id_cart == null || !$id_cart == ""){
			echo $id_cart->id_cart; }else{echo "";}?>',
                    id_pengguna: '<?php if(empty($this->session->userdata['user_data']['id'])){
                        echo "";
                    }else{
                        echo $this->session->userdata['user_data']['id'];
                    }?>',
                    id_produk: '<?= $produk->id_produk;?>',
                    qty : def_jml,
                    img:'<?= $thumbnail[0]; ?>',
                    nama_barang : nama_barang,
                  
                   size : def_Size,
                }
            }).done(function (t) {
                var res = JSON.parse(t);
            
                 if (true == res.success) {
            
                         $(".cart-wrapper").append(res.element);
                         var i = parseInt($(".icon-cart").find(".notif").html());
                         $(".menu-cart").addClass("open"),
                         $(".overlay-desktop").addClass("active")

                 } 
                 

            }).fail(function (t) {
                console.log(t)
                //   location.reload()
            })
        })
    })
</script>
<script>
	function callZoom(){
        $('#elevate-zoom').elevateZoom({
            zoomType : "inner",
            cursor : "crosshair"
        });
	}




    $(document).ready(function() {

		callZoom();

        $('.image-thumbnail .owl-item').on('click',function(){

			$('.image-thumbnail--list').removeClass('active');
            $(this).find('.image-thumbnail--list').addClass('active');

            var imgSrc = $(this).find('img').attr('src');

			$('#elevate-zoom').attr('src',imgSrc);
            $('#elevate-zoom').data('zoom-image',imgSrc);
            $('#elevate-zoom').remove('.zoomContainer');
            $('#elevate-zoom').removeData('elevateZoom');

            callZoom();
		});

        if( $('.size-product li:first-child').hasClass('empty') ){
            $('.addToCart').hide();
            $('.out-of-stock').show();
        }
        else{
            $('.addToCart').show();
            $('.out-of-stock').hide();
        }

		$('.size').on('click', function() {
			var val = $(this).children('span').attr('data-stock');
			if(val == 0) {
				$('.addToCart').css({'display': 'none'});
                $('.out-of-stock').css({'display': 'inline-block'});
				$('.label-size .text-label').text(val + ' stok tersisa');
                $('.label-size').hide();
			}
			else {
				if(val >= 1 && val <= 3) {
                    $('.label-size').css('display','inline-block');
					$('.label-size .text-label').text(val + ' stok tersisa');
				}
				else {
                    $('.label-size').hide();
					$('.label-size .text-label').text('');
				}
                $('.out-of-stock').css({'display': 'none'});
				$('.addToCart').css({'display': 'inline-block'});
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


    });
</script>
</body>
</html>
