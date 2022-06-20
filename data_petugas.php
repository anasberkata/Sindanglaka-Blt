<?php
require "functions.php";
$users = query("SELECT * FROM users JOIN data_jabatan ON users.jabatan = data_jabatan.id_jabatan");

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
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 col-lg-8">
                                <a href="data_petugas_add.php" class='btn btn-primary icon'>
                                    <span>Tambah Data</span>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <!-- <a href="" class="btn icon btn-success float-end px-3" target="_blank"><i class="bicon dripicons-download"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>E-Mail</th>
                                        <th>Username</th>
                                        <th>Jabatan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($users as $u) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $u["nama"]; ?></td>
                                            <td><?= $u["email"]; ?></td>
                                            <td><?= $u["username"]; ?></td>
                                            <td><?= $u["nama_jabatan"]; ?></td>
                                            <td>
                                                <a href="data_petugas_edit.php?id=<?= $u["id"] ?>" class="badge bg-warning mb-2">Edit</a> <br>
                                                <a href="data_petugas_delete.php?id=<?= $u["id"] ?>" class="badge bg-danger" onclick="return confirm('Yakin akan menghapus data petugas : <?= $u['nama']; ?> ?');">Hapus</a>
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