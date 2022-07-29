<?php
include "template_header.php";
include "template_sidebar.php";

if (!isset($_POST["search"])) {
    $blt = [];
} else {
    $periode = $_POST["periode"];
    $sampai = $_POST["sampai"];
    $blt = query("SELECT * FROM data_blt_penerima WHERE periode = '$periode' AND sampai = '$sampai'");
}
?>

<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="row">
            <div class="col-8">
                <h4>Print Data Penerima Bantuan Langsung Tunai</h4>
            </div>
            <div class="col-4">
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
                            <div class="col-12 col-lg-12 mb-4">
                                <h4>Cari Data</h4>
                            </div>

                            <div class="col-12 col-lg-10">
                                <form action="" method="post">
                                    <div class="form-group row align-items-center">
                                        <div class="col-lg-2 col-4">
                                            <label class="col-form-label mb-3" for="periode">Periode</label>
                                        </div>
                                        <div class="col-lg-3 col-8">
                                            <input type="month" class="form-control mb-3" id="periode" name="periode" value="<?= date('o-m'); ?>">
                                        </div>

                                        <div class="col-lg-2 col-4">
                                            <label class="col-form-label mb-3" for="sampai">Sampai</label>
                                        </div>
                                        <div class="col-lg-3 col-8">
                                            <input type="month" class="form-control mb-3" id="sampai" name="sampai" value="<?= date('o-m'); ?>">
                                        </div>

                                        <div class="col-lg-2 col-12">
                                            <button type="submit" class="btn icon btn-primary w-100 mb-3" name="search"><i class="icon dripicons-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="col-12 col-lg-2">
                                <div class="btn-group w-100" role="group" aria-label="Basic example">
                                    <a href="print_surat_cetak.php?periode=<?= $periode; ?>&sampai=<?= $sampai; ?>" class="btn icon btn-success w-100 mb-3" target="_blank"><i class="bicon dripicons-print"></i></a>
                                    <a href="print_surat_download.php?periode=<?= $periode; ?>&sampai=<?= $sampai; ?>" class="btn icon btn-info w-100 mb-3" target="_blank"><i class="bicon dripicons-download"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table small" id="table1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Pekerjaan</th>
                                        <th>Nama Ibu</th>
                                        <th>Status DTKS</th>
                                        <th>Periode</th>
                                        <!-- <th>Opsi</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($blt as $b) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $b["no_nik"]; ?></td>
                                            <td><?= $b["nama_lengkap"]; ?></td>
                                            <td><?= $b["jalan"] . ", RT / RW. " . $b["rtrw"] . " Desa. " . $b["desa"] . " Kec. " . $b["kecamatan"] . " Kab. " . $b["kabupaten"] . ". " . $b["provinsi"] . " Kode Pos. " . $b["kode_pos"]; ?></td>
                                            <td><?= $b["pekerjaan"]; ?></td>
                                            <td><?= $b["nama_ibu"]; ?></td>
                                            <td>
                                                <?php
                                                if ($b["status_dtks"] == 1) {
                                                    echo "DTKS";
                                                } else {
                                                    echo "Non-DTKS";
                                                }
                                                ?>
                                            </td>
                                            <td><?php
                                                $periode = $b["periode"];

                                                echo formatPeriode($periode);
                                                ?> <br> s.d <br> <?php
                                                                    $sampai = $b["sampai"];

                                                                    echo formatPeriode($sampai);
                                                                    ?>
                                            </td>

                                            <!-- <td>
                                                <a href="data_blt_details.php?id=<?= $b["id_blt"] ?>" class="badge bg-primary mb-2">Details</a> <br>
                                                <a href="data_blt_edit.php?id=<?= $b["id_blt"] ?>" class="badge bg-warning mb-2">Edit</a> <br>
                                                <a href="data_blt_delete.php?id=<?= $b["id_blt"] ?>" class="badge bg-danger" onclick="return confirm('Yakin akan menghapus data BLT : <?= $b['nama_lengkap']; ?> ?');">Hapus</a>
                                            </td> -->
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