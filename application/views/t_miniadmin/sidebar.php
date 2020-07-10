<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/img/admin.png" class="img-circle elevation-2" alt="User Image">
            </div>

            <div class="info">
                <a href="#" class="d-block">
                    Orang Lapangan
                </a>
                <!-- <a href="#"> <small>Ganti Password</small> </a> -->
            </div>
        </div>

        <!-- Sidebar toogle -->
        <!-- <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">

                    <ul class="nav nav-treeview">

                        <!-- <li class="nav-item">
                            <a href="<?= base_url('C_truk/tracking') ?>" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-desktop"></i>
                                <p>
                                    Tracking Truk
                                </p>
                            </a>
                        </li>

                        <hr class="sidebar-divider">

                        <li class="nav-item">
                            <a href="<?= base_url('C_truk/checkpoint') ?>" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-search-location"></i>
                                <p>
                                    Pantauan Checkpoint
                                </p>
                            </a>
                        </li>

                        <hr class="sidebar-divider">

                        <li class="nav-item">
                            <a href="<?= base_url('C_truk/data_truk') ?>" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-truck"></i>
                                <p>
                                    Daftar Truk
                                </p>
                            </a>
                        </li>

                        <hr class="sidebar-divider"> -->

                        <!-- YANG INI OPSIONAL MENGIKUTI SISTEM LOGIN NANTI NYA -->
                        <!-- <li class="nav-item">
                            <a href="<?= base_url() ?>C_auth/register" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-user-clock"></i>
                                <p>
                                    Registrasi Mini Admin
                                </p>
                            </a>
                        </li>

                        <hr class="sidebar-divider">

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-file-download"></i>
                                <p>
                                    Download Laporan
                                </p>
                            </a>
                        </li>

                        <hr class="sidebar-divider"> -->

                        <li class="nav-item">
                            <a href="<?= base_url() ?>C_scan/scan" class="nav-link">
                                <i class="nav-icon fas fa-fw fas fa-qrcode"></i>
                                <p>
                                    Scan Barcode
                                </p>
                            </a>
                        </li>


                    </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>