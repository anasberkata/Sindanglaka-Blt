<?php
require "functions.php";

$id = $_GET["id"];
$rtrw = query("SELECT * FROM data_rtrw WHERE id_rtrw = $id")[0];

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
                <h4>Data RT / RW</h4>
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
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <h4>Edit Data RT/RW</h4>
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
                                    <input type="hidden" value="<?= $rtrw["id_rtrw"] ?>" name="id">
                                    <div class="col-md-6">
                                        <label for="rw">Rukun Warga</label>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input type="text" id="rw" class="form-control" name="rw" value="<?= $rtrw["rukun_warga"] ?>">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="rt">Rukun Tetangga</label>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <input type="text" id="rt" class="form-control" name="rt" value="<?= $rtrw["rukun_tetangga"] ?>">
                                    </div>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="rtrw_edit">Edit</button>
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
    if (isset($_POST["rtrw_edit"])) {

        // cek apakah data berhasil di tambahkan atau tidak
        if (rtrw_edit($_POST) > 0) {
            echo "<script>
                alert('Data Berhasil diubah');
                document.location.href= 'data_rt_rw.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal diubah');
            </script>";
        }
    }
    ?>