<?php

// require_once __DIR__ . '/vendor/autoload.php';
require_once 'vendor/autoload.php';
require 'functions.php';

$rtrw = $_GET["rtrw"];
$periode = $_GET["periode"];

$blt1 = query("SELECT * FROM data_blt_penerima WHERE rtrw LIKE '$rtrw' AND periode LIKE '$periode'")[0];
$blt2 = query("SELECT * FROM data_blt_penerima WHERE rtrw LIKE '$rtrw' AND periode LIKE '$periode'")[1];
$blt3 = query("SELECT * FROM data_blt_penerima WHERE rtrw LIKE '$rtrw' AND periode LIKE '$periode'")[2];

if ($blt1["status_dtks"] == 1) {
    $pe1 = "DTKS";
} else {
    $pe1 = "Non-DTKS";
}

if ($blt2["status_dtks"] == 1) {
    $pe2 = "DTKS";
} else {
    $pe2 = "Non-DTKS";
}

if ($blt3["status_dtks"] == 1) {
    $pe3 = "DTKS";
} else {
    $pe3 = "Non-DTKS";
}
// $i = 1;

$html = '
    <body>
        <h4 style="text-transform: uppercase;">DAFTAR PENERIMA BANTUAN LANGSUNG TUNAI RT / RW. ' . $rtrw . ' PERIODE ' . date('F Y', strtotime($periode)) . '</h4>
        <table style="border: 1px solid #000;">
            <tr style="border: 1px solid #000; background-color:yellow;">
                <td style="border: 1px solid #000;">No.</td>
                <td style="border: 1px solid #000;">NIK</td>
                <td style="border: 1px solid #000;">Nama</td>
                <td style="border: 1px solid #000;">Alamat</td>
                <td style="border: 1px solid #000;">Pekerjaan</td>
                <td style="border: 1px solid #000;">Nama Ibu</td>
                <td style="border: 1px solid #000;">Status DTKS</td>
                <td style="border: 1px solid #000;">Periode</td>
            </tr>
            <tr style="border: 1px solid #000;">
                <td style="border: 1px solid #000;">01</td>
                <td style="border: 1px solid #000;">' . $blt1["no_nik"] . '</td>
                <td style="border: 1px solid #000;">' . $blt1["nama_lengkap"] . '</td>
                <td style="border: 1px solid #000;">' . $blt1["jalan"] . '</td>
                <td style="border: 1px solid #000;">' . $blt1["pekerjaan"] . '</td>
                <td style="border: 1px solid #000;">' . $blt1["nama_ibu"] . '</td>
                <td style="border: 1px solid #000;">' . $pe1 . '</td>
                <td style="border: 1px solid #000;">' . $blt1["periode"] . '</td>
            </tr>
            <tr style="border: 1px solid #000;">
                <td style="border: 1px solid #000;">02</td>
                <td style="border: 1px solid #000;">' . $blt2["no_nik"] . '</td>
                <td style="border: 1px solid #000;">' . $blt2["nama_lengkap"] . '</td>
                <td style="border: 1px solid #000;">' . $blt2["jalan"] . '</td>
                <td style="border: 1px solid #000;">' . $blt2["pekerjaan"] . '</td>
                <td style="border: 1px solid #000;">' . $blt2["nama_ibu"] . '</td>
                <td style="border: 1px solid #000;">' . $pe2 . '</td>
                <td style="border: 1px solid #000;">' . $blt2["periode"] . '</td>
            </tr>
            <tr style="border: 1px solid #000;">
                <td style="border: 1px solid #000;">03</td>
                <td style="border: 1px solid #000;">' . $blt3["no_nik"] . '</td>
                <td style="border: 1px solid #000;">' . $blt3["nama_lengkap"] . '</td>
                <td style="border: 1px solid #000;">' . $blt3["jalan"] . '</td>
                <td style="border: 1px solid #000;">' . $blt3["pekerjaan"] . '</td>
                <td style="border: 1px solid #000;">' . $blt3["nama_ibu"] . '</td>
                <td style="border: 1px solid #000;">' . $pe3 . '</td>
                <td style="border: 1px solid #000;">' . $blt3["periode"]  . '</td>
            </tr>
        </table>

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