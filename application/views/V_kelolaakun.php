<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <!-- <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#" data-toggle="modal" data-target="#modalTambahTruk"><button type="button" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Kelola Akun User
                    </button></a>
            </li>
        </ol> -->
        <br>

        <!-- flashdata kalau berhasil nambah -->
        <?= $this->session->flashdata('message') ?>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-users-cog"></i>
                Kelola Akun User</div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Lokasi Pabrik</th>
                                <th>Lokasi Checkpoint</th>
                                <th>Aksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $no = 1;
                            foreach ($user as $us) : ?>

                                <tr>
                                    <td> <?php echo $no ?> </td>
                                    <td> <?php echo $us->nama ?> </td>
                                    <td> <?php echo $us->username ?> </td>
                                    <td> <?php echo $us->lokasi_pabrik ?> </td>
                                    <td> <?php if ($us->lokasi_checkpoint == 'cp1') {
                                                echo 'Security IN';
                                            } elseif ($us->lokasi_checkpoint == 'cp2') {
                                                echo 'Sampling Shelter';
                                            } elseif ($us->lokasi_checkpoint == 'cp3') {
                                                echo 'Truck Scale IN';
                                            } elseif ($us->lokasi_checkpoint == 'cp4') {
                                                echo 'Proses Bongkar/Silo Dryer';
                                            } elseif ($us->lokasi_checkpoint == 'cp5') {
                                                echo 'Truck Scale OUT';
                                            } elseif ($us->lokasi_checkpoint == 'cp6') {
                                                echo 'Security OUT';
                                            };    ?> </td>
                                    <!-- <td> <?php
                                                if ($us->role == 'Super Admin') {
                                                    echo 'Super Admin';
                                                } elseif ($us->role == 'Admin') {
                                                    echo 'Admin';
                                                } elseif ($us->role == 'Barcoding') {
                                                    echo 'Operator Barcode';
                                                } elseif ($us->role == 'Inputan') {
                                                    echo 'Operator Truck Scale';
                                                }
                                                ?> </td> -->

                                    <td>
                                        <a href="<?php echo base_url('C_auth/update_data_aksi/') . $us->id ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"> &nbsp; Edit</i></a>
                                    </td>

                                    <td>
                                        <a onclick="javacript:return confirm('Anda yakin menghapus data? Data yang sudah terhapus tidak bisa dikembalikan !')" href="<?php echo base_url('C_auth/hapusakun/') . $us->id ?>" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"> &nbsp; Hapus Akun</i></a>

                                        <!-- <a onclick="javacript:return confirm('Anda yakin menghapus data? Data yang sudah terhapus tidak bisa dikembalikan !')" href="<?= $url_hapus ?>">
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash">&nbsp; Hapus</i>
                                            </button> -->

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
    <!-- /.container-fluid -->
</div>



</div>

</body>