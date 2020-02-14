
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
                <div class="col-lg-5 col-md-5 gallery-container" data-image-count="7">
                    <div class="image-gallery">
                        <img id="elevate-zoom" class="img-responsive" src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[0]; ?>" 
                        data-zoom-image="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $thumbnail[0]; ?>"/>
                    </div>
                    <div class="image-thumbnail owl-carousel clearfix">
                        <?php foreach($thumbnail as $p){?>
                        <div class="image-thumbnail--list">
                            <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>" data-zoom-image="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>"/>
                        </div>
                        
                        <?php }?>
                    </div>
                </div>
                <div class="image-gallery-mobile owl-carousel">
                <?php foreach($thumbnail as $p){?>
                    <img src="<?= base_url() ?>assets/uploads/thumbnail_produk/<?= $p; ?>" />
                <?php }?>
                </div>
                <div class="col-lg-7 col-md-7 col-xs-12">
                    <div class="product-ribbon clearfix">
                    </div>
                    <div class="product-info">
                        <h1><?= $produk->nama_produk;?></h1>
                        <h2>    
                            <div class="price_before"> Rp <?= $produk->harga_produk;?> </div>
                            <div class="price_after">
                                <span class="value">Rp <?= $produk->harga_produk;?></span>
                                <!-- <span class="time">Tinggal 7 hari lagi</span> -->
                            </div>
                        </h2>
                        <br>
                        <span>Ukuran :</span>
                        <div id="size" class="size-product">
                            <ul class="clearfix">
                                    <li data-value="1" data-productdetailid="38840" class="size active ">
                                        <span data-size="39" data-stock="2">S</span>
                                    </li>
                                    <li data-value="2" data-productdetailid="38841" class="size  ">
                                        <span data-size="40" data-stock="1">M</span>
                                    </li>
                                    <li data-value="3" data-productdetailid="38842" class="size  ">
                                        <span data-size="41" data-stock="3">X</span>
                                    </li>
                                    <li data-value="4" data-productdetailid="38843" class="size  ">
                                        <span data-size="42" data-stock="11">XL</span>
                                    </li>
                                    <div class="label-size">
                                        <i class="svg-icon svg_icon__pdp_check"></i>
                                        <span class="text-label"></span>
                                    </div>
                            </ul>
                        </div>
                        <br>
                        <span>Jumlah :</span>
                        <div id="size" class="size-product">
                            <ul class="clearfix">
                                    <li data-value="1" data-productdetailid="38840" class="size active ">
                                        <span data-size="39" data-stock="2">-</span>
                                    </li>
                                    <li data-value="4" data-productdetailid="38843" class="size  ">
                                        <span data-size="42" data-stock="11">1</span>
                                    </li>
                                    <li data-value="1" data-productdetailid="38840" class="size active ">
                                        <span data-size="39" data-stock="2">+</span>
                                    </li>
                                    <div class="label-size">
                                        <i class="svg-icon svg_icon__pdp_check"></i>
                                        <span class="text-label"></span>
                                    </div>
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
                                <a href="https://www.mensrepublic.id/other/layanan/panduan-pemesanan">
                                    <div class="image">
                                        <i class="svg-icon svg_icon__pdp_cart "></i>
                                    </div>
                                    <div class="content">
                                        Cara Pemesanan									
                                    </div>
                                </a>
                            </div>
                            <div class="list clearfix">
                                <a href="https://www.mensrepublic.id/other/layanan/panduan-perawatan">
                                    <div class="image">
                                        <i class="svg-icon svg_icon__pdp_shoes "></i>
                                    </div>
                                    <div class="content">
                                        Cara Perawatan									
                                    </div>
                                </a>
                            </div>
                            <div class="list clearfix">
                                <a href="https://www.mensrepublic.id/other/layanan/panduan-ukuran">
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
                                <a href="javascript:;">Deskripsi</a></li>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="<?= base_url()?>assets/public/js/all.js"></script>

<script type="text/javascript">
	$(window).on('load',function(){
		$(".svg-container").fadeOut("slow");
    });
</script>
<script type="text/javascript">
$(document).ready(function () {
    var base_url = '<?= base_url()?>'
            $(".addToCart").on("click", function () {
           
            var id_prod = $("#product").data("product-id");
            var nama_barang = $("#product").data("product-nama");
            $.ajax({
                url: base_url + "user/Home/add_cart",
                type: "POST",
                data: {
                    id_pengguna: '<?= $this->session->userdata['user_data']['id']?>',
                    id_produk: id_prod,
                    qty : 1,
                    nama_barang : nama_barang
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
                   location.reload()
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

	function generateSize(index, product_id) {
		$.ajax({
			method: 'GET',
			url: '/product/detail/'+product_id,
			success: function(data) {
				val = '';
				size_lists = data.results.product.productdetails;

				if($('#size-box-'+index).length) {
					$('#size-box-'+index).empty();
				}
				for(i = 0; i < size_lists.length; i++) {
					if(i == 0) {
						is_active = 'active';
						val = size_lists[i].stock;
					}
					else is_active = '';
					coret = (size_lists[i].stock == 0) ? 'line-through' : 'none';

					$('#size-box-'+index).append(
							'<li data-value="'+ size_lists[i].size.id +'" class="size '+ is_active +'" onClick="setSize(event)">'
						+ 	 '<span style="text-decoration:'+ coret +'" data-size="'+ size_lists[i].size.measure +'" data-stock="'+ size_lists[i].stock +'">'+ size_lists[i].size.measure +' </span>'
						+ '</li>'
					);
				}

				// Badge sisa stock
				if(val >= 1 && val <= 3) {
                    $('.size-box-'+index).css('display','inline-block');
					$('.size-box-'+index).text(val + ' stok tersisa');
				}
				else {
                    $('.size-box-'+index).css('display','none');
					$('.size-box-'+index).text('');
				}
			}
		});
	}

	function setSize(event) {
		var val = '';
		var badge_name = '';
		if(event.target.nodeName == 'SPAN') {
			node = '#' + event.target.parentNode.parentNode.id + ' li';
			$(node).removeClass('active');
			$(event.target).parent('li').addClass('active');
			val = $(event.target).attr('data-stock');
			badge_name = '.'+event.target.parentNode.parentNode.id;
		}
		else if(event.target.nodeName == "LI") {
			node = '#' + event.target.parentNode.id + ' li';
			$(node).removeClass('active');
			$(event.target).addClass('active');
			val = $(event.target).children('span').attr('data-stock');
			badge_name = '.'+event.target.parentNode.id;
		}

		if(val >= 1 && val <= 3) {
            $(badge_name).css('display','inline-block');
			$(badge_name).text(val + ' stok tersisa');
		}
		else {
            $(badge_name).css('display','none');
			$(badge_name).text('');
		}
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
