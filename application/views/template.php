<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Plus Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plus-admin/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/plus-admin/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/plus-admin/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plus-admin/vendors/jquery-bar-rating/css-stars.css" />
    <link rel="stylesheet" href="<?= base_url()?>assets/plus-admin/vendors/font-awesome/css/font-awesome.min.css" />
    <!-- End plugin css for this page -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="<?= base_url()?>assets/plus-admin/css/demo_2/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="<?= base_url()?>assets/plus-admin/images/favicon.png" />

    <script src="<?php echo base_url(); ?>assets/plus-admin/vendors/jquery/jquery.min.js"></script>
    
    <!-- Yearpicker script -->
    <script src="<?= base_url(); ?>assets/plugin-yearpicker/yearpicker.js" async></script>

    <!-- Data tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <!-- Year Picker -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugin-yearpicker/yearpicker.css">

</head>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_horizontal-navbar.html -->
      <div class="horizontal-menu">
        <nav class="navbar top-navbar col-lg-12 col-12 p-0">
          <div class="container">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo" href="index.html">
                <img src="<?= base_url()?>assets/plus-admin/images/logo.svg" alt="logo" />
                <span class="font-12 d-block font-weight-light">Responsive Dashboard </span>
              </a>
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?= base_url()?>assets/plus-admin/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              <ul class="navbar-nav mr-lg-2">
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
                      <img src="<?= base_url()?>assets/plus-admin/images/faces/face1.jpg" alt="image" />
                    </div>
                    <div class="nav-profile-text">
                      <p class="text-black font-weight-semibold m-0"> Olson jass </p>
                      <span class="font-13 online-color">online <i class="mdi mdi-chevron-down"></i></span>
                    </div>
                  </a>
                  <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="mdi mdi-cached mr-2 text-success"></i> Activity Log </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?=base_url()?>auth/logout">
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
       
        <!-- Navbar -->
        <?php include 'template/navbar.php'; ?>

      </div>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <div class="main-panel">
          <div class="content-wrapper pb-0">
            <!-- <div class="page-header flex-wrap">
              <div class="header-left">
                <button class="btn btn-sm btn-primary mb-2 mb-md-0 mr-2"> Create new document </button>
                <button class="btn btn-sm btn-outline-primary mb-2 mb-md-0"> Import documents </button>
              </div>
              <div class="header-right d-flex flex-wrap mt-md-2 mt-lg-0">
                <div class="d-flex align-items-center">
                  <a href="#">
                    <p class="m-0 pr-3">Dashboard</p>
                  </a>
                  <a class="pl-3 mr-4" href="#">
                    <p class="m-0">ADE-00234</p>
                  </a>
                </div>
                <button type="button" class="btn btn-sm btn-primary mt-2 mt-sm-0 btn-icon-text">
                  <i class="mdi mdi-plus-circle"></i> Add Prodcut </button>
              </div>
            </div> -->

            <?php
                echo $contents;
            ?>

          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="container">
              <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2019 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
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
    <script src="<?= base_url()?>assets/plus-admin/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url()?>assets/plus-admin/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/vendors/flot/jquery.flot.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/vendors/flot/jquery.flot.resize.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/vendors/flot/jquery.flot.categories.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/vendors/flot/jquery.flot.stack.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url()?>assets/plus-admin/js/off-canvas.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/js/hoverable-collapse.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/js/misc.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/js/settings.js"></script>
    <script src="<?= base_url()?>assets/plus-admin/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url()?>assets/plus-admin/js/dashboard.js"></script>

      <!-- Datatables -->
    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>assets/assets-sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/assets-sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>assets/assets-sbadmin/js/demo/datatables-demo.js"></script>
    <!-- <script>s -->
    <!-- End custom js for this page -->
  </body>
</html>