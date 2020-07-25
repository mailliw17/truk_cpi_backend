<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-truck"></i>
                <strong>DATA PERJALANAN TRUK</strong>
                <br>
                <p> <i style="color: red">*Menampilkan semua data perjalanan truk</i> </p>
            </div>
            <br>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th style="text-align:center; vertical-align:middle;">Nomor</th>
                                <th style="text-align:center; vertical-align:middle;">Jenis Rute</th>
                                <th style="text-align:center; vertical-align:middle;">Lokasi Pabrik</th>
                                <th style="text-align:center; vertical-align:middle;">Security IN</th>
                                <th style="text-align:center; vertical-align:middle;">Sampling Shelter</th>
                                <th style="text-align:center; vertical-align:middle;">Truck Scale IN</th>
                                <th style="text-align:center; vertical-align:middle;">Proses bongkar / Silo Dryer</th>
                                <th style="text-align:center; vertical-align:middle;">Truck Scale OUT</th>
                                <th style="text-align:center; vertical-align:middle;">Security OUT</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $no = 1;
                            foreach ($detail as $t) :
                            ?>
                                <tr>
                                    <td> <?php echo $no++; ?> </td>
                                    <td><?php echo $t->jenis_rute; ?></td>
                                    <td><?php echo $t->lokasi_pabrik; ?></td>
                                    <td style="text-align:center">
                                        <?php
                                        if ($t->cp1 == '0000-00-00 00:00:00') {
                                            echo "-";
                                        } else {
                                            echo $t->cp1;
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php
                                        if ($t->cp2 == '0000-00-00 00:00:00') {
                                            echo "-";
                                        } else {
                                            echo $t->cp2;
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php
                                        if ($t->cp3 == '0000-00-00 00:00:00') {
                                            echo "-";
                                        } else {
                                            echo $t->cp3;
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php
                                        if ($t->cp4 == '0000-00-00 00:00:00') {
                                            echo "-";
                                        } else {
                                            echo $t->cp4;
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php
                                        if ($t->cp5 == '0000-00-00 00:00:00') {
                                            echo "-";
                                        } else {
                                            echo $t->cp5;
                                        }
                                        ?>
                                    </td>
                                    <td style="text-align:center">
                                        <?php
                                        if ($t->cp6 == '0000-00-00 00:00:00') {
                                            echo "-";
                                        } else {
                                            echo $t->cp6;
                                        }
                                        ?>
                                    </td>
                                    <!-- <td style="text-align:center">
                                        <?php
                                        if ($t->cp_selesai == '0000-00-00 00:00:00') {
                                            echo "-";
                                        } else {
                                            echo $t->cp_selesai;
                                        }
                                        ?>
                                    </td> -->

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- TOMBOL KEMBALI -->
                <div class="float-right" style="margin-top: 20px;">
                    <a href="<?= base_url('C_truk/tracking') ?>" class="btn btn-primary">Kembali</a>
                </div>
            </div>

        </div>

    </div>

    <!-- /.container-fluid -->
</div>


</body>