<?php
require "functions.php";

// $blt = query("SELECT * FROM data_blt_penerima");

if (!isset($_POST["search"])) {
    $blt = query("SELECT * FROM data_blt_penerima");
} else {
    $nik = $_POST["nik"];
    $blt = query("SELECT * FROM data_blt_penerima WHERE no_nik LIKE '%$nik%'");
}

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
            <div class="col-7">
                <h4>Data Penerima Bantuan Langsung Tunai</h4>
            </div>
            <div class="col-5">
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
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <a href="data_blt_add.php" class='btn btn-primary icon mb-2'>
                                    <span>Tambah Data</span>
                                </a>
                            </div>
                            <div class="col-12 col-lg-6">
                                <form action="" method="post">
                                    <div class="form-group row align-items-center">
                                        <div class="col-2">
                                            <label class="col-form-label" for="nik">NIK</label>
                                        </div>
                                        <div class="col-8">
                                            <input type="text" class="form-control" name="nik" id="nik" placeholder="Cari data berdasarkan NIK">
                                        </div>
                                        <div class="col-2">
                                            <button type="submit" class="btn btn-primary w-100" name="submit"><i class="icon dripicons-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                                <!-- <a href="" class="btn icon btn-success float-end px-3" target="_blank"><i class="bicon dripicons-download"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table small" id="table1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Status DTKS</th>
                                        <th>Opsi</th>
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
                                            <td>
                                                <?php
                                                if ($b["status_dtks"] == 1) {
                                                    echo "DTKS";
                                                } else {
                                                    echo "Non-DTKS";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="data_blt_details.php?id=<?= $b["id_blt"] ?>" class="badge bg-primary mb-2">Details</a> <br>
                                                <a href="data_blt_edit.php?id=<?= $b["id_blt"] ?>" class="badge bg-warning mb-2">Edit</a> <br>
                                                <a href="data_blt_delete.php?id=<?= $b["id_blt"] ?>" class="badge bg-danger" onclick="return confirm('Yakin akan menghapus data BLT : <?= $b['nama_lengkap']; ?> ?');">Hapus</a>
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
        </section>
    </div>
    <?php include "template_footer.php"; ?>