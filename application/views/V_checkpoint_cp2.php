<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-truck"></i>
                <strong>TRACKING TRUK BERDASARKAN CHECKPOINT</strong> </div>
            <br>

            <div class="row" style="margin-top: 10px; margin-left: 15px">
                <div class="container-fluid">
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp1' ?>" class="btn btn-warning btn-sm ">Pelabuhan / Gudang KM.08&13</a>
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp2' ?>" class="btn btn-warning btn-sm active">Parkiran Pabrik</a>
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp3' ?>" class="btn btn-warning btn-sm">Sampling Shelter</a>
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp4' ?>" class="btn btn-warning btn-sm">Truck Scale IN</a>
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp5' ?>" class="btn btn-warning btn-sm ">Proses Bongkar/Silo Dryer</a>
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp6' ?>" class="btn btn-warning btn-sm">Truck Scale OUT</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nomor</th>
                                <!-- <th>ID Truk</th> -->
                                <th>Plat nomor</th>
                                <th>Jenis Truk</th>
                                <th>Jenis Rute</th>
                                <th>Waktu</th>
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
                                    <td> <?= $t->waktu_last  ?> </td>
                                    <!-- 
                                    tombol detail

                            <td> <?= anchor('C_truk/detail_truk/' . $t->id_truk, '<div class="btn btn-primary btn-sm"> <i class=" fas fa-info-circle"></i> Detail </div>')  ?>
                            </td> -->


                                </tr>

                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

</body>