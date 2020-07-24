<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DUK PEGAWAI</h1>
    </div>

    <?php
        if($days = notif_pensiun($birthdate)){
    ?>
        <div class="alert alert-danger">Harap Segera Mengajukan Pensiun. Sisa Waktu untuk mengajukan Pensiun tersisa : <?= $days?> Hari &nbsp <a href="">Ajukan Pensiunan Sekarang</a> </div>
    <?php
        };
    ?>

    <div class="card">
        <div class="card-body">
           <div class="row">
           <div class="col-lg-4">
                    <div style="width:250px; border:solid 1px; overflow:hidden; height:350px; background-color:red; margin:auto;position:relative">
                    <?php if ($this->session->userdata('images') == NULL): ?>
                        <img class="img-profile" style="width:200%; position:absolute; left:-70px; top:0%" src="<?php echo base_url() ?>assets/foto_profil/Copy.jpg?>">
                    <?php else: ?>
                        <img class="img-profile"  style="width:200%; position:absolute; left:-70px; top:0%" src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?>">
                    <?php endif ?>
                    </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-lg-12 mb-2" style="text-align:center;font-weight:bold">
                        Data Akun
                    </div>
                    <table class="w-100 table" style="border-bottom:1px solid #e3e6f0">
                            <tr>
                                <td width="35%">Username</td>
                                <td width="2%">:</td>
                                <td>Ello</td>
                            </tr>
                    </table>
                    <div class="col-lg-12 mb-2" style="text-align:center;font-weight:bold">
                           <a href="<?= base_url('dashboard_p/detail_duk')?>" class="btn w-100 btn-info" style="color:white; cursor:pointer">Lihat Selengkapnya</a>
                    </div>
                </div>
            </div>
           </div>
        </div>
    </div>

    <!-- Backtup -->
    <!-- <div class="row">
        <div class="col-lg-4">
        <?php if ($this->session->userdata('images') == NULL): ?>
                <div style="width:300px; border:gray solid 1px; overflow:hidden; height:400px; background-color:red; position:relative">
                    <img class="img-profile" style="width:450px; position:absolute; left:-70px; top:0%" src="<?php echo base_url() ?>assets/foto_profil/Copy.jpg?>">
                </div>
                <?php else: ?>
                <div style="width:300px; border:gray solid 1px; overflow:hidden; height:400px; background-color:red; position:relative">
                    <img class="img-profile"  style="width:450px; position:absolute; left:-70px; top:0%" src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('images'); ?>">
                </div>
                <?php endif ?>
        </div>
        <div class="col-lg-8" style="height:63vh; overflow:scroll">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                            <td style="text-align:center; font-weight:bold">Data Akun</td>
                            <td style="text-align:right;">
                                <a href="<?=base_url()?>dashboard_p/detail_duk" class="btn btn-sm btn-info">Lihat Selengkapnya</a>
                                <a href="<?=base_url()?>dashboard_p/form_duk" class="btn btn-sm btn-success">Edit</a>
                            </td>
                    </tr>
                    <tr>
                        <td>Username</td>
                        <td><?= $email?></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td><?= $name?></td>
                    </tr>
                     <tr>
                        <td>Jabatan</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Status Kepegawaian</td>
                        <td></td>
                    </tr>  
                    <tr>
                        <td>Pangkat</td>
                        <td></td>
                    </tr>  
                    <tr>
                        <td>Gol</td>
                        <td></td>
                    </tr>  
                    <tr>
                        <td>Ruang</td>
                        <td></td>
                    </tr> 
                    <tr>
                        <td>Tahun Pensiunan</td>
                        <td></td>
                    </tr> 
                </table>
            </div>
        </div>
    </div> -->

</div>