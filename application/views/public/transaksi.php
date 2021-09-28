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
    <form action="" method="post">
        <div class="orderpage">
            <section class="left-column">
                <div class="ticker">
                    <i class="svg-icon svg_icon__order_speaker"></i>
                    <span>Hubungi Whatsapp 083116200500 jika terjadi kendala dalam proses belanja</span>
                </div>
                <div class="content">
                    <!-- <div class="title">Nama:</div> -->
                    <!-- <div class="value"><?= $profil->nama_lengkap ?></div> -->
                    <!-- <div class="col-lg-6"> -->
                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    ">Nama Lengkap</div>
                    <input type="text" name="nama_lengkap" style="color:black" value="<?= $profil->nama_lengkap ?>" required>
                    <!-- </div> -->

                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    padding-top: 20px;
                    ">Nomor Telepon:</div>
                    <input type="text" name="no_telp" style="color:black" value="<?= $profil->no_telp ?>" required>

                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    padding-top: 20px;
                    ">Email:</div>
                    <!-- <div class="value phone-number"><?= $profil->email ?></div> -->
                    <input type="text" style="color:black" disabled name="email" value="<?= $profil->email ?>">

                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    padding-top: 20px;
                    ">Pilih Alamat Pengiriman:</div>
                    <div class="address">
                        <div class="address-box selected" style="border-radius: 15px;padding-bottom: 27px;">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    ">Alamat 1</div>
                                    <input type="text" name="alamat_1" placeholder="contoh: jln pramuka" style="color:black" value="<?= $profil->alamat_1 ?>" required>
                                </div>
                                <div class="col-lg-6">
                                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    padding-top: 20px;
                    ">Alamat 2</div>
                                    <input type="text" name="alamat_2" placeholder="contoh: Desa Sungai Raya Rt 01 / Rw 02" style="color:black" value="<?= $profil->alamat_2 ?>" required>
                                </div>
                                <input type="hidden" value="<?= $profil->id_alamat ?>" name="id_alamat">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    padding-top: 20px;
                    ">Provinsi</div>
                                    <select style="color:black" name="provinsi_id" id="provinsi_id">
                                        <?php if ($profil->provinsi_id == "") { ?>
                                            <option value="">Pilih Provinsi</option>
                                        <?php } else { ?>
                                            <option value="<?= $profil->provinsi_id . "," . $profil->provinsi ?>"><?= $profil->provinsi ?></option>
                                        <?php } ?>
                                        <?php
                                        foreach ($list_provinsi as $row) { ?>
                                            <option value="<?= $row->province_id . "," . $row->province ?>"><?= $row->province ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    padding-top: 20px;
                    ">Kabupaten</div>
                                    <div class="loader" id="loader_kabupaten"></div>
                                    <select style="color:black" name="kabupaten_id" id="kabupaten_id">
                                        <?php if ($profil->kabupaten_id == "") { ?>
                                            <option value="">Pilih Kabupaten</option>
                                        <?php } else { ?>
                                            <option value="<?= $profil->kabupaten_id . "," . $profil->kabupaten ?>"><?= $profil->kabupaten ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    padding-top: 20px;
                    ">Kecamatan</div>
                                    <div class="loader" id="loader_kecamatan"></div>
                                    <select style="color:black" name="kecamatan_id" id="kecamatan_id">
                                        <?php if ($profil->kecamatan_id == "") { ?>
                                            <option value="">Pilih Kecamatan</option>
                                        <?php } else { ?>
                                            <option value="<?= $profil->kecamatan_id . "," . $profil->kecamatan ?>"><?= $profil->kecamatan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    padding-top: 20px;
                    ">Kode Pos</div>
                                    <input type="text" style="color:black" name="kode_pos" value="<?= $profil->kode_pos ?>">
                                </div>
                                <input type="hidden" value="<?= $profil->id_alamat ?>" name="id_alamat">
                                <!-- <ul>
                            <li><?= $profil->alamat_1 ?></li>
                            <li><?= $profil->alamat_2 ?>, Kabupaten <?= $profil->kabupaten ?></li>
                            <li><?= $profil->kecamatan ?></li>
                            <li><?= $profil->provinsi ?></li>
                            <li><?= $profil->kode_pos ?></li>
                        </ul>
                        <button>Pilih Alamat Pengiriman</button> -->
                            </div>
                        </div>

                        <!-- <a href="<?= base_url() ?>user/home/profil" class="update-address">Ubah alamat atau nomor telepon</a> -->
                        <!-- <div class="kurir-description">Pembeli melakukan pengambilan barang menggunakan Grab-Send atau Go-Send ke kantor Men’s Republic (Jakarta)</div> -->
                        <br>
                    </div>
                    <!-- <div class="order-curtain active"></div> -->
            </section>
            <section class="right-column">
                <div class="content">
                    <?php foreach ($cart as $row) {
                        if ($row['id_sub_produk'] == null) {
                    ?>
                            <div class="products">
                                <div class="product-box" id="product-box__39395">
                                    <img src="<?= $thumbnail[$row['id_produk']] ?>" alt="">
                                    <div class="product-info">
                                        <div class="title"><?= $row['nama_produk'] ?></div>
                                        <?php if ($row['diskon_produk'] != 0) { ?>
                                            <div class="old-price">RP <?= number_format($row['harga_produk']) ?></div>
                                            <div class="price">Rp <?= number_format($row['harga_produk'] - (($row['diskon_produk'] / 100) * $row['harga_produk'])) ?></div>
                                        <?php } else { ?>
                                            <div class="price">Rp <?= number_format($row['harga_produk']) ?></div>
                                        <?php } ?>
                                        <div class="qty-size">
                                            Jumlah : <strong class="cart_quantity"><?= $row['quantity'] ?></strong> /
                                            Ukuran : <strong><?= $row['size'] ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="products">
                                <div class="product-box" id="product-box__39395">
                                    <img src="<?= base_url() ?>/assets/images/add_on.png" alt="">
                                    <div class="product-info">
                                        <div class="title"><?= $row['nama_sub'] ?></div>
                                        <div class="price">Rp <?= number_format($row['harga_sub']) ?></div>
                                        <div class="qty-size">
                                            Jumlah : <strong class="cart_quantity"><?= $row['quantity'] ?></strong> /
                                            Ukuran : <strong><?= $row['size'] ?></strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    } ?>
                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    ">Pilih Pengiriman:</div>
                    <div class="kurir">
                        <select style="color:black" name="kurir" id="kurir" required>
                            <option value="">Pilih Kurir</option>
                            <option value="jne">JNE</option>
                            <option value="jnt">J&T</option>
                        </select>
                    </div>
                    <br>
                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    ">Kode Voucher</div>
                    <input type="text" id="voucher" name="code_voucher" placeholder="Masukkan Kode Voucher" style="color:black" value="">
                    <br />
                    <div class="title" style="
                    font-size: 13px;
                    padding: 5px;
                    font-weight: 800;
                    margin-top:10px;
                    ">Catatan untuk CHAMELEON CLOTH (optional)</div>
                    <textarea style="color:black" name="catatan" class="notes"></textarea>
                    <div id="loader" style="">
                        <h4 style="color: #0000008c;font-size: 15px;font-weight: 800;text-align: center;">Please wait..</h4>
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
                            <span class="summary-belanja-value"><b>Rp <?= number_format($total, 2) ?></b></span>
                        </div>
                        <hr>
                        <div class="summary-all">
                            <span>Total Bayar</span>
                            <span><strong class="summary-all-value"></strong><b>Rp</b> <b id="total-bayar"><?= number_format($total, 2) ?></b> </span>
                        </div>
                    </div>
                    <!-- <input type="hidden" id="kecamatan_id" value="<?= $profil->kecamatan_id ?>" required> -->
                    <input type="hidden" id="total_ongkir" name="total_ongkir" required>
                    <input type="hidden" id="total_bayar" name="total_bayar" required>
                    <input type="hidden" id="system_note" name="system_note">
                    <input type="submit" name="kirim" value="CHECKOUT" style="margin-bottom: 20px;">
                    <!-- </form> -->
                </div>
                <!-- </form> -->
            </section>
        </div>
    </form>
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
        // alert(total)
        $("#kurir").on('change', function() {
            var courier = $(this).val();
            var destination = $("#kecamatan_id").val();
            var mode = "GET";
            var total_ongkir = 0;
            var total = <?php echo $total ?>;
            var total_barang = <?php echo $total_jumlah ?>;
            var total_weight = <?php echo $total_berat ?>;
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
                    weight: total_weight
                },
                success: function(data) {
                    console.log(data);
                    // swal('Success!', data.rajaongkir.results[0].costs[0].cost[0].value, data.status);
                    var ongkir = 0;
                    if (courier == 'jne') {
                        ongkir = data.rajaongkir.results[0].costs[0].cost[0].value
                    } else {
                        ongkir = data.rajaongkir.results[0].costs[0].cost[0].value
                    }
                    var total_bayar = 0
                    total_ongkir = total_ongkir + ongkir
                    total_bayar = total + total_ongkir
                    $('#total_ongkir').val(total_ongkir);
                    $('#total_bayar').val(total_bayar);
                    $('#ongkos-kirim').text(number_format(total_ongkir, 2, '.', ','));
                    $('#total-bayar').text(number_format(total_bayar, 2, '.', ','));
                    // $('#ongkos-kirim').val(total_ongkir);
                    // $('#total').text("Rp " + total.toLocaleString("en"));
                    console.log(data);
                    // $('#voucher').trigger("change");
                    $('#loader').hide();
                    $('#order').show();
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                    console.log(errorThrown);
                }
            })
        });
        $('#voucher').change(function() {
            if (!$('#kurir').val()) {
                alert("Harap Pilih kurir terlebih dahulu.");
                $(this).val("");
            } else {
                var total_ongkir = $('#total_ongkir').val();
                $('#loader').show();
                $('#order').hide();
                if ($(this).val().length !== 0) {
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo site_url() ?>" + "admin/voucher/checkVoucher/" + $(this).val(),
                        dataType: 'JSON',
                        success: function(data) {
                            console.log(data);
                            if (!data.status) {
                                alert("Kode Voucher Tidak Valid.");
                                $(this).val("");
                            } else {
                                let ongkir = 0;
                                var total_bayar = <?php echo $total ?>;
                                if (data.data.discount_voucher < 100) {
                                    let percentage = 100 - data.data.discount_voucher;
                                    ongkir = (percentage / 100) * total_ongkir;
                                    total_bayar = <?php echo $total ?> + ongkir;
                                }
                                $('#total_bayar').val(total_bayar);
                                $('#ongkos-kirim').text(number_format(ongkir, 2, '.', ','));
                                $('#total-bayar').text(number_format(total_bayar, 2, '.', ','));
                                console.log(data);
                            }
                            $('#loader').hide();
                            $('#order').show();
                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert(errorThrown);
                            console.log(errorThrown);
                            $('#loader').hide();
                            $('#order').show();
                        }
                    })
                } else {
                    let ongkir = 0;
                    var total_bayar = total;
                    ongkir = total_ongkir;
                    total_bayar = <?php echo $total ?> + ongkir;
                    $('#total_bayar').val(total_bayar);
                    $('#ongkos-kirim').text(number_format(ongkir, 2, '.', ','));
                    $('#total-bayar').text(number_format(total_bayar, 2, '.', ','));
                    $('#loader').hide();
                    $('#order').show();
                }

            }
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
        $('#loader_kabupaten').hide()
        $('#loader_kecamatan').hide()
        $('#provinsi_id').on('change', function() {
            var str = $(this).val()
            var res = ""
            res = str.split(",")
            $('#loader_kabupaten').show()
            $('#kabupaten_id').hide()
            $.ajax({
                type: 'GET',
                url: "<?php echo site_url() ?>" + "user/rajaongkir/get_kabupaten/" + res[0],
                dataType: 'JSON',
                data: {},
                success: function(data) {
                    $('#kabupaten_id').empty().append('<option value="" selected>Pilih Kabupaten</option>');
                    $.each(data.rajaongkir.results, function(key, value) {
                        $('#kabupaten_id').append('<option value="' + value.city_id + ',' + value.city_name + '">' + value.city_name + '</option>')
                    });
                    $('#kabupaten_id').show();
                    $('#loader_kabupaten').hide()
                    console.log(data)
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                    console.log(errorThrown);
                }
            })
        });
        $('#kabupaten_id').on('change', function() {
            var str = $(this).val()
            var res = ""
            res = str.split(",")
            $('#loader_kecamatan').show()
            $('#kecamatan_id').hide()
            $.ajax({
                type: 'GET',
                url: "<?php echo site_url() ?>" + "user/rajaongkir/get_kecamatan/" + res[0],
                dataType: 'JSON',
                data: {},
                success: function(data) {
                    $('#kecamatan_id').empty().append('<option value="" selected>Pilih Kecamatan</option>');
                    $.each(data.rajaongkir.results, function(key, value) {
                        $('#kecamatan_id').append('<option value="' + value.subdistrict_id + ',' + value.subdistrict_name + '">' + value.subdistrict_name + '</option>')
                    });
                    console.log(data)
                    $('#loader_kecamatan').hide()
                    $('#kecamatan_id').show()
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                    console.log(errorThrown);
                }
            })
        });
        $('#kecamatan_id').on('change', function() {
            var courier = $("#kurir").val();
            if (courier != "") {
                var destination = $(this).val();
                var mode = "GET";
                var total = <?php echo $total ?>;
                var total_ongkir = 0;
                var total_barang = <?php echo count($cart) ?>;
                var total_weight = <?php echo $total_berat ?>;
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
                        weight: total_weight
                    },
                    success: function(data) {
                        console.log(data);
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
                        $('#ongkos-kirim').text(number_format(total_ongkir, 2, '.', ','));
                        $('#total-bayar').text(number_format(total, 2, '.', ','));
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
            }
        });
    });

    function number_format(number, decimals, dec_point, thousands_sep) {
        // Strip all characters but numerical ones.
        number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
        var n = !isFinite(+number) ? 0 : +number,
            prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
            sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
            dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
            s = '',
            toFixedFix = function(n, prec) {
                var k = Math.pow(10, prec);
                return '' + Math.round(n * k) / k;
            };
        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
        s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
        if (s[0].length > 3) {
            s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
        }
        if ((s[1] || '').length < prec) {
            s[1] = s[1] || '';
            s[1] += new Array(prec - s[1].length + 1).join('0');
        }
        return s.join(dec);
    }
</script>