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

    <div class="dashboard-user">
        <div class="background-layout"></div>
        <div class="container">
            <h1>MY PROFILE</h1>
            <div class="left-right">

                <div class="left-side">
                    <div class="card">
                        <div class="card-row">
                            <!-- <img src="https://www.mensrepublic.id/assets/images/dashboard/default-avatar.png" alt=""> -->
                            <h1 style="margin-top:20px"><?= $profil->username; ?> <i class="fa fa-edit" onclick="window.location.href = '<?= base_url('ubah_profile') ?>';">
                                </i></h1>
                            <!-- <span>Joined 13 Februari 2020</span> -->
                            <hr>
                            <ul class="info-profile">
                                <li> <i class="fa fa-envelope"></i> <span><a href="#" class="__cf_email__" data-cfemail="1876776e71767c79766d6a7e2920587f75797174367b7775"><?= $profil->email; ?></a> </span> </li>
                                <!-- <li> <i class="svg-icon svg_icon__dashboard_gift"></i> <span>16 Sepember 1998 </span>  </li> -->
                                <!-- <li> <i class="svg-icon svg_icon__dashboard_phone"></i> <span>081226809435 </span>  </li> -->
                                <?php if ($profil) {
                                    // foreach ($profil as $profil) {
                                ?>
                                    <li class="alamat"> <i class="svg-icon svg_icon__dashboard_pin"></i>
                                        <span>
                                            <?= $profil->alamat_1 ?>
                                            <?= $profil->alamat_2 ?>
                                            <?= "Kecamatan " . $profil->kecamatan ?>
                                            <?= "Kabupaten " . $profil->kabupaten ?>
                                            <?= $profil->kode_pos ?>
                                            <!-- Jawa Tengah -->
                                        </span>
                                    </li>
                                <?php
                                    // }
                                } ?>
                                <!-- <li><i class="svg-icon svg_icon__dashboard_phone"></i> <span><?= $alamat[0]->no_telp ?></span></li> -->

                            </ul>
                            <button class="expand">
                                <i class="svg-icon svg_icon__dashboard_chevron"></i>
                            </button>
                            <div class="row">
                                <div class="column" style="width:100%; float: right;">
                                    <a href="<?= base_url() ?>keluar" class="logout">
                                        <i class="fa fa-sign-out"></i> logout </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right-side">
                    <div class="card">
                        <div class="card-row">
                            <h1>Edit Profile</h1>
                            <div class="data-diri">
                                <?php echo $this->session->flashdata('pesan') ?>
                                <form action="<?= base_url("ubah_profile") ?>" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="title">Username</div>
                                            <input type="text" style="color: black;" disabled name="username" value="<?= $profil->username ?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="title">Nama Lengkap</div>
                                            <input type="text" style="color: black;" name="nama_lengkap" value="<?= $profil->nama_lengkap ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="title">Email</div>
                                            <input type="text" style="color: black;" disabled name="email" value="<?= $profil->email ?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="title">No Telphone</div>
                                            <input type="text" style="color: black;" name="no_telp" value="<?= $profil->no_telp ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="title">Alamat 1</div>
                                            <input type="text" style="color: black;" name="alamat_1" value="<?= $profil->alamat_1 ?>">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="title">Alamat 2</div>
                                            <input type="text" style="color: black;" name="alamat_2" value="<?= $profil->alamat_2 ?>">
                                        </div>
                                        <input type="hidden" value="<?= $profil->id_alamat ?>" name="id_alamat">
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="title">Provinsi</div>
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
                                            <div class="title">Kabupaten</div>
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
                                            <div class="title">Kecamatan</div>
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
                                            <div class="title">Kode Pos</div>
                                            <input type="text" style="color: black;" name="kode_pos" value="<?= $profil->kode_pos ?>">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input style="background:#3bb175; float:left" type="submit" name="kirim" value="Simpan">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal review -->
    <div id="modal_review" class="modal fade modal-review" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    Review
                </div>
                <div class="modal-body"></div>
                <div class="msg"></div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- end of modal review -->
</section>
<?php

$this->load->view('public/footer');
?>
<script type="text/javascript">
    $(document).ready(function() {
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
    });
</script>