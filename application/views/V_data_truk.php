<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#" data-toggle="modal" data-target="#modalTambahTruk"><button type="button" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah data truk
                    </button></a>
            </li>
        </ol>

        <!-- flashdata kalau berhasil nambah -->
        <?= $this->session->flashdata('message') ?>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-truck"></i>
                Data Truk</div>



            <!-- Template Table SB ADMIN responsive -->
            <div class="card shadow mb-4">
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
                                    <th>Aksi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data->result() as $row) :
                                ?>
                                    <tr>
                                        <td> <?= $no  ?> </td>
                                        <td> <?= $row->id_truk  ?> </td>
                                        <td> <?= $row->plat_nomor  ?> </td>
                                        <td> <?= $row->jenis_truk  ?> </td>
                                        <td> <?= $row->jenis_rute  ?> </td>

                                        <td onclick=" javacript:return confirm('Anda yakin hapus?') "> <?= anchor('C_truk/hapus_truk/' . $row->id_truk, '<div class="btn btn-danger btn-sm"> <i class=" fa fa-trash"></i> Hapus </div>')  ?>
                                        </td>

                                        <td> <a href="<?= base_url() ?>C_qrcode/QRcode/<?= $row->id_truk  ?>" class="btn-sm"> <strong>PRINT BARCODE</strong> </a> </td>


                                    </tr>
                                <?php $no++;
                                endforeach; ?>
                            </tbody>
                        </table>
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
                        <input type="text" name="plat_nomor" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_truk">Jenis truk</label>
                        <input type="text" name="jenis_truk" id="jenis_truk" class="form-control" autocomplete="off" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_rute">Jenis Rute</label>
                        <select name="jenis_rute" id="jenis_rute" class="form-control" required>
                            <option value="" selected disabled>--Silahkan Pilih--</option>
                            <option value="Langsir">Langsir</option>
                            <option value=SBM>SBM</option>
                        </select>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        &nbsp;
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>

                </form>



            </div>
        </div>

    </div>
</div>
<!-- END OF MODAL TAMBAH -->


</div>

</body>