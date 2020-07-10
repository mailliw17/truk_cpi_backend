<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-truck"></i>
                <strong>TRACKING DATA TRUK</strong> </div>
            <br><br>

            <!-- BAR SEARCHING -->
            <!-- <div class="row" style="margin-top: 10px; margin-left: 15px">
                <div class="col-md-4">
                    <?= form_open('C_truk/searchtracking')  ?>
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control mr-sm-2" placeholder="Cari disini">
                        <button type="submit" class="btn btn-success input-group-append">
                            Cari
                        </button>
                    </div>
                    <?= form_close()  ?>
                </div> -->

        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Nomor</th>
                            <!-- <th scope="col">ID Truk</th> -->
                            <th scope="col">Plat nomor</th>
                            <th scope="col">Jenis Truk</th>
                            <th scope="col">Jenis Rute</th>
                            <th scope="col" colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($truk as $t) :
                        ?>

                            <tr>
                                <td> <?= $no++  ?> </td>
                                <!-- <td> <?= $t->id_truk  ?> </td> -->
                                <td> <?= $t->plat_nomor  ?> </td>
                                <td> <?= $t->jenis_truk  ?> </td>
                                <td> <?= $t->jenis_rute  ?> </td>

                                <!-- tombol detail -->

                                <td> <?= anchor('C_truk/detail_truk/' . $t->id_truk, '<div class="btn btn-primary btn-sm"> <i class=" fas fa-info-circle"></i> Pantauan Terkini </div>')  ?>
                                </td>

                                <td> <?= anchor('C_truk/riwayat_truk/' . $t->id_truk, '<div class="btn btn-secondary btn-sm"> <i class=" fas fa-history"></i> Riwayat Sebelumnya </div>')  ?>
                                </td>


                            </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table>
                <!-- TOMBOL KEMBALI -->
                <div class="float-right">
                    <a href="<?= base_url('C_truk/tracking') ?>" class="btn btn-primary"> <i class="fas fa-backward">&nbsp Kembali</i></a>
                </div>
            </div>


        </div>
    </div>

</div>

<!-- /.container-fluid -->
</div>

</body>