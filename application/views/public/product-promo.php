
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
    <div class="category-page">
        <div class="header" style="">
        <div class="container">
            <div class="bottom_absolute">
                <h1> Promo </h1>
                <h2> </h2>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="all-product-card-wrapper clearfix">

                <!-- <div class="left-side-wrapper">

                    <div class="filtering">

                        <div class="sorting">
                            <div class="labels">Urutkan</div>
                            <div>
                                <select id="order" onchange="location = this.value" data-sort="" data-order="">
                                    <option value="?sort=published_at&order=">Terbaru</option>
                                    <option value="?sort=price&order=asc">Termurah</option>
                                    <option value="?sort=price&order=desc">Termahal</option>
                                </select>
                            </div>
                        </div>

                        <div class="size">
                            <h2>Ukuran</h2>
                            <ul class="size_wrapper">
                                                                        <li data-id="2" class="size_2">40</li>
                                                                        <li data-id="3" class="size_3">41</li>
                                                                        <li data-id="4" class="size_4">42</li>
                                                                        <li data-id="5" class="size_5">43</li>
                                                                        <li data-id="6" class="size_6">44</li>
                                                                </ul>
                        </div>
                        <div class="color">
                            <h2>Warna</h2>
                            <ul class="color_wrapper">
                                                                        <li data-id="1" data-toggle="tooltip" title="Black" class="color_1" style="background-color: #000000" ></li>
                                                                        <li data-id="4" data-toggle="tooltip" title="Blue" class="color_4" style="background-color: #1d5ca6" ></li>
                                                                        <li data-id="10" data-toggle="tooltip" title="Red" class="color_10" style="background-color: #ff2600" ></li>
                                                                </ul>
                        </div>

                    </div>
                </div> -->

                <div class="right-side-wrapper">

                <img src="https://www.mensrepublic.id/assets/images/uploads/banner/71378638-d886-93a1-25ac-840ef2d5a0c5.jpg" alt="YOI #IndonesiaMelangkah" class="image-category">
                    
                    <!-- <div class="all-product-card">
                        <div class="product-card-wrapper">
                            <a href="https://www.mensrepublic.id/product/yoi-black">
                                    <div class="product-category">
                                        <img src="" alt="" data-src="https://www.mensrepublic.id/assets/images/uploads/product/300/yoi-black-1569393534-2esdqAXcmCM1.jpg">
                                        <h2 class="title">YOI BLACK</h2>

                                        
                                        <div class="price-wrapper">

                                            
                                            <div class="price">Rp 290,000</div>

                                            
                                        </div>

                                        <div class="rating-wrapper">
                                                                                                <img src="https://www.mensrepublic.id/assets/images/category/rating/star-5.png" alt="">
                                                <span>(7)</span>
                                                                                        </div>

                                        
                                        <div class="new-po">
                                            
                                                                                        </div>

                                                                                </div>
                            </a>
                        </div>
                        <div class="product-card-wrapper">
                            <a href="https://www.mensrepublic.id/product/yoi-blue">
                                    <div class="product-category">
                                        <img src="" alt="" data-src="https://www.mensrepublic.id/assets/images/uploads/product/300/yoi-blue-1569393568-xpXIeLv7isbZ.jpg">
                                        <h2 class="title">YOI BLUE</h2>

                                        
                                        <div class="price-wrapper">

                                            
                                            <div class="price">Rp 290,000</div>

                                            
                                        </div>

                                        <div class="rating-wrapper">
                                                                                                <img src="https://www.mensrepublic.id/assets/images/category/rating/star-5.png" alt="">
                                                <span>(3)</span>
                                                                                        </div>

                                        
                                        <div class="new-po">
                                            
                                                                                        </div>

                                                                                </div>
                            </a>
                        </div>
                        <div class="product-card-wrapper">
                            <a href="https://www.mensrepublic.id/product/yoi-red">
                                    <div class="product-category">
                                        <img src="" alt="" data-src="https://www.mensrepublic.id/assets/images/uploads/product/300/yoi-red-1569393587-ExGR7KSmTm1M.jpg">
                                        <h2 class="title">YOI RED</h2>

                                        
                                        <div class="price-wrapper">

                                            
                                            <div class="price">Rp 290,000</div>

                                            
                                        </div>

                                        <div class="rating-wrapper">
                                                                                                <img src="https://www.mensrepublic.id/assets/images/category/rating/star-5.png" alt="">
                                                <span>(5)</span>
                                                                                        </div>

                                        
                                        <div class="new-po">
                                            
                                                                                        </div>

                                                                                </div>
                            </a>
                        </div>
                    </div> -->
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
    function deleteitem(state){
        $.ajax({
                url: base_url + "user/Home/hapus_item",
                type: "POST",
                data: {
                   id_item : state
                }
            }).done(function (t) {
                var res = JSON.parse(t);
                console.log(res);
                 if (true == res.success) {
                    location.reload()
                         

                 } 
                 

            }).fail(function (t) {
                console.log(t)
                //   location.reload()
            })
    }
    // /var size_view = 
    function ubahjml(state){
        console.log(state);
        if(state == 1){
            if(def_jml < stok){
                def_jml++
            }else{
                
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
                //    size : def_Ssize,
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
