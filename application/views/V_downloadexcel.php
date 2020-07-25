<!-- INILAH TAMPILAN EXCEL YANG AKAN TERDOWNLOAD -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File Excel</title>
</head>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=checkpoint_truk.xls");
    ?>
    <table class="table" border="10px">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Plat nomor</th>
                <th>Jenis Rute</th>
                <th>Lokasi Pabrik</th>
                <th>Security IN</th>
                <th>Sampling Shelter</th>
                <th>Truck Scale IN</th>
                <th>Proses Bongkar / Silo Dryer</th>
                <th>Truck Scale OUT</th>
                <th>Security OUT</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($truk as $t) :
            ?>

                <tr>
                    <td><?= $no++ ?></td>
                    <td><?php echo $t['plat_nomor']; ?></td>
                    <td><?php echo $t['jenis_rute']; ?></td>
                    <td><?php echo $t['lokasi_pabrik']; ?></td>
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
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>