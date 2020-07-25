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
                                    <h1 class="h4 text-gray-900 mb-4">Tulis plat nomor truk !</h1>

                                    <!-- <audio controls autoplay hidden>
                                        <source src="<?= base_url() ?>assets/berhasil.mp3" type="audio/mpeg">
                                    </audio> -->

                                    <!-- INI FLASHMESSAGE -->
                                    <?= $this->session->flashdata('message');  ?>

                                    <hr>
                                </div>

                                <form method="POST" action="<?= base_url('C_scan/inputmanual') ?>">

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Plat Nomor</label>
                                        <p style="color: red"> <small>*Contoh Format : B 1234 PO</small> </p>
                                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="" autocomplete="off" required>
                                    </div>

                                    <!-- BELUM BISA KEMBALI KE LANDINGSCAN DENGAN FLASHMESSAGE -->
                                    <a href="">
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