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
			<form action="<?= base_url()?>order" method="POST">
				<input type="hidden" value=""/>
				<input type="submit" value="Beli" class="confirm"/>
			</form>
			<!-- <a class="confirm" href="">hajar men</a> -->
		</div>
	</div>
</div>

<script type="text/javascript">
var base_url = '<?= base_url()?>';
	$(document).ready(function () {
		
		//var id_cart =   $("#cart").data("cart-id");
		var base_url = '<?= base_url()?>';
            $.get({
                url: base_url + "user/Home/get_cart?id=<?php if (!$id_cart == null || !$id_cart == ""){
						echo $id_cart->id_cart; }
						else{
							echo "";
							}
							?>",
                type: "GET",
            }).done(function (t) {
                var res = JSON.parse(t);
				
				console.log(res);
				if(res.success =="success"){
					if (res.data.length >=0) {
						var harga = 0;
						var notif = res.data.length;
					//	console.log("ini"+notif);
						res.data.forEach(myFunction);
							function myFunction(item, index) {
  						//	console.log(item.element);
  							$(".cart-wrapper").append(item.element);
								
							$(".icon-cart").find(".notif").html(notif);
							$("#totalharga").html("Rp "+res.total);
						
						}
				}
				// else{

				// } 
			}
                
            }).fail(function (t) {
                console.log(t)
                  // location.reload()
            })
		
    })

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
</script>