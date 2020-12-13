<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Produk</title>
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/admin/node_modules/dropzone/dist/min/dropzone.min.css">
    <?php $this->load->view('admin/assets/stylesheets') ?>

    <!-- include summernote css/js -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js" defer></script>
    <style>
        .note-editable p {
            line-height: 1;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <!-- header content -->
            <?php $this->load->view('admin/master/header') ?>

            <!-- main content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Form Produk Chameleon</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item"><a href="<?= base_url() ?>admin/home">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="<?= base_url() ?>admin/akun">Admin</a></div>
                        </div>
                    </div>
                    <div class="section-body">
                        <h2 class="section-title">Form Produk</h2>
                        <p class="section-lead">
                            Silahkan lengkapi form dibawah ini untuk menambahkan produk baru.
                        </p>
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="card">
                                    <form action="#" enctype="multipart/form-data" method="POST">
                                        <div class="card-header">
                                            <h4>Detail Produk</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="nama_p">Nama Produk</label>
                                                        <input type="text" class="form-control" name="nama_p" id="nama_p" value="<?php if (isset($produk)) {
                                                                                                                                        echo $produk->nama_produk;
                                                                                                                                    } ?>" placeholder="Masukkan nama produk">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="kat_p">Kategori Produk</label>
                                                        <select class="form-control" name="kat_p" id="kat_p">
                                                            <option>Pilih kategori produk</option>
                                                            <?php foreach ($kat_p as $row) { ?>
                                                                <option value="<?= $row['id_kategori'] ?>" <?php if (isset($produk) && $produk->id_kategori == $row['id_kategori']) {
                                                                                                                echo 'selected';
                                                                                                            } ?>><?= $row['nama_kategori'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-3">
                                                        <label for="size_p">Ukuran Produk</label>
                                                        <input type="text" name="size_p" id="size_p" placeholder="Masukkan ukuran produk" value="<?php if (isset($produk)) {
                                                                                                                                                        echo $produk->size_produk;
                                                                                                                                                    } ?>" class="form-control">
                                                    </div>
                                                    <div class="col-lg-3">
                                                        <label for="stok_p">Stok Produk</label>
                                                        <input type="number" name="stok_p" id="stok_p" placeholder="Masukkan stok produk" value="<?php if (isset($produk)) {
                                                                                                                                                        echo $produk->stok_produk;
                                                                                                                                                    } ?>" class="form-control">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="harga_p">Harga Produk</label>
                                                        <input type="number" name="harga_p" id="harga_p" placeholder="Masukkan harga produk" value="<?php if (isset($produk)) {
                                                                                                                                                        echo $produk->harga_produk;
                                                                                                                                                    } ?>" class="form-control">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="harga_p">Diskon Produk %</label>
                                                        <input type="number" name="diskon_p" id="diskon_p" placeholder="Masukkan diskon produk" value="<?php if (isset($produk)) {
                                                                                                                                                            echo $produk->diskon_produk;
                                                                                                                                                        } ?>" class="form-control">
                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label for="berat_p">Berat Produk (gram)</label>
                                                        <input type="number" name="berat_p" id="berat_p" placeholder="Masukkan berat produk" value="<?php if (isset($produk)) {
                                                                                                                                                        echo $produk->berat_produk;
                                                                                                                                                    } ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">Label Produk</label>
                                                <div class="selectgroup selectgroup-pills">
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="label_p[]" value="new" class="selectgroup-input" <?php if (isset($produk) && strpos($produk->label_produk, 'new') !== false) {
                                                                                                                                            echo "checked";
                                                                                                                                        } ?>>
                                                        <span class="selectgroup-button">NEW</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="label_p[]" value="diskon" class="selectgroup-input" <?php if (isset($produk) && strpos($produk->label_produk, 'diskon') !== false) {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                                        <span class="selectgroup-button">DISCOUNT</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="label_p[]" value="paling laris" class="selectgroup-input" <?php if (isset($produk) && strpos($produk->label_produk, 'paling laris') !== false) {
                                                                                                                                                    echo "checked";
                                                                                                                                                } ?>>
                                                        <span class="selectgroup-button">PALING LARIS</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="label_p[]" value="limited" class="selectgroup-input" <?php if (isset($produk) && strpos($produk->label_produk, 'limited') !== false) {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                                        <span class="selectgroup-button">LIMITED</span>
                                                    </label>
                                                    <label class="selectgroup-item">
                                                        <input type="checkbox" name="label_p[]" value="premium" class="selectgroup-input" <?php if (isset($produk) && strpos($produk->label_produk, 'premium') !== false) {
                                                                                                                                                echo "checked";
                                                                                                                                            } ?>>
                                                        <span class="selectgroup-button">PREMIUM</span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="desc_p">Deskripsi Produk</label>
                                                        <textarea id="summernote" style="height:300px" name="desc_p" id="desc_p"><?php if (isset($produk)) {
                                                                                                                                        echo $produk->deskripsi_produk;
                                                                                                                                    } ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="link">Link Video</label>
                                                        <input type="text" name="link" id="link" class="form-control" placeholder="Masukkan link video" value="<?php if (isset($produk)) {
                                                                                                                                                                    echo $produk->video_link;
                                                                                                                                                                } ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="foto_p">Foto Produk</label>
                                                        <div class="dropzone" id="mydropzone">
                                                            <!-- <div class="fallback">
                                                                <input name="file" type="file" multiple/>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card card-success">
                                                <div class="card-header">
                                                    <h4>Sub Produk</h4>
                                                    <div class="card-header-action">
                                                        <button type="button" class="btn btn-sm btn-success" id="tambahSubProduk">+ Tambah Sub Produk</button>
                                                        <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a>
                                                    </div>
                                                </div>
                                                <div class="collapse show" id="mycard-collapse" style="">
                                                    <div class="card-body">
                                                        <div id="parentSub">
                                                            <?php if (isset($subProduk) && !empty($subProduk)) {
                                                                $index = 1;
                                                                foreach ($subProduk as $key => $item) {
                                                            ?>
                                                                    <div class="form-group" id="subProduk<?= $index ?>">
                                                                        <input type="hidden" name="id_sub[]" value="<?= $item['id'] ?>" class="form-control">
                                                                        <div class="row" style="margin-top: 10px;">
                                                                            <div class="col-lg-6">
                                                                                <label for="nama_sub[]">Nama Sub Produk</label>
                                                                                <input type="text" class="form-control" name="nama_sub[]" id="nama_sub[]" value="<?= $item['nama_sub'] ?>" placeholder="Masukkan nama sub produk">
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <div class="row">
                                                                                    <div class="col-lg-6">
                                                                                        <label for="size_p">Ukuran Sub Produk</label>
                                                                                        <input type="text" name="size_sub[]" id="size_sub[]" placeholder="Masukkan ukuran sub produk" value="<?= $item['size_sub'] ?>" class="form-control">
                                                                                    </div>
                                                                                    <div class="col-lg-6">
                                                                                        <label for="stok_p">Stok Sub Produk</label>
                                                                                        <input type="number" name="stok_sub[]" id="stok_sub[]" placeholder="Masukkan stok sub produk" value="<?= $item['stok_sub'] ?>" class="form-control">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-lg-4">
                                                                                <label for="harga_sub[]">Harga Sub Produk</label>
                                                                                <input type="number" name="harga_sub[]" id="harga_sub[]" placeholder="Masukkan harga sub produk" value="<?= $item['harga_sub'] ?>" class="form-control">
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <label for="harga_sub[]">Diskon Sub Produk %</label>
                                                                                <input type="number" name="diskon_sub[]" id="diskon_sub[]" placeholder="Masukkan diskon sub produk" value="<?= $item['diskon_sub'] ?>" class="form-control">
                                                                            </div>
                                                                            <div class="col-lg-4">
                                                                                <label for="berat_sub[]">Berat Sub Produk (gram)</label>
                                                                                <input type="number" name="berat_sub[]" id="berat_sub[]" placeholder="Masukkan berat sub produk" value="<?= $item['berat_sub'] ?>" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mt-5">
                                                                            <div class="col-lg-12">
                                                                                <button type="button" id="btnDelSub<?= $index ?>" data-id="subProduk<?= $index ?>" class="btn btn-danger btn-sm btnHapusSub"> X Hapus Sub Produk </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <?php
                                                                    $index++;
                                                                }
                                                            } else { ?>
                                                                <div class="form-group" id="subProduk1">
                                                                    <div class="row mt-3">
                                                                        <div class="col-lg-6">
                                                                            <label for="nama_sub[]">Nama Sub Produk</label>
                                                                            <input type="text" class="form-control" name="nama_sub[]" id="nama_sub[]" value="" placeholder="Masukkan nama sub produk">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <div class="row">
                                                                                <div class="col-lg-6">
                                                                                    <label for="size_p">Ukuran Sub Produk</label>
                                                                                    <input type="text" name="size_sub[]" id="size_sub[]" placeholder="Masukkan ukuran sub produk" value="" class="form-control">
                                                                                </div>
                                                                                <div class="col-lg-6">
                                                                                    <label for="stok_p">Stok Sub Produk</label>
                                                                                    <input type="number" name="stok_sub[]" id="stok_sub[]" placeholder="Masukkan stok sub produk" value="" class="form-control">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-lg-4">
                                                                            <label for="harga_sub[]">Harga Sub Produk</label>
                                                                            <input type="number" name="harga_sub[]" id="harga_sub[]" placeholder="Masukkan harga sub produk" value="" class="form-control">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="diskon_sub[]">Diskon Sub Produk %</label>
                                                                            <input type="number" name="diskon_sub[]" id="diskon_sub[]" placeholder="Masukkan diskon sub produk" value="" class="form-control">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="berat_sub[]">Berat Sub Produk (gram)</label>
                                                                            <input type="number" name="berat_sub[]" id="berat_sub[]" placeholder="Masukkan berat sub produk" value="" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-lg-12">
                                                                            <button type="button" id="btnDelSub1" data-id="subProduk1" class="btn btn-danger btn-sm btnHapusSub"> X Hapus Sub Produk </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <input type="submit" name="kirim" class="btn btn-primary" value="Simpan">
                                            <input type="reset" class="btn btn-secondary" value="Reset">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php $this->load->view('admin/master/footer') ?>
        </div>
    </div>
    <?php $this->load->view('admin/assets/javascript') ?>
    <!-- JS Libraies -->
    <script src="<?= base_url() ?>assets/admin/node_modules/dropzone/dist/min/dropzone.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script> -->
    <!-- <script src="<?= base_url() ?>assets/admin/node_modules/summernote/dist/summernote-bs4.js"></script> -->
    <!-- Page Specific JS File -->
    <script type="text/javascript">
        var nama = "default"
        var kode_p = ""

        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = window.location.search.substring(1),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
                }
            }
        };

        if (getUrlParameter('id')) {
            kode_p = getUrlParameter('id');
        }

        $(document).on("change", "#nama_p", function() {
            nama = $(this).val()
        })
        Dropzone.autoDiscover = false;
        var foto_upload = new Dropzone(".dropzone", {
            url: "<?php echo base_url('admin/produk/uploadFile') ?>",
            maxFilesize: 2,
            method: "post",
            acceptedFiles: "image/*",
            uploadMultiple: true,
            paramName: "thumbnail",
            dictInvalidFileType: "Type file ini tidak dizinkan",
            addRemoveLinks: true,
        });
        //Event ketika Memulai mengupload
        foto_upload.on("sendingmultiple", function(a, b, c) {
            console.log(nama);
            c.append("file_name", nama)
            c.append("kode_p", kode_p)
        });

        foto_upload.on("removedfile", function(a, b, c) {
            // var name = file.name;
            // var id=0;
            // var id = 
            var request;
            request = $.ajax({
                type: 'POST',
                url: '<?php echo base_url('admin/produk/deleteFile') ?>',
                data: {
                    "id": getUrlParameter('id'),
                    "nama": a.name
                },
                dataType: 'html'
            });
            request.done(function(response, data, jqXHR) {
                // Log a message to the console
                console.log(response);
            });
            // c.append("file_name", nama)
            // c.append("status", "remove")
        })
        $(document).ready(function() {

            $('#btnDelSub1').hide()
            // if (getUrlParameter('id') != null) {
            // console.log("done")
            $.getJSON("<?= base_url() ?>admin/produk/getThumbnail/" + getUrlParameter('id'), function(data) {
                $.each(data, function(key, value) {
                    console.log(value);
                    var mockFile = {
                        name: value,
                    };
                    foto_upload.options.addedfile.call(foto_upload, mockFile);
                    foto_upload.options.thumbnail.call(foto_upload, mockFile, "<?= base_url() ?>assets/uploads/thumbnail_produk/" + value);
                })
            });
            // $('#summernote').summernote('lineHeight', 10);
            $('#summernote').summernote({
                lineHeights: ['1'],
                toolbar: [
                    // [groupName, [list of button]]
                    // ['style', [ 'italic', 'underline', 'clear']],
                    // ['font', ['strikethrough']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['height', ['height']]
                ]
            });

            $('#tambahSubProduk').on('click', function() {
                var $div = $('div[id^="subProduk"]:last');

                // Read the Number from that DIV's ID (i.e: 3 from "klon3")
                // And increment that number by 1
                var num = parseInt($div.prop("id").match(/\d+/g), 10) + 1;

                // Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
                var $klon = $div.clone().prop('id', 'subProduk' + num);

                $($klon).find('.btnHapusSub').attr("data-id", "subProduk" + num);
                $($klon).find('.btnHapusSub').attr("id", "btnDelSub" + num);
                $($klon).find('.form-control').val("")

                // Finally insert $klon wherever you want
                $div.after($klon);
                $('#btnDelSub' + num).show()
            });

            $(document).on('click', '.btnHapusSub', function() {
                var id = "#" + $(this).data('id');
                $(id).remove()
            });

            // }
        })
        // })
        // let nama = $("#nama_p").val()
    </script>
    <!-- <script src="<?= base_url() ?>assets/admin/js/page/components-multiple-upload.js"></script> -->
</body>

</html>