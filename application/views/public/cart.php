<div class="menu-cart">
	<div class="menu-cart-wrapper">
		<div class="header">
            Keranjang Belanja
            <i class="svg_icon__header_close svg-icon"></i>
		</div>
		<?php if(isset($his->session->userdata['user_data'])){
				$id = $his->session->userdata['user_data']['id'];
				if(isset($his->session->userdata[$id])){
					?>
						<div class="cart-wrapper" id="cart" data-cart-id="<?= $this->session->userdata[$id]["current_cart"];?>">
							
						</div>
					<?php
				}
		}else{
			?>
				<div class="cart-wrapper" data-cart-id="">
			
			</div>
			<?php
		}?>
		
		<div class="cart-footer">
			<div>
				<span class="sum">Total</span>
				<span id="totalharga" class="total_sum">Rp 0</span>
				<div class="clearfix"></div>
			</div>
			<a class="confirm" href="<?= base_url()?>order">hajar men</a>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		var id_cart =   $("#cart").data("cart-id");
		var base_url = '<?= base_url()?>';
            $.get({
                url: base_url + "user/Home/get_cart",
                type: "GET",
            }).done(function (t) {
                var res = JSON.parse(t);
				
	
			if (res.data.length >=0) {
				var harga = 0;
				var notif = res.data.length;
				console.log("ini"+notif);
				res.data.forEach(myFunction);
					function myFunction(item, index) {
  						console.log(item);
  						$(".cart-wrapper").append(item.element);
						
						$(".icon-cart").find(".notif").html(notif);
						$("#totalharga").html("Rp "+res.total);
						
					}
				}else{

				} 
                
            }).fail(function (t) {
                console.log(t)
                  // location.reload()
            })
        
    })
</script>