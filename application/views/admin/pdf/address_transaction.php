<!DOCTYPE html>
<html>

<head>
    <title>Address Export PDF</title>
</head>
<style>
    .vl {
        border-left: 2px solid black;
        height: 70px;
    }

    .address {
        text-align: left;
        font-size: 12px;
        margin-left: 5px;
        margin-top: 0px;
        margin-bottom: 0px;
    }

    .customer_detail {
        font-weight: lighter;
        font-size: 12px;
        text-align: left;
        margin-left: 5px;
        margin-top: 0px;
        margin-bottom: 0px;
    }

    .content {
        margin: 10px;
    }
</style>

<body>
    <table style="width:100%;border: 1px solid black;margin:0px;padding: 0px;">
        <tr>
            <th style="">
                <div class="vl" style="float: right;"></div>
                <h1 style="text-align: left; font-size: 26px;margin-top: 0; margin-left: 10px; margin-bottom:0px; padding: 0; font-weight: bolder;">CHAMELEON</h1>
                <h1 style="text-align: left; font-size: 26px;margin-top: 0; margin-left: 10px; padding: 0; font-weight: bolder;">CLOTH</h1>
            </th>
            <th style="">
                <p class="address" style="margin-top: -20px;">Jl. Patimuan - Kedungreja, Cinyawang, Rt.02/03, Kec.Patimuan - Cilacap 53264</p>
                <p class="address">+62 83 116 200 500 // +62 83 835 525 655 </p>
                <p class="address">chameleonclothofficial@gmail.com</p>
            </th>
        </tr>
        <tr>
            <th colspan="2" style="border-top: 1px solid black;">
                <div class="content">
                    <p style=" text-align: left; font-size: 10px;">Shipment for:</p>
                    <p class="address" style="font-weight: bold; margin-bottom: 10px;">
                        <?= $transaksi[0]->nama_lengkap ?>
                    </p>
                    <p class="customer_detail">
                        <?= $transaksi[0]->alamat_1 ?><br>
                        <?= $transaksi[0]->alamat_2 ?><br>
                        Kecamatan <?= $transaksi[0]->kecamatan ?>, Kabupaten <?= $transaksi[0]->kabupaten ?>
                        ,Provinsi <?= $transaksi[0]->provinsi ?> <?= $transaksi[0]->kode_pos ?>
                    </p>
                    <p class="customer_detail"> <?= $transaksi[0]->no_telp ?><br></p>
                    <p style="margin-top: 30px; text-align: left; font-size: 14px;">Note: <?= $transaksi[0]->kurir ?></p>
                </div>
            </th>
        </tr>
    </table>


</body>

</html>