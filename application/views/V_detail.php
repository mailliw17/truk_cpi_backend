<div class="content-wrapper">
    <section class="content">
        <h4> <strong>Detail Data Truk</strong> </h4>

        <table class="table">
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
                <th style="color: red">WAKTU CHECKPOINT</th>
            </tr>

            <tr>
                <th>Pelabuhan / Gudang KM.08&13</th>
                <td><?= $detail->cp1  ?></td>
            </tr>

            <tr>
                <th>Parkiran Pabrik</th>
                <td><?= $detail->cp2  ?></td>
            </tr>

            <tr>
                <th>Sampling shelter</th>
                <td><?= $detail->cp3  ?></td>
            </tr>

            <tr>
                <th>Truck Scale IN</th>
                <td><?= $detail->cp4  ?></td>
            </tr>

            <tr>
                <th>Proses bongkar / Silo Dryer</th>
                <td><?= $detail->cp5  ?></td>
            </tr>

            <tr>
                <th>Truck Scale OUT</th>
                <td><?= $detail->cp6  ?></td>
            </tr>

        </table>
        <!-- TOMBOL INI GESER KE KANAN -->
        <div class="float-right">
            <a href="<?= base_url('C_truk/tracking') ?>" class="btn btn-primary">Kembali</a>
        </div>
    </section>
</div>