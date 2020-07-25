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