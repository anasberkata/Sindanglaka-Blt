<?php
require "functions.php";
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
            <div class="col">
                <h4>Data Status Pekerjaan</h4>
            </div>
            <div class="col">
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
                                <a href="data_status_pekerjaan_add.php" class='btn btn-primary icon'>
                                    <span>Tambah Data</span>
                                </a>
                            </div>
                            <div class="col-12 col-lg-4">
                                <!-- <a href="" class="btn icon btn-success float-end px-3" target="_blank"><i class="bicon dripicons-download"></i></a> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table" id="table1">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Pekerjaan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($status_pekerjaan as $sp) : ?>
                                    <tr>
                                        <td><?= $i; ?></td>
                                        <td><?= $sp["nama_pekerjaan"]; ?></td>
                                        <td>
                                            <a href="data_status_pekerjaan_edit.php?id=<?= $sp["id_status_pekerjaan"] ?>" class="badge bg-warning">Edit</a> |
                                            <a href="data_status_pekerjaan_delete.php?id=<?= $sp["id_status_pekerjaan"] ?>" class="badge bg-danger" onclick="return confirm('Yakin akan menghapus data Pekerjaan : <?= $sp['nama_pekerjaan']; ?> ?');">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include "template_footer.php"; ?>