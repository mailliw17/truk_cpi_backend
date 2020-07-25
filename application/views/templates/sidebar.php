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
                <p style="color: white"> <small>Welcome , </small> &nbsp;<strong><?= $this->session->userdata('nama'); ?></strong> !</p>
                <p style="color: white"> <small>Anda login sebagai <?php if ($this->session->userdata('role') == 'Super Admin') {
                                                                        echo '<small>Super Admin</small>';
                                                                    } else {
                                                                        echo 'Admin';
                                                                    }  ?> </small> </p>
                <a href="<?= base_url() ?>C_auth/gantipassword"> <i class="fas fa-key"></i> Ganti Password</a>
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

                        <li <?php if (($this->uri->segment(2) == 'detail_truk') || ($this->uri->segment(2) == 'riwayat_truk') || ($this->uri->segment(2) == 'tracking')) {
                                echo 'class="nav-link active"';
                            } else {
                                echo '';
                            } ?>>
                            <a href=" <?= base_url('C_truk/tracking') ?>" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-desktop"></i>
                                <p>
                                    Tracking Truk
                                </p>
                            </a>
                        </li>

                        <hr class="sidebar-divider">

                        <!-- KASIH ANIMASI JS -->
                        <li class="nav-item has-treeview menu-open">

                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Pantauan Terkini
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <li class="nav-item">
                                    <a href="<?= base_url() ?>C_truk/checkpoint_cp1_km08" class="<?php if (($this->uri->segment(2) == 'checkpoint_cp1_km08') || ($this->uri->segment(2) == 'checkpoint_cp2_km08') || ($this->uri->segment(2) == 'checkpoint_cp3_km08') || ($this->uri->segment(2) == 'checkpoint_cp4_km08') || ($this->uri->segment(2) == 'checkpoint_cp5_km08') || ($this->uri->segment(2) == 'checkpoint_cp6_km08')) {
                                                                                                        echo 'nav-link active';
                                                                                                    } else {
                                                                                                        echo 'nav-link';
                                                                                                    } ?>" target="">
                                        <i class="fas fa-dot-circle circle nav-icon"></i>
                                        <p> <small>Genuk / KM.08</small> </p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url() ?>C_truk/checkpoint_cp1_km09" class="<?php if (($this->uri->segment(2) == 'checkpoint_cp1_km09') || ($this->uri->segment(2) == 'checkpoint_cp2_km09') || ($this->uri->segment(2) == 'checkpoint_cp3_km09') || ($this->uri->segment(2) == 'checkpoint_cp4_km09') || ($this->uri->segment(2) == 'checkpoint_cp5_km09') || ($this->uri->segment(2) == 'checkpoint_cp6_km09')) {
                                                                                                        echo 'nav-link active';
                                                                                                    } else {
                                                                                                        echo 'nav-link';
                                                                                                    } ?>" target="">
                                        <i class="fas fa-dot-circle circle nav-icon"></i>
                                        <p> <small>Sayung / KM.09</small> </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <hr class="sidebar-divider">

                        <li <?= $this->uri->segment(2) == 'data_truk' ? 'class="nav-link active"' : '' ?>>
                            <a href="<?= base_url('C_truk/data_truk') ?>" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-truck"></i>
                                <p>
                                    Daftar Truk
                                </p>
                            </a>
                        </li>

                        <hr class="sidebar-divider">

                        <!-- KASIH ANIMASI JS -->
                        <li class="nav-item has-treeview menu-open">

                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Kelola Akun Baru
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">

                                <?php if ($this->session->userdata('role') == 'Super Admin') : ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>C_auth/registersuperadmin" class="nav-link" target="_blank">
                                            <i class="fas fa-fw fa-plus circle nav-icon"></i>
                                            <p> <small>Buat akun Super Admin baru</small> </p>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <?php if ($this->session->userdata('role') == 'Super Admin') : ?>
                                    <li class="nav-item">
                                        <a href="<?= base_url() ?>C_auth/registeradmin" class="nav-link" target="_blank">
                                            <i class="fas fa-fw fa-plus circle nav-icon"></i>
                                            <p> <small>Buat akun Admin baru</small> </p>
                                        </a>
                                    </li>
                                <?php endif; ?>

                                <li class="nav-item">
                                    <a href="<?= base_url() ?>C_auth/registerminiadmin" class="nav-link" target="_blank">
                                        <i class="fas fa-fw fa-plus circle nav-icon"></i>
                                        <p> <small>Buat akun Operator baru</small> </p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <hr class="sidebar-divider">

                        <!-- <hr class="sidebar-divider"> -->
                        <hr class="sidebar-divider">

                        <li <?= $this->uri->segment(2) == 'kelolaakun' ? 'class="nav-link active"' : '' ?>>
                            <a href="<?= base_url() ?>C_auth/kelolaakun" class="nav-link">
                                <i class="nav-icon fas fa-fw fa-users-cog"></i>
                                <p>
                                    Kelola Akun
                                </p>
                            </a>
                        </li>

                        <hr class="sidebar-divider">

                        <?php if ($this->session->userdata('role') == 'Admin') : ?>
                            <li <?= $this->uri->segment(2) == 'laporan' ? 'class="nav-link active"' : '' ?>>
                                <a href="<?= base_url() ?>C_truk/laporan" class="nav-link">
                                    <i class="nav-icon fas fa-fw fa-file-invoice"></i>
                                    <p>
                                        Kelola Laporan
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if ($this->session->userdata('role') == 'Super Admin') : ?>
                            <li <?= $this->uri->segment(2) == 'laporan_superadmin' ? 'class="nav-link active"' : '' ?>>
                                <a href="<?= base_url() ?>C_truk/laporan_superadmin" class="nav-link">
                                    <i class="nav-icon fas fa-fw fa-file-invoice"></i>
                                    <p>
                                        Kelola Laporan
                                    </p>
                                </a>
                            </li>
                        <?php endif; ?>



                        <!-- <li>
                            <a onclick="javacript:return confirm('Maaf fitur ini hanya bisa diakses Super Admin, silahkan login menggunakan akun Super Admin')" href="<?= base_url('C_auth') ?>" target="_blank">
                                <button class="btn btn-danger">
                                    <i class="fas fa-trash"> Hapus Track Record Truk</i>
                                </button>
                            </a>
                        </li> -->


                    </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>