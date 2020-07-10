<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <!-- <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#" data-toggle="modal" data-target="#modalTambahTruk"><button type="button" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah data truk
                    </button></a>
            </li>
        </ol> -->

        <!-- flashdata kalau berhasil nambah -->
        <?= $this->session->flashdata('message') ?>
        <br>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-truck"></i>
                Hasil Pencarian</div>

            <!-- BAR SEARCHING -->
            <!-- <div class="row" style="margin-top: 10px; margin-left: 15px">
                <div class="col-md-4">
                    <?= form_open('C_truk/searchdata')  ?>
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control mr-sm-2" placeholder="Cari disini">
                        <button type="submit" class="btn btn-success input-group-append">
                            Cari
                        </button>
                    </div>
                    <?= form_close()  ?>
                </div> -->

        </div>

        <!-- pagination -->
        <!-- -->


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nomor</th>
                            <th>ID Truk</th>
                            <th>Plat nomor</th>
                            <th>Jenis Truk</th>
                            <th>Jenis Rute</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($truk as $t) :
                        ?>

                            <tr>
                                <td> <?= $no++  ?> </td>
                                <td> <?= $t->id_truk  ?> </td>
                                <td> <?= $t->plat_nomor  ?> </td>
                                <td> <?= $t->jenis_truk  ?> </td>
                                <td> <?= $t->jenis_rute  ?> </td>


                                <!-- tombol edit -->
                                <!-- 
                                    <td> <a href="<?= base_url() ?>C_updatetruk/edit_truk/<?= $t->id_truk; ?>"> <button class="btn btn-warning btn-sm"> <i class=" far fa-edit"></i> Edit </button></a>
                                    </td> -->

                                <td onclick=" javacript:return confirm('Anda yakin hapus?') "> <?= anchor('C_truk/hapus_truk/' . $t->id_truk, '<div class="btn btn-danger btn-sm"> <i class=" fa fa-trash"></i> Hapus </div>')  ?>
                                </td>

                                <td> <a href="<?= base_url() ?>C_qrcode/QRcode/<?= $t->id_truk  ?>" class="btn-sm"> <strong>PRINT BARCODE</strong> </a> </td>


                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
                <!-- TOMBOL KEMBALI -->
                <div class="float-right">
                    <a href="<?= base_url('C_truk/data_truk') ?>" class="btn btn-primary"><i class="fas fa-backward">&nbsp Kembali</i></a>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /.container-fluid -->
</div>


<!-- BEGGINING OF MODAL TAMBAH -->
<div class="modal fade" id="modalTambahTruk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Truk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <form action="<?= base_url() . 'C_platunik/tambah_truk' ?>" method="post">

                    <div class="form-group">
                        <label for="">ID Truk</label>
                        <label for="">(Otomotis dari Sistem)</label>
                        <input type="text" name="id_truk" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                        <label for="">Plat nomor</label>
                        <input type="text" name="plat_nomor" class="form-control" autocomplete="off">
                    </div>

                    <div class="form-group">
                        <label for="jenis_rute">Jenis Rute</label>
                        <select name="jenis_rute" id="jenis_rute" class="form-control">
                            <option value="">Langsir</option>
                            <option value="">SBM</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Jenis Truk</label>
                        <input type="text" name="jenis_truk" class="form-control" autocomplete="off">
                    </div>

                    <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>


                </form>



            </div>
        </div>

    </div>
</div>
<!-- END OF MODAL TAMBAH -->
</body>