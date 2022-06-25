<?php
require "functions.php";
$rtrw = query("SELECT * FROM data_rtrw");
$status_pekerjaan = query("SELECT * FROM data_status_pekerjaan");

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
                            <div class="col-12 col-lg-8">
                                <h4>Tambah Data Penerima</h4>
                            </div>
                            <div class="col-12 col-lg-4">
                                <!-- <a href="" class="btn icon btn-success float-end px-3" target="_blank"><i class="bicon dripicons-download"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form form-horizontal" action="" method="POST">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="no_kk">Nomor KK</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="no_kk" class="form-control" name="no_kk" required>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="no_nik">NIK</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="no_nik" class="form-control" name="no_nik" required>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="nama_lengkap">Nama Lengkap</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" required>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="pekerjaan">Pekerjaan</label>
                                            </div>
                                            <fieldset class="col-12 col-md-8 form-group">
                                                <select class="form-select" id="pekerjaan" name="pekerjaan">
                                                    <?php foreach ($status_pekerjaan as $sp) : ?>
                                                        <option value="<?= $sp["nama_pekerjaan"]; ?>"><?= $sp["nama_pekerjaan"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </fieldset>

                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="nama_ibu">Nama Ibu</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="nama_ibu" class="form-control" name="nama_ibu" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="jalan">Alamat</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="jalan" class="form-control" name="jalan" placeholder="Kampung / Nama Jalan" required>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="rtrw">RT / RW</label>
                                            </div>
                                            <fieldset class="col-12 col-md-8 form-group">
                                                <select class="form-select" id="rtrw" name="rtrw">
                                                    <?php foreach ($rtrw as $r) : ?>
                                                        <option value="<?= $r["rukun_tetangga"] . ' / ' . $r["rukun_warga"]; ?>"><?= $r["rukun_tetangga"] ?> / <?= $r["rukun_warga"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </fieldset>

                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="desa">Desa</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="desa" class="form-control" name="desa" value="Sindanglaka" required readonly>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="kecamatan">Kecamatan</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="kecamatan" class="form-control" name="kecamatan" value="Karangtengah" required readonly>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="status_dtks">DTKS</label>
                                            </div>
                                            <fieldset class="col-12 col-md-8 form-group">
                                                <select class="form-select" id="status_dtks" name="status_dtks">
                                                    <option value="0">Non-DTKS</option>
                                                    <option value="1">DTKS</option>
                                                </select>
                                            </fieldset>

                                            <div class="col-12 col-md-4">
                                                <label class="col-form-label" for="periode">Periode</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="month" id="periode" class="form-control" name="periode" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="blt_add">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php
    include "template_footer.php";

    // Tambah RT RW
    if (isset($_POST["blt_add"])) {

        // cek apakah data berhasil di tambahkan atau tidak
        if (blt_add($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambahkan');
                document.location.href= 'data_blt.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan');
            </script>";
        }
    }
    ?>