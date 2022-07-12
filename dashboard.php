<?php
require "functions.php";

$users = query("SELECT * FROM users");
$blt = query("SELECT * FROM data_blt_penerima");
$penerima_blt = query("SELECT * FROM data_blt_penerima ORDER BY id_blt DESC LIMIT 3");

$total_petugas = count($users);
$total_blt = count($blt);

include "template_header.php";
include "template_sidebar.php";
?>


<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="row">
            <div class="col">
                <h4>Dashboard</h4>
            </div>
            <div class="col">
                <a href="logout.php" class="btn btn-success float-end" onclick="return confirm('Yakin akan keluar dari aplikasi?');">
                    <i class="icon dripicons-power"></i>
                    Logout
                </a>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Penerima BLT</h6>
                                        <h6 class="font-extrabold mb-0"><?= $total_blt; ?> Orang</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Petugas</h6>
                                        <h6 class="font-extrabold mb-0"><?= $total_petugas; ?> Petugas</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Penerima Bantuan Langsung Tunai Terakhir</h4>
                            </div>
                            <div class="card-body">
                                <table class="table small">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIK</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Status DTKS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($penerima_blt as $b) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $b["no_nik"]; ?></td>
                                                <td><?= $b["nama_lengkap"]; ?></td>
                                                <td><?= $b["jalan"] . ", RT / RW. " . $b["rtrw"] . " Desa. " . $b["desa"] . " Kec. " . $b["kecamatan"] . " Kab. " . $b["kabupaten"] . ". " . $b["provinsi"] . " Kode Pos. " . $b["kode_pos"]; ?></td>
                                                <td>
                                                    <?php
                                                    if ($b["status_dtks"] == 1) {
                                                        echo "DTKS";
                                                    } else {
                                                        echo "Non-DTKS";
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include "template_footer.php"; ?>