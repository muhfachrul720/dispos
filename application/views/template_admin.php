<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sidasip - Sistem Informasi Data Fisip</title>
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
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/template/template/assets/css/demo_2/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/template/template/assets/images/favicon.png" />

    <!-- Jquery -->
    <script src="<?php echo base_url(); ?>assets/assets-sbadmin/vendor/jquery/jquery.min.js"></script>

    <!-- JS BS -->
    <script src="<?php echo base_url();?>assets/template/template/assets/vendors/js/vendor.bundle.base.js"></script>

     <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
  
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

    <!-- Yearpicker script -->
    <script src="<?= base_url(); ?>assets/plugin-yearpicker/yearpicker.js" async></script>

    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugin-yearpicker/yearpicker.css">

  </head>
  <style>

    table {width:100% !important; table-layout: fixed !important;}
    table td, table th {
    word-wrap:break-word !important;
    white-space: normal !important;
    }

  </style>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_horizontal-navbar.html -->
      <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="index.html">
                <img src="<?php echo base_url(); ?>assets/template/template/assets/images/logo-sidasip.png" alt="Sistem Informasi Data Fisip" />
                <span class="font-12 d-block font-weight-light">Sistem Informasi Data Fisip </span>
              </a>
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url(); ?>assets/template/template/assets/images/logo-mini.svg" alt="logo"/></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              <ul class="navbar-nav">
                <li class="nav-item nav-search d-none d-lg-block">
                  <div class="input-group">
                    <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                      <span class="input-group-text" id="search">
                        <i class="mdi mdi-magnify"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search" aria-label="search" aria-describedby="search" />
                  </div>
                </li>
              </ul>
              <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                  <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <div class="nav-profile-img">
                      <img src="<?php echo base_url(); ?>assets/template/template/assets/images/faces/face1.jpg" alt="image" />
                    </div>
                    <div class="nav-profile-text">
                      <p class="text-black font-weight-semibold m-0"> <?= $this->session->userdata('username'); ?> </p>
                      <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-logout mr-2 text-primary"></i> Signout </a>
                  </div>
                </li>
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
                <span class="mdi mdi-menu"></span>
              </button>
            </div>
          </div>
        </nav>
        <nav class="bottom-navbar">
            <?php include 'template/sidebar.php'; ?>
        </nav>
      </div>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper pb-0">
              <?php echo $contents; ?>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © Sidasip 2019 <a href="https://www.bootstrapdash.com/" target="_blank">Fisip UHO</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Kendari Coding <i class="mdi mdi-heart text-danger"></i></span>
              </div>
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
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?php echo base_url();?>assets/template/template/assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/vendors/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?php echo base_url();?>assets/template/template/assets/js/off-canvas.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/js/hoverable-collapse.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/js/misc.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/js/settings.js"></script>
    <script src="<?php echo base_url();?>assets/template/template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?php echo base_url();?>assets/template/template/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>assets/assets-sbadmin/js/demo/datatables-demo.js"></script>
    <!-- <script>s -->

  </body>
</html>