<?php
include "template_header.php";
include "template_sidebar.php";

$id = $_GET["id"];
$u = query("SELECT * FROM users JOIN data_jabatan ON users.jabatan = data_jabatan.id_jabatan WHERE id = $id")[0];
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
                                <h4>Edit Data Petugas</h4>
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
                                    <input type="hidden" value="<?= $u["id"] ?>" name="id">
                                    <div class="col-12 col-md-4">
                                        <label for="nama">Nama Lengkap</label>
                                    </div>
                                    <div class="col-12 col-md-8 form-group">
                                        <input type="text" id="nama" class="form-control" name="nama" value="<?= $u["nama"] ?>">
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="email">Alamat E-Mail</label>
                                    </div>

                                    <div class="col-12 col-md-8 form-group">
                                        <input type="email" id="email" class="form-control" name="email" value="<?= $u["email"] ?>">
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="col-12 col-md-8 form-group">
                                        <input type="text" id="username" class="form-control" name="username" value="<?= $u["username"] ?>">
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="password">password</label>
                                    </div>

                                    <div class="col-12 col-md-8 form-group">
                                        <input type="password" id="password" class="form-control" name="password" value="<?= $u["password"] ?>">
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <label for="jabatan">Jabatan</label>
                                    </div>

                                    <fieldset class="col-12 col-md-8 form-group">
                                        <select class="form-select" id="jabatan" name="jabatan">
                                            <option value="<?= $u["id_jabatan"] ?>"><?= $u["nama_jabatan"] ?></option>
                                            <?php foreach ($jabatan as $j) : ?>
                                                <option value="<?= $j["id_jabatan"] ?>"><?= $j["nama_jabatan"] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </fieldset>

                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1" name="petugas_edit">Edit</button>
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
    if (isset($_POST["petugas_edit"])) {

        // cek apakah data berhasil di tambahkan atau tidak
        if (petugas_edit($_POST) > 0) {
            echo "<script>
                alert('Data Berhasil diubah');
                document.location.href= 'data_petugas.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal diubah');
            </script>";
        }
    }
    ?>