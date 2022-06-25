        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <div class="row">
                                <div class="col-4">
                                    <img src="assets/images/logo/logodesa.png" alt="Logo">
                                </div>
                                <div class="col-8">
                                    <a href="#">SIDAMAR BLT DESA SINDANGLAKA</a>
                                </div>
                            </div>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item">
                            <a href="dashboard.php" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Admin</li>
                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Data Master</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="data_rt_rw.php">Data RT / RW</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="data_status_pekerjaan.php">Data Status Pekerjaan</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-people"></i>
                                <span>Data Petugas</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="data_jabatan.php">Data Jabatan</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="data_petugas.php">Data Petugas</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-title">Data Bantuan</li>

                        <li class="sidebar-item ">
                            <a href="data_blt.php" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Data Penerima BLT</span>
                            </a>
                        </li>

                        <li class="sidebar-item ">
                            <a href="print_surat.php" class='sidebar-link'>
                                <i class="bi bi-printer-fill"></i>
                                <span>Print Surat BLT</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Button</li>

                        <li class="sidebar-item  ">
                            <a href="logout.php" class='sidebar-link' onclick="return confirm('Yakin akan keluar dari aplikasi?');">
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>