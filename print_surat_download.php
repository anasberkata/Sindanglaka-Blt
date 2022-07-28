<?php
require 'functions.php';

$periode = $_GET["periode"];
$blt = query("SELECT * FROM data_blt_penerima WHERE periode LIKE '$periode'");

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Penerima BLT Periode $periode.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data BLT</title>
</head>

<body>
    <h4 style="text-transform: uppercase; margin-top:100px; text-align:center;">
        DAFTAR NAMA-NAMA PENERIMA BANTUAN LANGSUNG TUNAI (BLT) DANA DESA AKIBAT DAMPAK PANDEMI CORONA VIRUS DISEASE 2019 (COVID-19)
        <br>
        <br>
        DESA SINDANGLAKA KECAMATAN KARANGTENGAH
        <br>
        KABUPATEN CIANJUR
        PERIODE <span style="text-transform: uppercase;"><?= date('F Y', strtotime($periode)) ?></span>
    </h4>
    <table>
        <tr style="border: 1px solid #000; background-color:gray; height: 50px; color: #fff; vertical-align: middle;">
            <td style="border: 1px solid #000; font-weight: bold; text-align:center;">No.</td>
            <td style="border: 1px solid #000; font-weight: bold; text-align:center;">Nama</td>
            <td style="border: 1px solid #000; font-weight: bold; text-align:center; width: 150px;">No. NIK</td>
            <td style="border: 1px solid #000; font-weight: bold; text-align:center;">Alamat</td>
            <td style="border: 1px solid #000; font-weight: bold; text-align:center;">Hasil Verifikasi Memenuhi Syarat</td>
            <td style="border: 1px solid #000; font-weight: bold; text-align:center;">Besar Anggaran</td>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($blt as $b) : ?>
            <tr style="border: 1px solid #000; height: 50px; vertical-align: middle;">
                <td style="border: 1px solid #000; text-align:right;"><?= $i; ?></td>
                <td style="border: 1px solid #000; text-align:left;"><?= $b["nama_lengkap"]; ?></td>
                <td style="border: 1px solid #000;"><?= $b["no_nik"]; ?></td>
                <td style="border: 1px solid #000;"><?= $b["jalan"]; ?>, RT / RW <?= $b["rtrw"]; ?></td>
                <td style="border: 1px solid #000; text-align:center;">Memenuhi Syarat</td>
                <td style="border: 1px solid #000; text-align:right;">300.000,-</td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>