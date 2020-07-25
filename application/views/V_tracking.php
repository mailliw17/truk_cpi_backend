<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-truck"></i>
                <strong>TRACKING DATA TRUK</strong> </div>
            <br><br>

            <!-- <div class="card-body">
                <div class="table-responsive"> -->
            <!-- Template Table SB ADMIN responsive -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nomor</th>
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
                                        <!-- <td> <?= $row->id_truk  ?> </td> -->
                                        <td> <?= $row->plat_nomor  ?> </td>
                                        <td> <?= $row->jenis_truk  ?> </td>
                                        <td> <?= $row->jenis_rute  ?> </td>
                                        <td>
                                            <?= anchor('C_truk/detail_truk/' . $row->id_truk, '<div class="btn btn-primary btn-sm"> <i class=" fas fa-info-circle"></i> Pantauan Terkini </div>')  ?>
                                        </td>
                                        <td>
                                            <?= anchor('C_truk/riwayat_truk/' . $row->id_truk, '<div class="btn btn-secondary btn-sm"> <i class=" fas fa-history"></i> Riwayat Sebelumnya </div>')  ?>
                                        </td>
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


</div>
</div>

</div>

<!-- /.container-fluid -->
</div>

</body>