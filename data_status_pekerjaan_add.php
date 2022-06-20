<?php
require "functions.php";

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
                <h4>Data Status Pekerjaan</h4>
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
            <div class="col-12 col-lg-7">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <h4>Tambah Data Status Pekerjaan</h4>
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
                                    <div class="col-md-4 col-6">
                                        <label for="nama_pekerjaan">Nama Pekerjaan</label>
                                    </div>
                                    <div class="col-md-8 col-6 form-group">
                                        <input type="text" id="nama_pekerjaan" class="form-control" name="nama_pekerjaan" required>
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="status_pekerjaan_add">Tambah</button>
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
    if (isset($_POST["status_pekerjaan_add"])) {

        // cek apakah data berhasil di tambahkan atau tidak
        if (status_pekerjaan_add($_POST) > 0) {
            echo "<script>
                alert('Data berhasil ditambahkan');
                document.location.href= 'data_status_pekerjaan.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan');
            </script>";
        }
    }
    ?>