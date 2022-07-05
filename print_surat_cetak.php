<?php

// require_once __DIR__ . '/vendor/autoload.php';
require_once 'vendor/autoload.php';
require 'functions.php';

$periode = $_GET["periode"];

// $blt1 = query("SELECT * FROM data_blt_penerima WHERE periode LIKE '$periode'")[0];
// $blt2 = query("SELECT * FROM data_blt_penerima WHERE periode LIKE '$periode'")[1];
// $blt3 = query("SELECT * FROM data_blt_penerima WHERE periode LIKE '$periode'")[2];
$blt = query("SELECT * FROM data_blt_penerima WHERE periode LIKE '$periode'");

// $i = 1;

$html = '
    <body style="font-size: 10pt; font-family: Arial, Helvetica, sans-serif; color: #000000;">
        <h4 style="text-transform: uppercase; margin-top:100px;">
        DAFTAR NAMA-NAMA PENERIMA BANTUAN LANGSUNG TUNAI (BLT) DANA DESA AKIBAT DAMPAK PANDEMI CORONA VIRUS DISEASE 2019 (COVID-19)
        <br>
        <br>
        DESA SINDANGLAKA KECAMATAN KARANGTENGAH
        <br>
        KABUPATEN CIANJUR
        PERIODE ' . date('F Y', strtotime($periode)) . '
        </h4>
        <table style="border: 1px solid #000;">
            <tr style="border: 1px solid #000; background-color:gray;">
                <td style="border: 1px solid #000; font-weight: bold; text-align:center;">No.</td>
                <td style="border: 1px solid #000; font-weight: bold; text-align:center;">Nama</td>
                <td style="border: 1px solid #000; font-weight: bold; text-align:center;">No. NIK</td>
                <td style="border: 1px solid #000; font-weight: bold; text-align:center;">Alamat</td>
                <td style="border: 1px solid #000; font-weight: bold; text-align:center;">Hasil Verifikasi Memenuhi Syarat</td>
                <td style="border: 1px solid #000; font-weight: bold; text-align:center;">Besar Anggaran</td>
            </tr>';
$i = 1;
foreach ($blt as $b) :
    $html .= '<tr style="border: 1px solid #000;">
                <td style="border: 1px solid #000; text-align:right;">' . $i . '</td>
                <td style="border: 1px solid #000; text-align:center;">' . $b["nama_lengkap"] . '</td>
                <td style="border: 1px solid #000;">' . $b["no_nik"] . '</td>
                <td style="border: 1px solid #000;">' . $b["jalan"] . ', RT / RW ' . $b["rtrw"] . '</td>
                <td style="border: 1px solid #000;">Memenuhi Syarat</td>
                <td style="border: 1px solid #000; text-align:right;">300.000,-</td>
            </tr>';
    $i++;
endforeach;
$html .= '</table>

        <br>

        <table>
            <tr>
                <td width="33%"></td>
                <td width="33%"></td>
                <td width="33%" style="text-align: center;">
                    <p>
                        Sindanglaka, ' . date("d F Y") . '
                        <br>
                        Kepala Desa Sindanglaka
                    </p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p>ASEP KURTUBI, BcHk. S.Pd</p>
                </td>
            </tr>
        </table>
    </body>
';

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);

$stylesheet = file_get_contents('style_print.css');
$mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML("$html", \Mpdf\HTMLParserMode::HTML_BODY);
$mpdf->Output('Data BLT RT/RW. ' . $rtrw . ' Periode ' . date('F Y', strtotime($periode)) . '.pdf', 'I');
// $mpdf->Output();
