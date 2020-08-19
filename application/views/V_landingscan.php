<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Halaman utama</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link rel="manifest" href="<?= base_url() ?>manifest.json">
    <meta name="theme-color" content="#3823a4">

    <!-- for IOS support -->
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/img/cpi.png">
    <meta name="apple-mobile-web-app-status-bar" content="#3823a4">

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet"> -->

    <!-- Bootstrap CSS File -->
    <link href="<?= base_url() ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->

    <link href="<?= base_url() ?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- <link href="<?= base_url() ?>assets/lib/animate/animate.min.css" rel="stylesheet"> -->

    <!-- Main Stylesheet File -->
    <link href="<?= base_url() ?>assets/css/style.min.css" rel="stylesheet">
</head>

<body>
    <?php if ($this->session->flashdata('berhasil')) : ?>
        <audio controls autoplay hidden>
            <source src="<?= base_url() ?>assets/berhasil.mp3" type="audio/mpeg">
        </audio>
    <?php endif; ?>
    <!--==========================
  Header
  ============================-->
    <header id="header">
        <div class="container">

            <div id="logo" class="pull-left">
                <a href=""><img src="<?= base_url() ?>assets/img/cpi.png" alt="" title="" width="20%" /></img></a>
            </div>

        </div>
    </header>

    <section id="hero">
        <div class="hero-container">
            <h1>Selamat Datang "<?= $this->session->userdata('nama'); ?>" ! </h1>
            <h2>Sistem Scanner Barcode Truk</h2>

            <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                <div class="card-header">Informasi Lokasi:</div>
                <div class="card-body">
                    <h5 class="card-title">PABRIK : <?= $this->session->userdata('lokasi_pabrik'); ?></h5>
                    <h5 class="card-text">LOKASI : <?php if ($this->session->userdata('lokasi_checkpoint') == 'cp1') {
                                                        echo "Security IN";
                                                    } elseif ($this->session->userdata('lokasi_checkpoint') == 'cp2') {
                                                        echo "Sampling Shelter";
                                                    } elseif ($this->session->userdata('lokasi_checkpoint') == 'cp3') {
                                                        echo "Truck Scale IN";
                                                    } elseif ($this->session->userdata('lokasi_checkpoint') == 'cp4') {
                                                        echo "Proses Bongkar / Silo Dryer";
                                                    } elseif ($this->session->userdata('lokasi_checkpoint') == 'cp5') {
                                                        echo "Truck Scale OUT";
                                                    } elseif ($this->session->userdata('lokasi_checkpoint') == 'cp6') {
                                                        echo "Security OUT";
                                                    }
                                                    ?></h5>
                </div>
            </div>

            <!-- INI FLASHMESSAGE -->
            <?= $this->session->flashdata('message');  ?>

            <h2>PT. Charoen Pokphand Indonesia</h2>

            <?php if ($this->session->userdata('role') == 'Barcoding') : ?>
                <a href="<?= base_url('C_scan/scan') ?>" class="btn-get-started"><i class="fas fa-qrcode"></i> BARCODING</a>
            <?php endif; ?>

            <?php if ($this->session->userdata('role') == 'Inputan') : ?>
                <a href="<?= base_url('C_scan/scanmanual') ?>" class="btn-get-started"><i class="fas fa-keyboard"></i> Input Plat Nomor</a>
            <?php endif; ?>

            <!-- <a href="#" data-toggle="modal" data-target="#modalTambahTruk"><button type="button" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah data truk
                </button></a>

            <hr class="sidebar-divider"> -->

            <a onclick="javacript:return confirm('Anda yakin logout?')" href="<?= base_url('C_auth/logout') ?>">
                <button class="btn btn-danger">
                    Logout
                </button>
            </a>

        </div>
    </section>

    <!--==========================
    Footer
  ============================-->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">

            </div>
        </div>

        <div class="container">
            <div class="copyright">
                <strong>PT. Charoen Pokphand Indonesia</strong>
            </div>
            <div class="credits">

                Designed by William</a>
            </div>
        </div>
    </footer><!-- #footer -->

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <!-- PWA -->
    <script src="<?= base_url() ?>script.js"> </script>
    <script src="<?= base_url() ?>assets/lib/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/jquery/jquery-migrate.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/easing/easing.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/wow/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/counterup/counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/superfish/hoverIntent.min.js"></script>
    <script src="<?= base_url() ?>assets/lib/superfish/superfish.min.js"></script>

    <!-- Contact Form JavaScript File -->
    <script src="<?= base_url() ?>assets/contactform/contactform.min.js"></script>

    <!-- Template Main Javascript File -->
    <script src="<?= base_url() ?>assets/js/main.min.js"></script>

</body>

<!-- BEGGINING OF MODAL TAMBAH -->
<!-- <div class="modal fade" id="modalPlat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Silahkan input plat nomor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form action="<?= base_url() . 'C_scan/inputmanual' ?>" method="post">

                    <div class="form-group">
                        <label for="">Plat nomor</label>
                        <input type="text" name="plat_nomor" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        &nbsp;
                        <button type="submit" class="btn btn-primary">Input</button>
                    </div>

                </form>



            </div>
        </div>

    </div>
</div> -->
<!-- END OF MODAL TAMBAH -->

</html>