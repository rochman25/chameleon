<?php
$this->load->view('public/header');
$this->load->view('public/heading');
?>
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/bootstrap/dist/css/bootstrap.min.css"> -->
<div class="overlay-desktop"></div>

<!-- header mobile -->
<?php
$this->load->view('public/m_heading');
$this->load->view('public/cart');
?>

<section id="content">
    <!-- <div class="container"> -->
    <div class="orderpage">
        <section class="left-column">
            <div class="ticker">
                <i class="svg-icon svg_icon__order_speaker"></i>
                <span>Hubungi Whatsapp 081808989412 / Line@ @MensRepublicID jika terjadi kendala dalam proses belanja</span>
            </div>
            <div class="content">
                <div class="title">Nama:</div>
                <div class="value">Zaenur Rochman</div>

                <div class="title">Nomor Telepon:</div>
                <div class="value phone-number">081578988248</div>

                <div class="title">Pilih Alamat Pengiriman:</div>

                <div class="address">

                    <div class="address-box selected" data-value="eyJpdiI6IlJkbkE5ODNiQzd3ZDRqOUk1djhBZ1E9PSIsInZhbHVlIjoiNTBkT0QyN3d6RUM3c0M4SVhjVDNydz09IiwibWFjIjoiYjZlYzFkMjM4M2Y0YTU0YWVlMTY3ZDg3Yjc3OWI2ZDQ3Nzg3MDkxYzdhYmEzOWFlMjRjMmI1OTBlNTdlODYyYiJ9">
                        <ul>
                            <li>Jl. Letjen Pol Sumarto Watumas Purwanegara Purwokerto, Banyumas</li>
                            <li>Purwokerto Utara</li>
                            <li>Banyumas</li>
                            <li>Jawa Tengah</li>
                            <li>53123</li>
                        </ul>
                        <button>Pilih Alamat Pengiriman</button>
                    </div>
                </div>

                <a href="<?= base_url() ?>user/home/profil" class="update-address">Ubah alamat atau nomor telepon</a>

                <div class="title">Pilih Pengiriman:</div>
                <div class="kurir">
                </div>
                <div class="kurir-description">Pembeli melakukan pengambilan barang menggunakan Grab-Send atau Go-Send ke kantor Men’s Republic (Jakarta)</div>
                <br>
            </div>

            <div class="order-curtain active"></div>
        </section>
        <section class="right-column">
            <div class="content">
                <div class="products">
                    <div class="product-box" id="product-box__39395">
                        <img src="https://www.mensrepublic.id/assets/images/uploads/product/vale-grey-brown-1543229012-z9fg6v9ZrcFk.jpg" alt="">
                        <div class="product-info">
                            <div class="title">Vale - Grey Brown</div>
                            <div class="old-price">Rp 429,000</div>
                            <div class="old-price"></div>
                            <div class="price">Rp 300,000</div>
                            <div class="qty-size">
                                Jumlah : <strong class="cart_quantity">1</strong> /
                                Ukuran : <strong>39</strong>
                            </div>
                        </div>
                    </div>
                    <div class="product-box" id="product-box__39395">
                        <img src="https://www.mensrepublic.id/assets/images/uploads/product/vale-grey-brown-1543229012-z9fg6v9ZrcFk.jpg" alt="">
                        <div class="product-info">
                            <div class="title">Vale - Grey Brown</div>
                            <div class="old-price">Rp 429,000</div>
                            <div class="old-price"></div>
                            <div class="price">Rp 300,000</div>
                            <div class="qty-size">
                                Jumlah : <strong class="cart_quantity">1</strong> /
                                Ukuran : <strong>39</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="title">Catatan untuk Men's Republic</div>
                <textarea name="notes" class="notes"></textarea>

                <!-- <div class="title">Input Voucher Code</div>
                <div class="voucher">
                    <div class="voucher-wrapper">
                        <input type="text" placeholder="" value="" name="voucher_code">
                        <button>
                            pakai <i class="fa fa-spinner fa-spin fa-fw loading_pakai hide"></i>
                        </button>
                    </div>
                    <div class="voucher_message"></div>
                </div> -->
                <div class="order-summary">
                    <h1>Ringkasan Belanja</h1>
                    <hr>
                    <div class="summary-ongkir">
                        <span>Ongkos Kirim</span>
                        <span class="summary-ongkir-value"></span>
                    </div>
                    <div class="summary-belanja">
                        <span>Total Belanja</span>
                        <span class="summary-belanja-value">Rp 880,000</span>
                    </div>

                    <!-- <div class="potongan-voucher" style="display:none">
                        <span>Potongan Voucher</span>
                        <span data-saldo="0" class="potongan-voucher-value">- Rp 0</span>
                    </div> -->

                    <hr>
                    <div class="summary-all">
                        <span>Total Bayar</span>
                        <span><strong class="summary-all-value"></strong></span>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <button>BELI </button>
            </div>
        </section>
    </div>
    <!-- </div> -->
</section>

<?php
$this->load->view('public/footer');
?>

<!-- <section class="center-column">
            <div class="content">
                <div class="title">Pilih Pengiriman:</div>
                <div class="kurir">
                </div>
                <div class="kurir-description">Pembeli melakukan pengambilan barang menggunakan Grab-Send atau Go-Send ke kantor Men’s Republic (Jakarta)</div>
                <br>
                <div class="title">Pilih Pembayaran:</div>
                <div class="payment">


                    <div class="payment-box selected" data-value="1">
                        <img src="https://www.mensrepublic.id/assets/images/transaction/bank/bca.png" alt="">
                        <h1>Transfer</h1>
                    </div>

                    <div class="payment-box " data-value="4">
                        <img src="https://www.mensrepublic.id/assets/images/transaction/bank/-1512751995-fxP7V2WjCTV4.png" alt="">
                        <h1>Transfer</h1>
                    </div>

                    <div class="payment-box cc" data-value="credit_card">
                        <img src="https://www.mensrepublic.id/assets/images/transaction/cc.png" alt="">
                        <h1>Credit Card</h1>
                    </div>

                    <div class="payment-box gopay" data-value="gopay">
                        <img src="https://www.mensrepublic.id/assets/images/transaction/gopay.png" alt="">
                        <h1>GoPay</h1>
                    </div>
                </div>
            </div>

            <div class="navigation">
                <button class="back"> <i class="svg_icon__order_leftarrow"></i> </button>
                <button>LANJUTMEN <i class="svg_icon__order_rightarrow"></i> </button>
            </div>
            <div class="order-curtain active"></div>
        </section> -->


<!-- <section class="right-column">

            <div class="content">
                <div class="products">
                    <div class="product-box" id="product-box__39395">
                        <img src="https://www.mensrepublic.id/assets/images/uploads/product/vale-grey-brown-1543229012-z9fg6v9ZrcFk.jpg" alt="">
                        <div class="product-info">
                            <div class="title">Vale - Grey Brown</div>

                            <div class="old-price">Rp 429,000</div>

                            <div class="old-price"></div>

                            <div class="price">Rp 300,000</div>

                            <div class="qty-size">

                                Jumlah : <strong class="cart_quantity">1</strong> /
                                Ukuran : <strong>39</strong>

                            </div>

                        </div>
                    </div>
                    <div class="product-box" id="product-box__39449">
                        <img src="https://www.mensrepublic.id/assets/images/uploads/product/edgard-1569399709-pgNdfzWUFV81.jpg" alt="">
                        <div class="product-info">
                            <div class="title">Edgard - Coffee</div>

                            <div class="old-price">Rp 429,000</div>

                            <div class="old-price"></div>

                            <div class="price">Rp 290,000</div>

                            <div class="qty-size">

                                Jumlah : <strong class="cart_quantity">2</strong> /
                                Ukuran : <strong>39</strong>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="title">Catatan untuk Men's Republic</div>
                <textarea name="notes" class="notes"></textarea>

                <div class="title">Input Voucher Code</div>
                <div class="voucher">
                    <div class="voucher-wrapper">
                        <input type="text" placeholder="" value="" name="voucher_code">
                        <button>
                            pakai <i class="fa fa-spinner fa-spin fa-fw loading_pakai hide"></i>
                        </button>
                    </div>
                    <div class="voucher_message"></div>
                </div>
                <div class="order-summary">
                    <h1>Ringkasan Belanja</h1>
                    <hr>
                    <div class="summary-ongkir">
                        <span>Ongkos Kirim</span>
                        <span class="summary-ongkir-value"></span>
                    </div>
                    <div class="summary-belanja">
                        <span>Total Belanja</span>
                        <span class="summary-belanja-value">Rp 880,000</span>
                    </div>

                    <div class="potongan-voucher" style="display:none">
                        <span>Potongan Voucher</span>
                        <span data-saldo="0" class="potongan-voucher-value">- Rp 0</span>
                    </div>

                    <hr>
                    <div class="summary-all">
                        <span>Total Bayar</span>
                        <span><strong class="summary-all-value"></strong></span>
                    </div>
                </div>
            </div>

            <div class="navigation">
                <button class="back"> <i class="svg_icon__order_leftarrow"></i> </button>
                <button class="confirm-midtrans">hajar men <i class="fa fa-spin fa-spinner hide"></i> </button>

                <form action="https://www.mensrepublic.id/order/confirmation" method="post" id="form-checkout">
                    <input type="hidden" name="address_id" value="">
                    <input type="hidden" name="notes_hidden" value="">
                    <input type="hidden" name="bank_account" value="">
                    <input type="hidden" id="token_id" name="token_id">
                    <div class="confirm confirm-checkout">
                        hajar men </div>
                </form>

            </div>

            <div class="order-curtain active"></div>

        </section> -->

<!-- <div class="loadings hide">
            <img src="https://www.mensrepublic.id/assets/images/transaction/spinner.gif" alt="">
            <span><strong>.. Mohon Tunggu ..</strong> <br><br> Jangan Tutup Browser Ini</span>
        </div> -->