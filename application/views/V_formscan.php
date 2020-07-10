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
                                    <?php if ($this->session->flashdata('berhasil')) : ?>
                                        <audio controls autoplay hidden>
                                            <source src="<?= base_url() ?>assets/berhasil.mp3" type="audio/mpeg">
                                        </audio>
                                    <?php endif; ?>

                                    <!-- INI FLASHMESSAGE -->
                                    <?= $this->session->flashdata('message');  ?>

                                    <hr>
                                </div>
                                <form method="POST" action="<?= base_url() ?>C_Truk/masukdata/<?= $truk; ?>">
                                    <!-- TABEL ID DI HIDDEN YA -->
                                    <div class="form-group">
                                        <input type="hidden" class="form-control" id="id_truk" name="id_truk" value="<?= $truk; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Plat Nomor</label>
                                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" value="<?= $plat_nomor; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Jenis Truk</label>
                                        <input type="text" class="form-control" id="jenis_truk" name="jenis_truk" value="<?= $jenis_truk; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Jenis Rute</label>
                                        <input type="text" class="form-control" id="jenis_rute" name="jenis_rute" value="<?= $jenis_rute; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Waktu saat ini</label>
                                        <input type="text" class="form-control" id="timestamp" name="timestamp" value="<?= $waktu; ?>" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleFormControlSelect2">Lokasi saat ini</label>
                                        <select class="form-control" id="checkpoint" name="checkpoint" required>
                                            <option value="" selected disabled>--Silahkan Pilih--</option>
                                            <option value="cp1">Pelabuhan / Gudang KM.08&13</option>
                                            <option value="cp2">Parkiran Pabrik</option>
                                            <option value="cp3">Sampling Shelter</option>
                                            <option value="cp4">Truk Scale IN</option>
                                            <option value="cp5">Proses Bongkar / Silo Dryer</option>
                                            <option value="cp6">Truk Scale OUT</option>
                                            <option value="cp_selesai">SELESAI</option>
                                        </select>
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