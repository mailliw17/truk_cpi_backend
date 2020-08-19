<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>PT. Charoen Pokphand Indonesia - William</strong>
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- PWA -->
<script src="<?= base_url() ?>script.js"></script>
<!-- <script src="<?= base_url() ?>sw.js"></script> -->

<!-- <script>
    function reloadThePage() {
        window.location.reload();
    }
</script> -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    // $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script> -->

<!-- Sparkline -->
<!-- <script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script> -->

<!-- JQVMap -->
<!-- <script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->

<!-- jQuery Knob Chart -->
<!-- <script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script> -->

<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->

<!-- Summernote -->
<!-- <script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script> -->

<!-- overlayScrollbars -->
<!-- <script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->

<!-- AdminLTE App -->
<!-- INI KEGUNAANNYA UNTUK ANIMASI SIDEBAR -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script> -->

<!-- Template tabel  -->
<!-- Core plugin JavaScript-->
<script src="<?= base_url() ?>assets/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url() ?>assets/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url() ?>assets/js/demo/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/demo/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url() ?>assets/js/demo/datatables-demo.js"></script>

<!-- INI untuk Modal -->
<script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
</script>

<!-- Ini untuk sidebar yang beranak -->
<!-- <script>
    $(document).ready(function() {
        $('.treeview').mdbTreeview();
    });
</script> -->

<!-- Ini untuk datepicker -->


<!-- INI DARI JORDAN -->
<!-- Script untuk input tanggal -->
<!-- datepicker -->
<!-- <script src="<?= base_url() ?>assets/bootstrap-datepicker.js"> </script> -->

<script src="<?= base_url() ?>assets/bootstrap-datepicker.min.js"> </script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.tanggal').datepicker({
            format: "yyyy-mm-dd",
            autoclose: true
        });
    });
</script>

<!-- <script>
    Material Select
    $('.mdb-select').materialSelect({});
</script> -->


</body>

</html>