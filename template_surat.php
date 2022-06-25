<?php

$rtrw = $_POST["rtrw"];
$periode = $_POST["periode"];
$blt = query("SELECT * FROM data_blt_penerima WHERE rtrw LIKE '$rtrw' AND periode LIKE '$periode'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        body {
            font-size: 10pt;
            font-family: Arial, Helvetica, sans-serif;
            color: #000000;
        }

        table,
        thead,
        td {
            border: 1px #000000 solid;
            border-collapse: collapse;
        }

        table {
            width: 100%;
        }

        thead {
            height: 50px;
        }

        td {
            padding: 10px;
        }
    </style>
    <title>Surat Penerima BLT</title>
</head>

<body>
    <table class="table small" id="table1">
        <thead>
            <tr>
                <th>No.</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Pekerjaan</th>
                <th>Nama Ibu</th>
                <th>Status DTKS</th>
                <th>Periode</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($blt as $b) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $b["no_nik"]; ?></td>
                    <td><?= $b["nama_lengkap"]; ?></td>
                    <td><?= $b["jalan"] . ", RT / RW. " . $b["rtrw"] . " Desa. " . $b["desa"] . " Kec. " . $b["kecamatan"] . " Kab. " . $b["kabupaten"] . ". " . $b["provinsi"] . " Kode Pos. " . $b["kode_pos"]; ?></td>
                    <td><?= $b["pekerjaan"]; ?></td>
                    <td><?= $b["nama_ibu"]; ?></td>
                    <td>
                        <?php
                        if ($b["status_dtks"] == 1) {
                            echo "DTKS";
                        } else {
                            echo "Non-DTKS";
                        }
                        ?>
                    </td>
                    <td><?php
                        $periode = $b["periode"];

                        echo formatPeriode($periode);
                        ?>
                    </td>
                    <?php $i++; ?>
                <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>