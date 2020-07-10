<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">


        <br>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-key"></i>
                Ganti Password</div>

            <!-- flashdata kalau berhasil nambah -->
            <?= $this->session->flashdata('message') ?>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <form action="<?= base_url('C_auth/gantipassword') ?>" method="post">
                        <form>

                            <div class="form-group">
                                <label for="passwordLama">Password Lama</label>
                                <input type="password" class="form-control" id="passwordLama" placeholder="Masukan password lama" name="passwordLama">
                                <?= form_error('passwordLama', ' <small class="text-danger pl-3">', '</small>');  ?>
                            </div>

                            <div class="form-group">
                                <label for="passwordBaru1">Password Baru</label>
                                <input type="password" class="form-control" id="passwordBaru1" placeholder="Masukan password baru" name="passwordBaru1">
                                <?= form_error('passwordBaru1', ' <small class="text-danger pl-3">', '</small>');  ?>
                            </div>

                            <div class="form-group">
                                <label for="passwordBaru2">Ulangi Password Baru</label>
                                <input type="password" class="form-control" id="passwordBaru2" placeholder="Masukan password baru" name="passwordBaru2">
                                <?= form_error('passwordBaru2', ' <small class="text-danger pl-3">', '</small>');  ?>
                            </div>

                            <div class="form-group float-right">
                                <a href="<?= base_url('C_truk/tracking') ?>" class="btn btn-primary">Kembali</a>

                                <button type="submit" class="btn btn-success">Ganti Password</button>
                            </div>

                        </form>
                    </form>

                </div>
            </div>

        </div>





    </div>



</div>



</body>