<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">


        <br>
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-edit"></i>
                Update Data Akun</div>

            <!-- flashdata kalau berhasil nambah -->
            <?= $this->session->flashdata('message') ?>

        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-6">


                    <?php foreach ($user as $us) : ?>
                        <form action="<?= base_url('C_auth/update_data_aksi/') . $us->id ?>" method="post">
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $us->id ?>">

                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" readonly id="nama" placeholder="Masukan Nama..." name="nama" value="<?php echo $us->nama ?>">
                                <?= form_error('nama', ' <small class="text-danger pl-3">', '</small>');  ?>
                            </div>

                            <div class="form-group">
                                <label for="email">Username</label>
                                <input type="text" class="form-control" readonly id="username" placeholder="Masukan username..." name="username" value="<?php echo $us->username ?>">
                                <?= form_error('username', ' <small class="text-danger pl-3">', '</small>');  ?>
                            </div>

                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <input type="password" class="form-control" id="password" placeholder="Masukan password baru..." name="password" autocomplete="off">
                                <?= form_error('password', ' <small class="text-danger pl-3">', '</small>');  ?>
                            </div>

                            <div class="form-group float-right">
                                <a href="<?= base_url('C_auth/kelolaakun') ?>" class="btn btn-primary">Kembali</a>

                                <button type="submit" class="btn btn-success">Update Data</button>
                            </div>

                        <?php endforeach; ?>
                        </form>

                </div>
            </div>

        </div>





    </div>



</div>



</body>