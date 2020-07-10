<div class="container">

    <!-- Outer Row -->

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Isi data dengan benar dan seksama !</h1>

                                    <!-- AUDIO AUTOPLAY MASIH BELUM BISA -->
                                    <audio controls autoplay hidden>
                                        <source src="<?= base_url() ?>assets/berhasil.mp3" type="audio/mpeg">
                                    </audio>

                                    <!-- INI FLASHMESSAGE -->
                                    <?= $this->session->flashdata('message');  ?>

                                    <hr>
                                </div>

                                <form method="POST" action="<?= base_url() ?>C_Truk/masukdatamanual">
                                    <!-- TABEL ID DI HIDDEN YA -->
                                    <!-- <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_truk" name="id_truk" value="<?= $truk; ?>">
                                    </div> -->

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Plat Nomor</label>
                                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="">
                                    </div>

                                    <!-- BELUM BISA KEMBALI KE LANDINGSCAN DENGAN FLASHMESSAGE -->
                                    <a href="<?= base_url('C_scan/formselesai') ?>">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Kirim
                                        </button>
                                    </a>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>