<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"> <strong>Registrasi Akun Operator Baru</strong> </h1>
                            <hr>
                            <h1>PT. Charoen Pokphand Indonesia</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('C_auth/registerminiadmin'); ?>">
                            <div class="form-group">
                                <div>
                                    <input type="text" class="form-control form-control-user" id="nama" autocomplete="off" placeholder="Masukan nama lengkap...." name="nama" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', ' <small class="text-danger pl-3">', '</small>');  ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="username" autocomplete="off" id="username" placeholder="Masukan username..." value="<?= set_value('username'); ?>">
                                <?= form_error('username', ' <small class="text-danger pl-3">', '</small>');  ?>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Masukan password" name="password1">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Ulangi password" name="password2">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="lokasipabrik">Lokasi Pabrik</label>
                                    <select class="form-control form-control-sm" id="lokasi_pabrik" name="lokasi_pabrik" required>
                                        <option value="" selected disabled>--Silahkan Pilih--</option>
                                        <option>Genuk / KM.08</option>
                                        <option>Sayung / KM.09</option>
                                    </select>
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="lokasicheckpoint">Lokasi Checkpoint</label>
                                    <select class="form-control form-control-sm" id="lokasi_checkpoint" name="lokasi_checkpoint" required>
                                        <option value="" selected disabled>--Silahkan Pilih--</option>
                                        <option value="cp1">Security IN</option>
                                        <option value="cp2">Sampling Shelter</option>
                                        <option value="cp3">Truck Scale IN</option>
                                        <option value="cp4">Proses Bongkar / Silo Dryer</option>
                                        <option value="cp5">Truck Scale OUT</option>
                                        <option value="cp6">Security OUT / SELESAI</option>
                                    </select>
                                </div>
                            </div>

                            <hr>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Registrasi Akun
                            </button>
                            <hr>
                        </form>

                        <!-- <div class="text-center">
                            <a class="small" href="<?= base_url() ?>C_auth/index">Sudah punya akun? Login saja!</a>
                        </div>
                        <div class="float-right">
                            <a href="<?= base_url('C_truk/data_truk') ?>" class="btn btn-primary">Kembali</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>