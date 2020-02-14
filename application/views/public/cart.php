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
						<div class="cart-wrapper" data-cart-id="<?= $this->session->userdata[$id]["current_cart"];?>">
			
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
				<span class="total_sum">Rp 0</span>
				<div class="clearfix"></div>
			</div>
			<a class="confirm" href="<?= base_url()?>order">hajar men</a>
		</div>
	</div>
</div>