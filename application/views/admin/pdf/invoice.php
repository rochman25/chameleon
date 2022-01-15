<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        .vl {
            border-left: 2px solid black;
            height: 70px;
        }

        .address {
            text-align: left;
            font-weight: lighter;
            font-size: 14px;
            margin-left: 0px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .customer_detail {
            font-weight: lighter;
            font-size: 14px;
            text-align: left;
            margin-left: 5px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .content {
            margin: 10px;
        }

        footer {
            position: fixed;
            bottom: -60px;
            left: 0px;
            right: 0px;
            height: 50px;
        }
    </style>
</head>

<body>
    <table style="width:100%;border: 0px solid black;">
        <tr>
            <th style="width: 25%; text-align: left;">
                <img style="" src="<?= base_url() ?>assets/images/chameleon_cloth_logo_black.png" width="150px">
            </th>
            <th style="">
                <p style="font-size: 16px;font-weight: bolder; text-align: left;margin-bottom:0px;margin-top: 0px;">CHAMELEON CLOTH</p>
                <p class="address" style="margin-top: 0px;">Jl. Patimuan - Kedungreja, Cinyawang, Rt.02/03, Kec.Patimuan - Cilacap 53264</p>
                <p class="address">Mail: cs@chameleoncloth.co.id</p>
                <p class="address">Whatsapp: 0831 1620 0500</p>
            </th>
        </tr>
    </table>

    <p>
        <?= $tanggal ?>
    </p>

    <p style="font-size: 20px" style="margin: 0px;">
        <b>INVOICE</b><br />
        #<?= $transaksi[0]->kode_transaksi ?>
    </p>

    <table style="width:100%;border: 1px solid black; margin-top:20px;">
        <tr>
            <td style="text-align: left; border-right: 1px solid black;">
                Waktu Transaksi
            </td>
            <td style="width:80%">
                <p style="margin-top: 3px; margin-bottom:3px; margin-left: 18px; margin-right:18px"><?php $waktu_transaksi = new DateTime($transaksi[0]->waktu_transaksi) ?>
                    <?= $waktu_transaksi->format("d F Y") ?></p>
            </td>
        </tr>
    </table>

    <table style="width:100%;border: 1px solid black; margin-top:20px;">
        <tr>
            <td style="text-align: left; border-right: 1px solid black;vertical-align: top;">
                Pembeli
            </td>
            <td style="width:80%">
                <p style="margin-top: 3px; margin-bottom:3px; margin-left: 18px; margin-right:18px; font-weight: bolder;"><?php $waktu_transaksi = new DateTime($transaksi[0]->waktu_transaksi) ?>
                    <?= $transaksi[0]->nama_lengkap ?><br></p>
            </td>
        </tr>
        <tr>
            <td style="text-align: left;border-top: 1px solid black; border-right: 1px solid black;vertical-align: top;">
                Tujuan Pengiriman
            </td>
            <td style="width:80%; border-top: 1px solid black;">
                <p style="margin-top: 3px; margin-bottom:3px; margin-left: 18px; margin-right:18px">
                    <?= $transaksi[0]->alamat_1 ?><br>
                    <?= $transaksi[0]->alamat_2 ?><br>
                    Kecamatan <?= $transaksi[0]->kecamatan ?>, Kabupaten <?= $transaksi[0]->kabupaten ?>
                    ,Provinsi <?= $transaksi[0]->provinsi ?> <?= $transaksi[0]->kode_pos ?>
                </p>
            </td>
        </tr>
    </table>

    <table style="width:100%;border: 1px solid black; margin-top:20px; border-collapse: collapse;">
        <tr style="border: 1px;">
            <th style="border: 1px solid black;">Nama Barang</th>
            <th style="border: 1px solid black;">Size</th>
            <th style="border: 1px solid black;">Jumlah</th>
            <th style="border: 1px solid black;">Harga</th>
        </tr>
        <?php
        $no = 1;
        $totalHarga = 0;
        $totalDiskon = 0;
        foreach ($transaksi as $row => $val) {
            $diskon = (($val->diskon_produk / 100) * $val->harga_produk);
        ?>
            <tr>
                <td style="text-align: left;margin-left:10px; border: 1px solid black;vertical-align: top;">
                    <p style="margin-left: 10px;"><?= $val->nama_produk ?></p>
                </td>
                <td style="border:1px solid black;">
                    <p style="text-align: center;"><?= $val->ukuran ?></p>
                </td>
                <td style="border:1px solid black;">
                    <p style="text-align: center;"><?= $val->jumlah_produk ?></p>
                </td>
                <td style="border:1px solid black;">
                    <p style="text-align: center;">Rp. <?= number_format($val->harga_produk, 0, ',', '.') ?></p>
                </td>
            </tr>
        <?php
            $totalHarga += $val->harga_produk;
            $totalDiskon += ($diskon * $val->jumlah_produk);
        }  ?>
        <tr>
            <td colspan="3" style="text-align: left;border: 1px solid black;vertical-align: top;">
                <p style="margin-left: 10px;">Total Harga Barang</p>
            </td>
            <td style="border-top: 1px solid black;">
                <p style="text-align: center; margin-top: 3px; margin-bottom:3px; margin-left: 18px; margin-right:18px">
                    Rp.<?= number_format($totalHarga, 0, ",", ".") ?>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left;border: 1px solid black;vertical-align: top;">
                <p style="margin-left: 10px;">Biaya Kirim</p>
            </td>
            <td style="border-top: 1px solid black;">
                <p style="text-align:center;margin-top: 3px; margin-bottom:3px; margin-left: 18px; margin-right:18px">
                Rp. <?= number_format($val->total_ongkir, 0, ',', '.') ?>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left;border: 1px solid black;vertical-align: top;">
                <p style="margin-left: 10px;">Diskon Produk</p>
            </td>
            <td style="border-top: 1px solid black;">
                <p style="text-align:center;margin-top: 3px; margin-bottom:3px; margin-left: 18px; margin-right:18px">
                   - Rp. <?= number_format($totalDiskon, 0, ',', '.') ?>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left;border: 1px solid black;vertical-align: top;">
                <p style="margin-left: 10px;">Diskon Ongkir</p>
            </td>
            <td style="border-top: 1px solid black;">
                <?php
                if ($transaksi[0]->system_note) {
                    $arr = explode(":", $transaksi[0]->system_note);
                    // $arr[3] . " " . $arr[4];
                }
                ?>
                <p style="text-align:center;margin-top: 3px; margin-bottom:3px; margin-left: 18px; margin-right:18px">
                   - Rp. <?= number_format($arr[6]??0, 0, ',', '.') ?>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: left;border: 1px solid black;vertical-align: top;">
                <p style="margin-left:10px;font-weight: bolder;">Total Pembayaran</p>
            </td>
            <td style="border-top: 1px solid black;">
                <p style="text-align:center; margin-top: 3px; margin-bottom:3px; margin-left: 18px; margin-right:18px; font-weight: bolder;">
                    Rp. <?= number_format($val->total_harga, 0, ',', '.') ?>
                </p>
            </td>
        </tr>
    </table>

    <p style="margin-top: 50px;">
        Terimakasih atas kepercayaan anda order di <b>CHAMELEON CLOTH</b>
    </p>

    <footer>
        www.chameleoncloth.co.id
    </footer>

</body>

</html>