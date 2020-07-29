<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="card shadow mb-4">
        <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
            <h6 class="m-0 font-weight-bold">Update Data Pegawai</h6>
        </div>
        <div class="card-body px-4 py-3">

            <?php if($this->session->userdata('id_user_level') == 5){ ?> 
            <input type="hidden" name="idpeg" value="<?= $id_pegawai?>">
            <div class="row mb-3 px-3">
                <div class="col-12">
                    <label for=""><small style="font-weight:bold">Nama Pegawai :</small></label>
                    <p style="margin:0"><?= $nama_tanpa_gelar_peg?></p>
                </div>
            </div>
            <div class="row mb-3 px-3">
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Terhitung Pensiun (TMT) :</small></label>
                    <input name="tmtpensi" type="date" class="form-control form-control-sm" value="<?= $tmt_pensiun_peg?>">
                </div>
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Status Kepegawaian :</small></label>
                    <?php echo form_dropdown('statuspeg', array('Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif'), $status_kepegawaian_peg, array('class' => 'form-control form-control-sm')); ?>
                    <!-- <input name="statuspeg" type="text" class="form-control form-control-sm" value="<?= $status_kepegawaian_peg?>"> -->
                </div>
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Tanggal Meninggal Dunia :</small></label>
                    <input name="deaddate" type="date" class="form-control form-control-sm" value="<?= $tgl_meninggal_dunia_peg?>">
                </div>
            </div>
            <hr>
            <?php } else {?>
            
            <input type="hidden" name="id" value="<?= $id_pegawai?>">
            <div class="row mb-3 px-3">
                <div class="col-12">
                    <label for=""><small style="font-weight:bold">Nama Lengkap :</small></label>
                    <input name="name" type="text" class="form-control form-control-sm" value="<?= $nama_tanpa_gelar_peg?>">
                </div>
            </div>
            <div class="row mb-3 px-3">
                <div class="col-6">
                    <label for=""><small style="font-weight:bold">Nip (Nomor Induk Pegawai) :</small></label>
                    <input name="nip" type="text" class="form-control form-control-sm" value="<?= $nip_peg?>">
                </div>
                <div class="col-6">
                    <label for=""><small style="font-weight:bold">Nip Full :</small></label>
                    <input name="nipfull" type="text" class="form-control form-control-sm" value="<?= $nip_full_peg?>">
                </div>
            </div>
            <div class="row mb-3 px-3">
                <div class="col-6">
                    <label for=""><small style="font-weight:bold">Jenis Kelamin :</small></label>
                    <?php echo form_dropdown('gender', array('Laki Laki' => 'Laki Laki', 'Perempuan' => 'Perempuan'), $jk_peg, array('class' => 'form-control form-control-sm')); ?>
                </div>
                <div class="col-6">
                    <label for=""><small style="font-weight:bold">Agama</small></label>
                    <?php echo form_dropdown('religion', array('Islam' => 'Islam', 'Katolik' => 'Katolik', 'Protestan' => 'Protestan', 'Hindu' => 'Hindu', 'Buddha' => 'Buddha'), $agama_peg, array('class' => 'form-control form-control-sm')); ?>
                </div>
            </div>
            <div class="row mb-3 px-3">
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Tempat Lahir :</small></label>
                    <input name="birthplace" type="text" class="form-control form-control-sm" value="<?= $tempat_lahir_peg?>">
                </div>
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Tempat Lahir (Kabupaten) :</small></label>
                    <input name="birthkab" type="text" class="form-control form-control-sm" value="<?= $kabupaten_lahir_peg?>">
                </div>
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Tanggal Lahir :</small></label>
                    <input name="birthdate" type="date" class="form-control form-control-sm" value="<?= $tgl_lahir_peg?>">
                </div>
            </div>
            <hr style="mx-2">
            <div class="row mb-3 px-3">
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Nip Lama Pegawai :</small></label>
                    <input name="oldnip" type="text" class="form-control form-control-sm" value="<?= $nip_lama_peg?>">
                </div>
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Karpeg pegawai :</small></label>
                    <input name="karpeg" type="text" class="form-control form-control-sm" value="<?= $karpeg_peg?>">
                </div>
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Nidn Pegawai :</small></label>
                    <input name="nidn" type="text" class="form-control form-control-sm" value="<?= $nidn_peg?>">
                </div>
            </div>
            <div class="row mb-3 px-3">
                <div class="col-12">
                    <label for=""><small style="font-weight:bold">Sertifikat Dosen :</small></label>
                    <input name="sertif" type="text" class="form-control form-control-sm" value="<?= $sertifikat_dosen_peg?>">
                </div>
            </div>
            <hr style="mx-2">
            <div class="row mb-3 px-3">
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Alamat :</small></label>
                    <input name="address" type="text" class="form-control form-control-sm" value="<?= $alamat_rumah_peg?>">
                </div>
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Telepon Kantor :</small></label>
                    <input name="officephone" type="text" class="form-control form-control-sm" value="<?= $tlp_kantor_peg?>">
                </div>
                <div class="col-4">
                    <label for=""><small style="font-weight:bold">Telepon Rumah :</small></label>
                    <input name="homephone" type="text" class="form-control form-control-sm" value="<?= $tlp_rumah_peg?>">
                </div>
            </div>
            <div class="row mb-3 px-3">
                <div class="col-3">
                    <label for=""><small style="font-weight:bold">Fax :</small></label>
                    <input name="fax" type="text" class="form-control form-control-sm" value="<?= $fax_kntr_peg?>">
                </div>
                <div class="col-3">
                    <label for=""><small style="font-weight:bold">Kode Pos :</small></label>
                    <input name="postcode" type="text" class="form-control form-control-sm" value="<?= $kode_pos_peg?>">
                </div>
                <div class="col-3">
                    <label for=""><small style="font-weight:bold">Nomor Handphone :</small></label>
                    <input name="phonenumber" type="text" class="form-control form-control-sm" value="<?= $hp_peg?>">
                </div>
                <div class="col-3">
                    <label for=""><small style="font-weight:bold">Email :</small></label>
                    <input name="email" type="text" class="form-control form-control-sm" value="<?= $email_peg?>">
                </div>
            </div>
        </div>
</div>

<div class="card shadow mb-4">
    <input type="hidden" name="idgelar" value="<?= $id_gelar?>">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Update Data Gelar</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Prof Gelar :</small></label>
                <?php echo form_dropdown('profgelar', array('' => 'Tidak Ada', 'Prof.' => 'Prof.'), $prof_gelar, array('class' => 'form-control form-control-sm')); ?>
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Gelar Depan :</small></label>
                <?php echo form_dropdown('frontgelar', array('' => 'Tidak Ada', 'Dr.' => 'Dr.'), $depan_gelar, array('class' => 'form-control form-control-sm')); ?>
            </div>  
        </div>
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Gelar Haji :</small></label>
                <?php echo form_dropdown('hajigelar', array('' => 'Tidak Ada', 'H.' => 'H.'), $h_hj_gelar, array('class' => 'form-control form-control-sm')); ?>
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Gelar Depan :</small></label>
                <input type="text" name="backgelar" value="<?= $belakang_gelar?>" class="form-control form-control-sm">
                <!-- <?php echo form_dropdown('frontgelar', array('' => 'Tidak Ada', 'Dr.' => 'Dr.'), $depan_gelar, array('class' => 'form-control form-control-sm')); ?> -->
            </div>  
        </div>
    </div>
</div>
<?php };?>

<div class="row mb-3 px-3" style="text-align:right">
    <div class="col">
        <input type="submit" class="btn btn-success mr-2" value="Update Data">
        <?php if($this->session->userdata('id_user_level') == 5){?>
            <a href="<?= base_url()?>pegawai/data_duk" class="btn btn-secondary">Kembali</a>
        <?php } else {?>
            <a href="<?= base_url()?>dashboard_p" class="btn btn-secondary">Kembali</a>
        <?php };?>
    </div>
</div>
</form> 