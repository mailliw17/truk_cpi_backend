<!-- <div id="wrapper"> -->

<div class="content-wrapper">

    <div class="container-fluid">
        <br>
        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-fw fa-file-download"></i>
                <strong>DOWNLOAD LAPORAN PER PERIODE</strong> </div>
            <br>

            <div class="container">

                <br>
                <p><i class="far fa-calendar-alt"></i> Tentukan jangka waktu dan plat nomor</p>

                <!-- BAR SEARCHING -->
                <div class="col-md-3">
                    <?= form_open('C_truk/laporan')  ?>
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control mr-sm-2" placeholder="Cari plat nomor.." autocomplete="off">
                        <!-- <button type="submit" class="btn btn-success input-group-append">
                            Cari
                        </button> -->
                        <?= form_close()  ?>
                    </div>
                </div>

                <!-- DATEPICKER 1 DAN 2 -->
                <div>
                    <p>
                        <form method="get">
                            <input type="text" name="tanggal_awal" autocomplete="off" class="tanggal" placeholder="Tanggal awal..." id="tanggal_awal" value="<?php echo set_value('tanggal_mulai'); ?>">
                            s/d
                            <input type="text" name="tanggal_akhir" autocomplete="off" class="tanggal" placeholder="Tanggal akhir..." id="tanggal_akhir" value="<?php echo set_value('tanggal_akhir'); ?>">

                            &nbsp;
                            <!-- &nbsp;
                        &nbsp; -->

                            <button type="submit" class="btn btn-success btn-sm"> <i class="fas fa-eye"> &nbsp; Tampilkan</i> </button>

                        </form>
                        <br>
                        <div class="float-right">
                            <a onclick="javacript:return confirm('Anda yakin akan menghapus riwayat ?')" href="<?= base_url('C_truk_superadmin') ?>">
                                <button class="btn btn-danger btn-sm"> <i class="fas fa-exclamation-circle">&nbsp; Hapus Riwayat</i> </button>
                            </a>
                            &nbsp;
                            <!-- TOMBOL KEMBALI -->
                            <div class="float-right">
                                <a href="<?= base_url('C_truk_superadmin/preview_hapus') ?>" class="btn btn-primary btn-sm"><i class="fas fa-backward">&nbsp; Kembali</i></a>
                            </div>
                        </div>

                        <!-- <a href="<?= base_url('C_export/index') ?>">
                        <button class="btn btn-warning btn-sm">Print keseluruhan udh bisa ashiap </button>
                    </a> -->
                    </p>
                </div>

                <p style="color: red"> <small> Ket : Laporan dalam format .xlsx </small></p>
            </div>

        </div>
        <div>
            <h3 style="text-align: center">PREVIEW DATA TERAKHIR</h3>
            <!-- <p style="text-align : center; text-decoration:underline;"> <small> <i>Hanya menampilkan maksimal 10 data, untuk melihat data lengkap silahkan download laporan dengan rentang tanggal</i> </small></p> -->

        </div>
        <div class="table-responsive">
            <table class="table table-hover table-sm">
                <thead class="thead-dark">
                    <th style="text-align:center; vertical-align:middle;">No</th>
                    <th style="text-align:center; vertical-align:middle;">Plat nomor</th>
                    <th style="text-align:center; vertical-align:middle;">Jenis Rute</th>
                    <th style="text-align:center; vertical-align:middle;">Pelabuhan / Gudang KM.13</th>
                    <th style="text-align:center; vertical-align:middle;">Parkiran Pabrik</th>
                    <th style="text-align:center; vertical-align:middle;">Sampling Shelter</th>
                    <th style="text-align:center; vertical-align:middle;">Truck Scale 1</th>
                    <th style="text-align:center; vertical-align:middle;">Proses Bongkar</th>
                    <th style="text-align:center; vertical-align:middle;">Truck Scale 2</th>
                    <th style="text-align:center; vertical-align:middle;">SELESAI</th>
                </thead>

                <?php
                if ($truk != NULL) :
                    $no = 1;
                    foreach ($truk as $t) :
                ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?php echo $t['plat_nomor']; ?></td>
                            <td><?php echo $t['jenis_rute']; ?></td>
                            <td style="text-align:center">
                                <?php
                                if ($t['cp1'] == '0000-00-00 00:00:00') {
                                    echo "-";
                                } else {
                                    echo $t['cp1'];
                                }
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php
                                if ($t['cp2'] == '0000-00-00 00:00:00') {
                                    echo "-";
                                } else {
                                    echo  $t['cp2'];
                                }
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php
                                if ($t['cp3'] == '0000-00-00 00:00:00') {
                                    echo "-";
                                } else {
                                    echo  $t['cp3'];
                                }
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php
                                if ($t['cp4'] == '0000-00-00 00:00:00') {
                                    echo "-";
                                } else {
                                    echo  $t['cp4'];
                                }
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php
                                if ($t['cp5'] == '0000-00-00 00:00:00') {
                                    echo "-";
                                } else {
                                    echo  $t['cp5'];
                                }
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php
                                if ($t['cp6'] == '0000-00-00 00:00:00') {
                                    echo "-";
                                } else {
                                    echo  $t['cp6'];
                                }
                                ?>
                            </td>
                            <td style="text-align:center">
                                <?php
                                if ($t['cp_selesai'] == '0000-00-00 00:00:00') {
                                    echo "-";
                                } else {
                                    echo  $t['cp_selesai'];
                                }
                                ?>
                            </td>
                        </tr>
                <?php
                        $no++;
                    endforeach;
                endif;
                ?>

            </table>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>