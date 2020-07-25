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
                                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang Di Halaman Login!</h1>

                                    <!-- INI FLASHMESSAGE -->
                                    <?php if ($this->session->flashdata('gagal_login')) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            Username / Password salah !
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($this->session->flashdata('message')) : ?>
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            Password Berhasil Diganti <br>
                                            Silahkan Login Ulang !
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php endif; ?>

                                    <hr>
                                    <h1>PT. Charoen Pokphand Indonesia</h1>
                                </div>

                                <form class="user" action="<?= base_url('C_auth/index'); ?>" method="POST">

                                    <div class="form-group">
                                        <input type="text" name="username" class="form-control form-control-user" id="username" autocomplete="off" placeholder="Masukan username..." value="<?= set_value('username'); ?>">
                                        <?= form_error('username', ' <small class="text-danger pl-3">', '</small>');  ?>
                                    </div>


                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" autocomplete="off" placeholder="Masukan password..." name="password">
                                        <?= form_error('password', ' <small class="text-danger pl-3">', '</small>');  ?>
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                    <hr>
                                </form>
                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url() ?>C_auth/register">Belum punya akun ?Buat akun baru</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>