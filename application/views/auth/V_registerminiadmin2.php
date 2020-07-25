<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4"> <strong>Registrasi Akun Operator Truck Scale Baru</strong> </h1>
                            <hr>
                            <h1>PT. Charoen Pokphand Indonesia</h1>
                        </div>
                        <form class="user" method="POST" action="<?= base_url('C_auth/registerminiadmin2'); ?>">
                            <div class="form-group">
                                <div>
                                    <input type="text" class="form-control form-control-user" id="nama" autocomplete="off" placeholder="Masukan nama lengkap..." name="nama" value="<?= set_value('nama'); ?>">
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