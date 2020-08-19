<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Halaman utama</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/img/cpi.png" rel="icon">
    <link href="<?= base_url() ?>assets/img/cpi.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Poppins:300,400,500,700" rel="stylesheet"> -->

    <!-- Bootstrap CSS File -->
    <link href="<?= base_url() ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->

    <!-- INI ANEH KOK GAMAU KELUAR FONTAWESOME NYA -->
    <link href="<?= base_url() ?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="<?= base_url() ?>assets/lib/animate/animate.min.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="<?= base_url() ?>assets/css/style.min.css" rel="stylesheet">
</head>

<body>
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
            <h1>Selamat Datang "<?= $this->session->userdata('nama'); ?>"</h1>
            <h2>Sistem Pemantauan Waktu Checkpoint Truk SBM & Langsir</h2>
            <h2>PT. Charoen Pokphand Indonesia</h2>
            <a href="<?= base_url('C_Truk/tracking') ?>" class="btn-get-started">Mulai</a>
        </div>
    </section><!-- #hero -->

    <main id="main">

        <section id="services">
            <div class="container wow fadeIn">
                <div class="section-header">
                    <h3 class="section-title">Fitur</h3>
                    <p class="section-description">Berikut fitur yang terdapat dalam sistem ini</p>
                </div>
                <div class="row">

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box">
                            <div class="icon"><a href=""><i class="fa fa-desktop"></i></a></div>
                            <h4 class="title"><a href="">Pemantauan Terkini</a></h4>
                            <p class="description">Fitur yang berfungsi untuk memantau truk SBM berdasarkan checkpoint yang sudah
                                ditetapkan dan akan mengirim timestamp terbaru dari scan barcode di lokasi</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="box">
                            <div class="icon"><a href=""><i class="fa fa-road"></i></a></div>
                            <h4 class="title"><a href="">Registrasi Truk Baru</a></h4>
                            <p class="description">Fitur yang berfungsi untuk mendata truk baru yang akan beroperasi mengangkut
                                komoditas SBM dan langsir </p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="box">
                            <div class="icon"><a href=""><i class="fas fa-qrcode"></i></a></div>
                            <h4 class="title"><a href="">Barcoding</a></h4>
                            <p class="description">Fitur yang berfungsi untuk mencetak barcode, dimana barcode tersebut akan ditempel
                                di truk</p>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- #services -->

    </main>

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
    <script src="<?= base_url() ?>script.js">
    </script>
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

</html>