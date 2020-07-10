<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Export Excel</title>
</head>

<body>
    <a href=" <?= base_url('C_export/export') ?> ">Export data</a>
    <table border="1" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Plat nomor</th>
                <th>Jenis Rute</th>
                <th>cp1</th>
                <th>cp2</th>
                <th>cp3</th>
                <th>cp4</th>
                <th>cp5</th>
                <th>cp6</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($truk as $t) : ?>
                <tr>
                    <td> <?php echo $no++; ?> </td>
                    <td> <?php echo $t->plat_nomor; ?> </td>
                    <td> <?php echo $t->jenis_rute; ?> </td>
                    <td> <?php echo $t->cp1; ?> </td>
                    <td> <?php echo $t->cp2; ?> </td>
                    <td> <?php echo $t->cp3; ?> </td>
                    <td> <?php echo $t->cp4; ?> </td>
                    <td> <?php echo $t->cp5; ?> </td>
                    <td> <?php echo $t->cp6; ?> </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- TOMBOL KEMBALI -->
    <div class="float-right">
        <a href="<?= base_url('C_truk/laporan') ?>" class="btn btn-primary"> <i class="fas fa-backward">&nbsp Kembali ke sistem</i></a>
    </div>
</body>

</html>