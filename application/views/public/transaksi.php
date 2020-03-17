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
                <span>Hubungi Whatsapp 08xxxxxxxxxx jika terjadi kendala dalam proses belanja</span>
            </div>
            <div class="content">
                <div class="title">Nama:</div>
                <div class="value"><?= $profil->nama_lengkap ?></div>

                <div class="title">Nomor Telepon:</div>
                <div class="value phone-number"><?= $profil->no_telp ?></div>

                <div class="title">Email:</div>
                <div class="value phone-number"><?= $profil->email ?></div>

                <div class="title">Pilih Alamat Pengiriman:</div>

                <div class="address">

                    <div class="address-box selected">
                        <ul>
                            <li><?= $profil->alamat_1 ?></li>
                            <li><?= $profil->alamat_2 ?>, Kabupaten <?= $profil->kabupaten ?></li>
                            <li><?= $profil->kecamatan ?></li>
                            <li><?= $profil->provinsi ?></li>
                            <li><?= $profil->kode_pos ?></li>
                        </ul>
                        <button>Pilih Alamat Pengiriman</button>
                    </div>
                </div>

                <a href="<?= base_url() ?>user/home/profil" class="update-address">Ubah alamat atau nomor telepon</a>
                <!-- <div class="kurir-description">Pembeli melakukan pengambilan barang menggunakan Grab-Send atau Go-Send ke kantor Men’s Republic (Jakarta)</div> -->
                <br>
            </div>
            <div class="order-curtain active"></div>
        </section>
        <section class="right-column">
            <div class="content">
                <form action="" method="post">
                    <?php foreach ($cart as $row) { ?>
                        <div class="products">
                            <div class="product-box" id="product-box__39395">
                                <img src="<?= base_url() ?>/assets/uploads/thumbnail_produk/<?= $thumbnail[$row['id_produk']] ?>" alt="">
                                <div class="product-info">
                                    <div class="title"><?= $row['nama_produk'] ?></div>
                                    <!-- <div class="old-price">Rp <?= number_format($row['harga_produk']) ?></div> -->
                                    <!-- <div class="old-price"></div> -->
                                    <div class="price">Rp <?= number_format($row['harga_produk']) ?></div>
                                    <div class="qty-size">
                                        Jumlah : <strong class="cart_quantity"><?= $row['quantity'] ?></strong> /
                                        Ukuran : <strong><?= $row['size'] ?></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="title">Pilih Pengiriman:</div>
                    <div class="kurir">
                        <select style="color:black" name="kurir" id="kurir" required>
                            <option value="">Pilih Kurir</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS Indonesia</option>
                        </select>
                    </div>
                    <br>
                    <div class="title">Catatan untuk Chameleon cloth (optional)</div>
                    <textarea style="color:black" name="catatan" class="notes"></textarea>
                    <div id="loader">
                        <h4 style="color:black">Loading</h4>
                        <div class="loader">
                        </div>
                    </div>
                    <div class="order-summary" id="order">
                        <h1>Ringkasan Belanja</h1>
                        <hr>
                        <div class="summary-ongkir">
                            <span>Ongkos Kirim</span>
                            <span class="summary-ongkir-value"><b>Rp</b> <b id="ongkos-kirim"> 0</b> </span>
                        </div>
                        <div class="summary-belanja">
                            <span>Total Belanja</span>
                            <span class="summary-belanja-value"><b>Rp <?= $total ?></b></span>
                        </div>
                        <hr>
                        <div class="summary-all">
                            <span>Total Bayar</span>
                            <span><strong class="summary-all-value"></strong><b>Rp</b> <b id="total-bayar"><?= $total ?></b> </span>
                        </div>
                    </div>
                    <input type="hidden" id="kecamatan_id" value="<?= $profil->kecamatan_id ?>">
                    <input type="hidden" id="total_ongkir" name="total_ongkir">
                    <input type="hidden" id="total_bayar" name="total_bayar">
                    <input type="submit" name="kirim" value="BELI">
                </form>
            </div>
            <!-- </form> -->
        </section>
    </div>
</section>

<?php
$this->load->view('public/footer');
?>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<!-- <script src="<?= base_url() ?>assets/admin/node_modules/sweetalert2.min.js"></script> -->
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/sweetalert2.min.css"> -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#loader').hide();
        $("#kurir").on('change', function() {
            var courier = $(this).val();
            var destination = $("#kecamatan_id").val();
            var mode = "GET";
            var total = <?php echo $total ?>;
            var total_ongkir = 0;
            var total_barang = <?php echo count($cart) ?>;
            // alert('woy');
            $('#loader').show();
            $('#order').hide();
            $.ajax({
                type: 'GET',
                url: "<?php echo site_url() ?>" + "user/rajaongkir/hitung_ongkir",
                dataType: 'JSON',
                data: {
                    courier: courier,
                    subdistrict: destination,
                    barang: total_barang,
                },
                success: function(data) {
                    // swal('Success!', data.rajaongkir.results[0].costs[0].cost[0].value, data.status);
                    var ongkir = 0;
                    if (courier == 'jne') {
                        ongkir = data.rajaongkir.results[0].costs[1].cost[0].value
                    } else {
                        ongkir = data.rajaongkir.results[0].costs[0].cost[0].value
                    }
                    total_ongkir = total_ongkir + ongkir
                    total = total + total_ongkir
                    $('#total_ongkir').val(total_ongkir);
                    $('#total_bayar').val(total);
                    $('#ongkos-kirim').text(total_ongkir);
                    $('#total-bayar').text(total);
                    // $('#ongkos-kirim').val(total_ongkir);
                    // $('#total').text("Rp " + total.toLocaleString("en"));
                    console.log(data);
                    $('#loader').hide();
                    $('#order').show();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                    console.log(errorThrown);
                }
            })
        });
        // $("#kurir").change(function() {
        //     var courier = $(this).val();
        //     var destination = $("#kecamatan_id").val();
        //     var mode = "GET";
        //     var total = <?php echo $total ?>;
        //     var total_ongkir = 0;
        //     var total_barang = <?php count($cart) ?>;
        //     $.ajax({
        //         type: 'GET',
        //         url: "<?php echo site_url() ?>" + "user/rajaongkir/hitung_ongkir",
        //         dataType: 'JSON',
        //         data: {
        //             courier: courier,
        //             subdistrict: destination,
        //             barang: total_barang,
        //         },
        //         success: function(data) {
        //             // swal('Success!', data.rajaongkir.results[0].costs[0].cost[0].value, data.status);
        //             total_ongkir = total_ongkir + data.rajaongkir.results[0].costs[0].cost[0].value
        //             total = total + total_ongkir
        //             $('#total_ongkir').val(total_ongkir);
        //             $('#total_bayar').val(total);
        //             $('#ongkos-kirim').text(total_ongkir);
        //             $('#total-bayar').text(total);
        //             // $('#ongkos-kirim').val(total_ongkir);
        //             // $('#total').text("Rp " + total.toLocaleString("en"));
        //             console.log(data);
        //         },
        //         error: function(XMLHttpRequest, textStatus, errorThrown) {
        //             alert(errorThrown);
        //             console.log(errorThrown);
        //         }
        //     })
        // });
    });
</script>