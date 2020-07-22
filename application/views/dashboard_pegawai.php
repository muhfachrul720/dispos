<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">DUK PEGAWAI</h1>
    </div>

    <div class="row">
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
    </div>

</div>