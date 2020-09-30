<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Monitoring</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin_lte2/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">   -->
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin_lte2/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <!-- <link rel="stylesheet" href="<?= base_url()?>assets/admin_lte2/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> -->
  <!-- JQVMap -->
  <!-- <link rel="stylesheet" href="<?= base_url()?>assets/admin_lte2/plugins/jqvmap/jqvmap.min.css"> -->
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin_lte2/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url()?>assets/admin_lte2/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <!-- <link rel="stylesheet" href="<?= base_url()?>assets/admin_lte2/plugins/daterangepicker/daterangepicker.css"> -->
  <!-- summernote -->
  <!-- <link rel="stylesheet" href="<?= base_url()?>assets/admin_lte2/plugins/summernote/summernote-bs4.css"> -->
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin_lte2/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin_lte2/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

  <script src="<?= base_url()?>assets/admin_lte2/plugins/jquery/jquery.min.js"></script>

  <!-- QrCode -->
  <!-- <script src="<?= base_url()?>assets/scanqr/js/WebCodeCam.js"></script>
  <script src="<?= base_url()?>assets/scanqr/js/qrcodelib.js"></script>
	<script src="<?= base_url()?>assets/scanqr/js/DecoderWorker.js"></script> -->


</head>
<style>
  #example tr td:not(:last-child) {
    padding-top: 10px !important;
  }

  label {
    font-weight:100 !important;
  }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url()?>auth/logout">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <div class="brand-text font-weight-light px-4">Sistem Informasi Monitoring Pelayanan <br> Pertanahan</div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url()?>upload/foto_profil/<?= $this->session->userdata('images')?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?= base_url()?>profile" class="<?= base_url()?>assets/admin_lte2/d-block"><?= $this->session->userdata('nama_lengkap') != null ? $this->session->userdata('nama_lengkap') : $this->session->userdata('username')?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <?php include 'template/sidebar.php'; ?>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    
    <section class="content">

        <?php echo $contents; ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper --> 
  <footer class="main-footer">
      <small>Copyright Potato</small>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url()?>assets/admin_lte2/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url()?>assets/admin_lte2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/chart.js/Chart.min.js"></script> -->
<!-- Sparkline -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/sparklines/sparkline.js"></script> -->
<!-- JQVMap -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/jquery-knob/jquery.knob.min.js"></script> -->
<!-- daterangepicker -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/moment/moment.min.js"></script> -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/daterangepicker/daterangepicker.js"></script> -->
<!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script> -->
<!-- Summernote -->
<!-- <script src="<?= base_url()?>assets/admin_lte2/plugins/summernote/summernote-bs4.min.js"></script> -->
<!-- overlayScrollbars -->
<script src="<?= base_url()?>assets/admin_lte2/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url()?>assets/admin_lte2/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url()?>assets/admin_lte2/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url()?>assets/admin_lte2/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?= base_url()?>assets/admin_lte2/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()?>assets/admin_lte2/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url()?>assets/admin_lte2/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url()?>assets/admin_lte2/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


</body>
</html>
