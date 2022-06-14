<?php
require "functions.php";

$id = $_GET["id"];
$blt = query("SELECT * FROM data_blt_penerima WHERE id_blt = $id")[0];
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
                <a href="logout.php" class="btn btn-success float-end">
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
                                <h4>Edit Data Penerima</h4>
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
                                            <input type="hidden" value="<?= $blt["id_blt"] ?>" name="id">
                                            <div class="col-12 col-md-4">
                                                <label for="no_kk">Nomor KK</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="no_kk" class="form-control" name="no_kk" value="<?= $blt["no_kk"]; ?>">
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label for="no_nik">NIK</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="no_nik" class="form-control" name="no_nik" value="<?= $blt["no_nik"]; ?>">
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label for="nama_lengkap">Nama Lengkap</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" value="<?= $blt["nama_lengkap"]; ?>">
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label for="pekerjaan">Pekerjaan</label>
                                            </div>
                                            <fieldset class="col-12 col-md-8 form-group">
                                                <select class="form-select" id="pekerjaan" name="pekerjaan">
                                                    <option value="<?= $blt["pekerjaan"]; ?>"><?= $blt["pekerjaan"]; ?></option>
                                                    <?php foreach ($status_pekerjaan as $sp) : ?>
                                                        <option value="<?= $sp["nama_pekerjaan"]; ?>"><?= $sp["nama_pekerjaan"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </fieldset>

                                            <div class="col-12 col-md-4">
                                                <label for="nama_ibu">Nama Ibu</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="nama_ibu" class="form-control" name="nama_ibu" value="<?= $blt["nama_ibu"]; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <div class="row">
                                            <div class="col-12 col-md-4">
                                                <label for="jalan">Alamat</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="jalan" class="form-control" name="jalan" placeholder="Kampung / Nama Jalan" value="<?= $blt["jalan"]; ?>">
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label for="rtrw">RT / RW</label>
                                            </div>
                                            <fieldset class="col-12 col-md-8 form-group">
                                                <select class="form-select" id="rtrw" name="rtrw">
                                                    <option value="<?= $blt["rtrw"] ?>"><?= $blt["rtrw"] ?></option>
                                                    <?php foreach ($rtrw as $r) : ?>
                                                        <option value="<?= $r["rukun_tetangga"] . ' / ' . $r["rukun_warga"]; ?>"><?= $r["rukun_tetangga"] ?> / <?= $r["rukun_warga"] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </fieldset>

                                            <div class="col-12 col-md-4">
                                                <label for="desa">Desa</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="desa" class="form-control" name="desa" value="Sindanglaka" required readonly>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label for="kecamatan">Kecamatan</label>
                                            </div>
                                            <div class="col-12 col-md-8 form-group">
                                                <input type="text" id="kecamatan" class="form-control" name="kecamatan" value="Karangtengah" required readonly>
                                            </div>

                                            <div class="col-12 col-md-4">
                                                <label for="status_dtks">DTKS</label>
                                            </div>
                                            <fieldset class="col-12 col-md-8 form-group">
                                                <select class="form-select" id="status_dtks" name="status_dtks">
                                                    <option value="1">DTKS</option>
                                                    <option value="0">Non-DTKS</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="blt_edit">Edit</button>
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
    if (isset($_POST["blt_edit"])) {

        // cek apakah data berhasil di tambahkan atau tidak
        if (blt_edit($_POST) > 0) {
            echo "<script>
                alert('Data berhasil diubah');
                document.location.href= 'data_blt.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal diubah');
            </script>";
        }
    }
    ?>