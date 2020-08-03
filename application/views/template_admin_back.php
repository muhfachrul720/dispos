<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sidasip</title>

      <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script>

    <!-- plugins:css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/template/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/template/assets/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/template/assets/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/template/assets/css/demo_1/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/template/template/assets/images/favicon.png" />

    <script src="<?php echo base_url(); ?>assets/assets-sbadmin/vendor/jquery/jquery.min.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      
       <?php include 'template/sidebar.php'; ?>

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close mdi mdi-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>Default
          </div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark
          </div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles default primary"></div>
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles light"></div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url(); ?>assets/template/template/assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            
            <ul class="navbar-nav navbar-nav-right">

              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="index.html">
                  <i class="mdi mdi-home-circle"></i>
                </a>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Dashboard</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> </li>
                </ol>
              </nav>
            </div>
            <!-- first row starts here -->
            <div class="row">
              <?php
              echo $contents;
              ?>
            </div>  
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © Fisip-UHO 2020 <a href="#" target="_blank"></a>. All rights reserved.</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Kendari Coding <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <!-- Dimatikan conflick dengan Jquery -->
    <!-- <script src="<?php echo base_url(); ?>assets/template/template/assets/vendors/js/vendor.bundle.base.js"></script> -->
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="<?php echo base_url(); ?>assets/template/template/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/vendors/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url(); ?>assets/template/template/assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/js/misc.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/js/settings.js"></script>
    <script src="<?php echo base_url(); ?>assets/template/template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo base_url(); ?>assets/template/template/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>