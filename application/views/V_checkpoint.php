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
                    <a href="" class="btn btn-primary btn-md ">Pelabuhan / Gudang KM.13</a>
                    <a href="" class="btn btn-primary btn-md">Parkiran Pabrik</a>
                    <a href="" class="btn btn-primary btn-md">Sampling Shelter</a>
                    <a href="" class="btn btn-primary btn-md">Truck Scale 1</a>
                    <a href="<?= base_url() . 'C_truk/tracking_cp5' ?>" class="btn btn-primary btn-md">Proses Bongkar</a>
                    <a href="" class="btn btn-primary btn-md">Truck Scale 2</a>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nomor</th>
                                <th>ID Truk</th>
                                <th>Plat nomor</th>
                                <th>Jenis Truk</th>
                                <th>Jenis Rute</th>
                            </tr>
                        </thead>
                        <tbody>
                            <td>1</td>
                            <td>22</td>
                            <td>B 1222 PO</td>
                            <td>Hino Duto</td>
                            <td>Langsir</td>

                            <!-- <?php
                                    $no = 1;
                                    foreach ($truk as $t) :
                                    ?>

                                <tr>
                                    <td> <?= $no++  ?> </td>
                                    <td> <?= $t->id_truk  ?> </td>
                                    <td> <?= $t->plat_nomor  ?> </td>
                                    <td> <?= $t->jenis_truk  ?> </td>

                                    <!-- tombol detail -->

                            <td> <?= anchor('C_truk/detail_truk/' . $t->id_truk, '<div class="btn btn-primary btn-sm"> <i class=" fas fa-info-circle"></i> Detail </div>')  ?>
                            </td>


                            </tr>

                        <?php endforeach; ?> -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>

</body>