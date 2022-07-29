<?php
include "template_header.php";
include "template_sidebar.php";

$jabatan = query("SELECT * FROM data_jabatan");
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
                <h4>Data Petugas</h4>
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
                                <h4>Tambah Data Petugas</h4>
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
                                    <div class="col-12 col-md-4">
                                        <label for="nama">Nama Lengkap</label>
                                    </div>
                                    <div class="col-12 col-md-8 form-group">
                                        <input type="text" id="nama" class="form-control" name="nama" required>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="email">Alamat E-Mail</label>
                                    </div>

                                    <div class="col-12 col-md-8 form-group">
                                        <input type="email" id="email" class="form-control" name="email" required>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="col-12 col-md-8 form-group">
                                        <input type="text" id="username" class="form-control" name="username" required>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="password">password</label>
                                    </div>

                                    <div class="col-12 col-md-8 form-group">
                                        <input type="password" id="password" class="form-control" name="password" required>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="jabatan">Jabatan</label>
                                    </div>

                                    <fieldset class="col-12 col-md-8 form-group">
                                        <select class="form-select" id="jabatan" name="jabatan">
                                            <?php foreach ($jabatan as $j) : ?>
                                                <option value="<?= $j["id_jabatan"] ?>"><?= $j["nama_jabatan"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </fieldset>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="petugas_add">Tambah</button>
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

    if (isset($_POST["petugas_add"])) {

        $email = $_POST["email"];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>
                alert('Email sudah terdaftar! Gunakan email lain!');
                document.location.href= 'data_petugas_add.php';
            </script>";
        } else {
            // cek apakah data berhasil di tambahkan atau tidak
            if (petugas_add($_POST) > 0) {
                echo "<script>
                    alert('Data berhasil ditambahkan');
                    document.location.href= 'data_petugas.php';
                </script>";
            } else {
                echo "<script>
                    alert('Data gagal ditambahkan');
                </script>";
            }
        }
    }
    ?>