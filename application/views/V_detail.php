<div class="content-wrapper">
    <section class="content">
        <h4> <strong>Detail Data Truk</strong> </h4>

        <table class="table table-responsive">
            <tr>
                <th>ID Truk</th>
                <td><?= $detail->id_truk  ?></td>
            </tr>

            <tr>
                <th>Plat nomor</th>
                <td><?= $detail->plat_nomor  ?></td>
            </tr>

            <tr>
                <th>Jenis truk</th>
                <td><?= $detail->jenis_truk  ?></td>
            </tr>

            <tr>
                <th>Jenis rute</th>
                <td><?= $detail->jenis_rute  ?></td>
            </tr>

            <tr>
                <th style="color: red">LOKASI PABRIK SAAT INI : <?php if ($detail->lokasi_pabrik == '') {
                                                                    echo 'Sedang Tidak Aktif';
                                                                } else {
                                                                    echo $detail->lokasi_pabrik;
                                                                } ?></th>
                <!-- <td style="color: red"></td> -->
            </tr>

            <tr>
                <th>Security IN</th>
                <td><?= $detail->cp1  ?></td>
            </tr>

            <tr>
                <th>Sampling Shelter</th>
                <td><?= $detail->cp2  ?></td>
            </tr>

            <tr>
                <th>Truck Scale IN</th>
                <td><?= $detail->cp3  ?></td>
            </tr>

            <tr>
                <th>Proses bongkar / Silo Dryer</th>
                <td><?= $detail->cp4  ?></td>
            </tr>

            <tr>
                <th>Truck Scale OUT</th>
                <td><?= $detail->cp5  ?></td>
            </tr>

            <tr>
                <th>Security OUT</th>
                <td><?= $detail->cp6  ?></td>
            </tr>
        </table>
        <!-- TOMBOL INI GESER KE KANAN -->
        <div style="margin-left: 350px;">
            <a href="<?= base_url('C_truk/tracking') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </section>
</div>