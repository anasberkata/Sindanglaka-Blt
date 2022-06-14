<!-- FUNCTION -->
<?php
require '../functions.php';

$id = $_GET["id"];

// Query data pekerjaan berdasarkan id pekerjaan di atas

$user = query("SELECT * FROM users WHERE id = $id")[0];
?>

<!-- HEADER -->
<?php require "header.php"; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="mb-4">
        <h1 class="h4 mb-0 text-gray-800">Ubah Data Wisudawan</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-sm-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ubah Data Wisudawan</h6>
            <!-- <a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-save fa-sm text-white-50 mr-2"></i> Simpan</a> -->
        </div>
        <div class="card-body">
            <form class="user" action="" method="post" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?= $user["id"] ?>">
                <input type="hidden" name="fotoLama" value="<?= $user["foto"]; ?>">

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nama" class="ml-3">Nama Lengkap :</label>
                        <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Lengkap" value="<?= $user["nama"] ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="nim" class="ml-3">Nomor Induk Mahasiswa :</label>
                        <input type="text" class="form-control form-control-user" id="nim" name="nim" placeholder="Nomor Induk Mahasiswa" value="<?= $user["nim"] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="username" class="ml-3">Username :</label>
                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?= $user["username"] ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="password" class="ml-3">Password :</label>
                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" value="<?= $user["password"] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="nama" class="ml-3">Tempat Lahir :</label>
                        <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= $user["tempat_lahir"] ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="nim" class="ml-3">Tanggal Lahir :</label>
                        <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir" value="<?= $user["tanggal_lahir"] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <fieldset disabled class="col-sm-6 mb-3 mb-sm-0">
                        <label for="program_studi" class="ml-3">Fakultas :</label>
                        <div>
                            <input type="text" class="form-control form-control-user" id="fakultas" name="fakultas" placeholder="Fakultas Ilmu Komputer" value="Fakultas Ilmu Komputer">
                        </div>
                    </fieldset>
                    <div class="col-sm-6">
                        <label for="program_studi" class="ml-3">Program Studi :</label>
                        <select class="custom-select" name="program_studi">
                            <option value="<?= $user["program_studi"] ?>" selected><?= $user["program_studi"] ?></option>
                            <option value="Teknik Komputer">Teknik Komputer</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="email" class="ml-3">Alamat E-Mail :</label>
                        <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="Alamat E-Mail" value="<?= $user["email"] ?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="phone" class="ml-3">Nomor Handphone / Whatsapp :</label>
                        <input type="text" class="form-control form-control-user" id="phone" name="phone" placeholder="Nomor Handphone / Whatsapp" value="<?= $user["phone"] ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="alamat" class="ml-3">Alamat Lengkap :</label>
                        <textarea class="form-control small" id="alamat" name="alamat" rows="3" placeholder="<?= $user["alamat"] ?>"></textarea>
                    </div>
                    <div class=" col-sm-6">
                        <div class="custom-file">
                            <label for="customFile" class="ml-3">
                                <img src="../assets/img/mahasiswa/<?= $user["foto"] ?>" width="100" class="img-thumbnail">
                            </label>
                            <br>
                            <input type="file" id="customFile" class="ml-3" name="foto">
                            <!-- <label class="form-control form-control-user customFile-user" for="customFile">Pilih Gambar</label> -->
                        </div>
                    </div>
                </div>

                <button type="submit" name="wisudawan_edit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> <i class="fas fa-save fa-sm text-white-50 mr-2"></i>Simpan Data</button>
            </form>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


<?php require "footer.php"; ?>