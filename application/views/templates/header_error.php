<!DOCTYPE html>
<html>

<link>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title>
    <?php if (!empty($page_title)) echo $page_title; ?>
</title>

<link rel="manifest" href="<?= base_url() ?>manifest.json">
<meta name="theme-color" content="#3823a4">

<!-- for IOS support -->
<link rel="apple-touch-icon" href="<?= base_url() ?>assets/img/cpi.png">
<meta name="apple-mobile-web-app-status-bar" content="#3823a4">

<link href="<?= base_url() ?>assets/img/cpi.png" rel="icon">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/css/ionicons.min.css"> -->
<!-- Tempusdominus Bbootstrap 4 -->
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"> -->
<!-- iCheck -->
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
<!-- JQVMap -->
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css"> -->
<!-- Theme style -->
<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
<!-- overlayScrollbars -->
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"> -->
<!-- summernote -->
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css"> -->
<!-- Datepicker -->
<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datepicker3.css"> -->

<!-- <link rel="stylesheet" href="<?= base_url() ?>assets/MDB-Free">  -->

<!-- Custom styles for this page -->
<!-- <link href="<?= base_url() ?>assets/css/datatables/dataTables.bootstrap4.css" rel="stylesheet"> -->
<!-- <link href="<?= base_url() ?>assets/css/sb-admin-2.css" rel="stylesheet"> -->


<!-- Google Font: Source Sans Pro -->
<!-- <link href="<?= base_url() ?>assets/googlefont/googlefont.css" rel="stylesheet"> -->
</link>



<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">

            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="<?= base_url('C_Truk/tracking'); ?>" class="nav-link"> <i class="fas fa-home"></i> Sistem Pemantauan Truk SBM dan Langsir</a>
                </li> -->
                <li>



                    <!-- TOMBOL INI GESER KE KANAN YA -->
                    <!-- <div class="float-right">
                        <a onclick="javacript:return confirm('Anda yakin logout?')" href="<?= base_url('C_auth/logout') ?>">
                            <button class="btn btn-danger">
                                <i class="fas fa-sign-out-alt">Logout</i>
                            </button>
                        </a>

                    </div> -->
                </li>

            </ul>
            </ul>
        </nav>
        <!-- /.navbar -->