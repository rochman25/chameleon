
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
        <div class="header" style="background-image:url(https://www.mensrepublic.id/assets/images/uploads/category/sepatu-1571885735-pV0DzYBjF3hy.jpg)">
            <div class="container">
                <div class="bottom_absolute">
                    <h1>  </h1>
                    <h2>Sepatu</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="all-product-card-wrapper clearfix">
                    <div class="left-side-wrapper">
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
                                                                            <li data-id="1" class="size_1">39</li>
                                                                            <li data-id="2" class="size_2">40</li>
                                                                            <li data-id="3" class="size_3">41</li>
                                                                            <li data-id="4" class="size_4">42</li>
                                                                            <li data-id="5" class="size_5">43</li>
                                                                            <li data-id="6" class="size_6">44</li>
                                                                            <li data-id="8" class="size_8">M</li>
                                                                            <li data-id="10" class="size_10">XL</li>
                                                                            <li data-id="12" class="size_12">All Size</li>
                                                                    </ul>
                            </div>
                            <div class="color">
                                <h2>Warna</h2>
                                <ul class="color_wrapper">
                                                                            <li data-id="1" data-toggle="tooltip" title="Black" class="color_1" style="background-color: #000000" ></li>
                                                                            <li data-id="2" data-toggle="tooltip" title="Brown" class="color_2" style="background-color: #845a16" ></li>
                                                                            <li data-id="4" data-toggle="tooltip" title="Blue" class="color_4" style="background-color: #1d5ca6" ></li>
                                                                            <li data-id="5" data-toggle="tooltip" title="Grey" class="color_5" style="background-color: #969696" ></li>
                                                                            <li data-id="7" data-toggle="tooltip" title="Maroon" class="color_7" style="background-color: #800000" ></li>
                                                                            <li data-id="3" data-toggle="tooltip" title="Tan" class="color_3" style="background-color: #d17012" ></li>
                                                                            <li data-id="8" data-toggle="tooltip" title="White" class="color_8" style="background-color: #ffffff" ></li>
                                                                            <li data-id="10" data-toggle="tooltip" title="Red" class="color_10" style="background-color: #ff2600" ></li>
                                                                            <li data-id="11" data-toggle="tooltip" title="Green" class="color_11" style="background-color: #126112" ></li>
                                                                    </ul>
                            </div>
                        </div>
                    </div>
                    <div class="right-side-wrapper">
                        <div class="all-product-card">
                        <?php foreach($product as $p){?>
                            <div class="product-card-wrapper">
                                    <a href="https://www.mensrepublic.id/product/aero-full-black">
                                        <div class="product-category">
                                            <img src="" alt="" data-src="https://www.mensrepublic.id/assets/images/uploads/product/300/aero-full-black-1569400958-MTm75olFgTRp.jpg">
                                            <h2 class="title">Aero - Full Black</h2>
                                            <div class="price-wrapper">
                                                <div class="discount">-30%</div>
                                                <div class="price">Rp 300,000</div>
                                                 <div class="price-before" style="text-decoration : line-through">Rp 429,000</div>
                                            </div>

                                            <div class="rating-wrapper">
                                                <img src="https://www.mensrepublic.id/assets/images/category/rating/star-5.png" alt="">
                                                <span>(3)</span>
                                            </div>
                                            <div class="rest-day">
                                                Tinggal 1 hari lagi
                                            </div>                                            
                                            <div class="new-po">
                                            </div>
                                        </div>
                                    </a>
                            </div>
                        <?php }?>
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
	