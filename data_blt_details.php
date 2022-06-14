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
                                <h4>Data <?= $blt["nama_lengkap"] ?></h4>
                            </div>
                            <div class="col-12 col-lg-4">
                                <!-- <a href="" class="btn icon btn-success float-end px-3" target="_blank"><i class="bicon dripicons-download"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">No. KK</div>
                                            <div class="col-8">: <?= $blt["no_kk"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">NIK</div>
                                            <div class="col-8">: <?= $blt["no_nik"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">Nama</div>
                                            <div class="col-8">: <?= $blt["nama_lengkap"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">Pekerjaan</div>
                                            <div class="col-8">: <?= $blt["pekerjaan"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">Nama Ibu</div>
                                            <div class="col-8">: <?= $blt["nama_ibu"]; ?></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 col-lg-6">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">Alamat</div>
                                            <div class="col-8">: <?= $blt["jalan"] . ", " . $blt["rtrw"] . " Desa. " . $blt["desa"] . " Kec. " . $blt["kecamatan"] . " Kab. " . $blt["kabupaten"] . ". " . $blt["provinsi"] . ", Kode Pos: " . $blt["kode_pos"]; ?></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-4">Status DTKS</div>
                                            <div class="col-8">: <?= $blt["status_dtks"]; ?></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
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