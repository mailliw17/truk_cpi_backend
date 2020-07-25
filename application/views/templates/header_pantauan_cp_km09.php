<!-- <div id="wrapper"> -->
<div class="content-wrapper">

    <div class="container-fluid">

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-truck"></i>
                <strong>Pabrik Sayung / KM.09</strong>
            </div>
            <br>

            <div class="row" style="margin-top: 10px; margin-left: 15px">
                <div class="container-fluid">
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp1_km09' ?>" class="btn btn-info btn-sm <?php if ($this->uri->segment(2) == 'checkpoint_cp1_km09') {
                                                                                                                echo 'active';
                                                                                                            } ?>">Security IN</a>
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp2_km09' ?>" class="btn btn-info btn-sm  <?php if ($this->uri->segment(2) == 'checkpoint_cp2_km09') {
                                                                                                                echo 'active';
                                                                                                            } ?>">Sampling Shelter</a>
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp3_km09' ?>" class="btn btn-info btn-sm  <?php if ($this->uri->segment(2) == 'checkpoint_cp3_km09') {
                                                                                                                echo 'active';
                                                                                                            } ?>">Truck Scale IN</a>
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp4_km09' ?>" class="btn btn-info btn-sm  <?php if ($this->uri->segment(2) == 'checkpoint_cp4_km09') {
                                                                                                                echo 'active';
                                                                                                            } ?> ">Proses Bongkar/Silo Dryer</a>
                    <a href="<?= base_url() . 'C_truk/checkpoint_cp5_km09' ?>" class="btn btn-info btn-sm  <?php if ($this->uri->segment(2) == 'checkpoint_cp5_km09') {
                                                                                                                echo 'active';
                                                                                                            } ?>">Truck Scale OUT</a>
                    <!-- <a href="<?= base_url() . 'C_truk/checkpoint_cp6_km09' ?>" class="btn btn-info btn-sm  <?php if ($this->uri->segment(2) == 'checkpoint_cp6_km09') {
                                                                                                                    echo 'active';
                                                                                                                } ?>">Security OUT</a> -->
                </div>
            </div>