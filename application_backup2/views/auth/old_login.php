<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIDASIP - SISTEM INFORMASI DATA FISIP</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/template_login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template_login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template_login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template_login/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template_login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template_login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template_login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/template_login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100" style="background-image: url('assets/template_login/images/dron_uho.jpg');">
            <div class="wrap-login100 p-t-10 p-b-30">

                

                <!-- form open -->
                <?php 
                    $attributes = array('class' => 'login100-form validate-form');
                    echo form_open('Auth/cheklogin', $attributes); 
                ?>
                <!-- end form open -->

                    <div class="login100-form-avatar">
                        <img src="<?php echo base_url(); ?>assets/template_login/images/logo.png" alt="FISIP UHO">
                    </div>

                    <span class="login100-form-title p-t-20 p-b-45">
                        SIDASIP<br><small style="color: black;">SISTEM INFORMASI DATA FISIP</small> 
                    </span>

                    <!-- Notif jika login gagal atau berhasil -->
                 <?php
                    $status_login = $this->session->userdata('status_login');
                    if (empty($status_login)) {
                        $message = "Silahkan login untuk masuk ke aplikasi";
                    } else {
                        $message = $status_login;
                    }
                    ?>
                    <p class="text-center w-full txt1 p-b-18"><?php echo $message; ?></p>
                <!-- end notif -->

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Username harus di isi">
                        <input class="input100" type="text" name="username" placeholder="Username">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-user"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-10" data-validate = "Password harus di isi">
                        <input class="input100" type="password" name="password" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn p-t-10">
                        <button type="submit" class="login100-form-btn">
                            Login
                        </button>
                    </div>

                    <div class="text-center w-full p-t-25 p-b-10">
                        <a href="#" class="txt1">
                            Forgot Username / Password?
                        </a>
                    </div>

                    <div class="text-center w-full">
                        <a class="txt1" href="#">
                            Create new account
                            <i class="fa fa-long-arrow-right"></i>                      
                        </a>
                    </div>
                <?php 
                    echo form_close();
                 ?>
            </div>
        </div>
    </div>
    
    

    
<!--===============================================================================================-->  
    <script src="<?php echo base_url(); ?>assets/template_login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/template_login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo base_url(); ?>assets/template_login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/template_login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/template_login/js/main.js"></script>

</body>
</html>