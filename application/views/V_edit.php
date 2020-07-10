<!-- BEGGINING OF NAVBAR AND SIDEBAR -->

<body id="page-top">

    <!-- PART SIDEBAR -->
    <div id="wrapper">

        <!-- EOF TEMPLATE NAVBAR AND SIDEBAR -->

        <div id="content-wrapper">

            <div class="container-fluid">

                <div class="content-wrapper">
                    <section class="content">
                        <?php foreach ($truk as $t) { ?>
                            <form action=" <?= base_url() . 'C_updatetruk/update_truk'; ?>" method="POST">

                                <div class="form-group">
                                    <label for="">ID Truk</label>
                                    <input type="text" disabled name="id_truk" class="form-control" value="<?= $t->id_truk ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Plat nomor</label>
                                    <input type="text" name="plat_nomor" class="form-control" value="<?= $t->plat_nomor ?>">
                                </div>

                                <div class="form-group">
                                    <label for="">Jenis truk</label>
                                    <input type="text" name="jenis_truk" class="form-control" value="<?= $t->jenis_truk ?>">
                                </div>

                                <button type="reset" class="btn btn-danger">Reset</button>

                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        <?php  } ?>
                    </section>
                </div>

            </div>

</body>

</html>