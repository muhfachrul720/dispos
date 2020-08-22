<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">

<?php if($this->session->userdata('id_user_level') == 5){ ?> 

<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold px-3">Update Data Pegawai</h6>
    </div>
    <div class="card-body px-4 py-3">
    <input type="hidden" name="idpeg" value="<?= $id_pegawai?>">
    <div class="row mb-3 px-3">
        <div class="col-5">
            <label for=""><small style="font-weight:bold">Nama Pegawai :</small></label>
            <p style="margin:0"><?= $nama_tanpa_gelar_peg?></p>
        </div>
        <div class="col-5">
            <label for=""><small style="font-weight:bold">Nip (Nomor Induk Pegawai) :</small></label>
            <p style="margin:0"><?= $nip_peg?></p>
        </div>
    </div>
    <div class="row mb-3 px-3">
        <div class="col-5">
            <label for=""><small style="font-weight:bold">Status Kepegawaian :</small></label>
            <?php echo form_dropdown('statuspeg', array('Aktif' => 'Aktif', 'Tidak Aktif' => 'Tidak Aktif'), $status_kepegawaian_peg, array('class' => 'form-control form-control-sm')); ?>
            <!-- <input name="statuspeg" type="text" class="form-control form-control-sm" value="<?= $status_kepegawaian_peg?>"> -->
        </div>
        <div class="col-5">
            <label for=""><small style="font-weight:bold">Terhitung Masuk (TMT) :</small></label>
            <input id="tmtIn" name="tmtmasuk" type="date" class="form-control form-control-sm" value="<?= $tmt_masuk_peg?>">
        </div>
        <div class="col-2">
            <label for="" style="color:white"> asdas </label>
            <input type="button" id="detailBtn" class="btn btn-info w-100" value="Selengkapnya" style="height:60%">
        </div>
    </div>
    <div class="row mb-3 px-3">
        <div class="col-12">
            <div style="height:0; overflow:hidden;" id="detailInfo">
                <label for=""><small style="font-weight:bold">Meninggal Dunia :</small></label>
                <input name="deaddate" type="date" class="form-control form-control-sm" value="<?= $tgl_meninggal_dunia_peg?>">    
            </div>
        </div>
        <script>
            $('#detailBtn').on('click', function(){
                $('#detailInfo').css('height', 'auto');
            });
        </script>
    </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3 px-4" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold px-3">Update Jabatan</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-3">
                <label for=""><small style="font-weight:bold">Jabatan Fungsional</small></label>
                <?= cmb_dinamis('jabfungsi', 'tbl_kategori_jabatan_fung', 'nama_kategori_fung', 'id_kategori_jabatan_fung', $id_kategori_jab_fungsional,'DESC') ?>
            </div>
            <div class="col-3">
                <label for=""><small style="font-weight:bold">TMT Jabatan Fungsional</small></label>
                <input type="date" name="tmtfungsional" class="form-control" value="<?= $tmt_jab_fungsional?>" style="height:40px; padding:0px 10px">
            </div>
            <div class="col-3">
                <label for=""><small style="font-weight:bold">Jabatan Struktural</small></label>
                <?= cmb_dinamis('jabstruktur', 'tbl_kategori_jabatan_struktur', 'nama_jabatan_struktur', 'id_kat_jbt_struktur', $id_kat_jab_struktural,'DESC') ?>
            </div>
            <div class="col-3">
                <label for=""><small style="font-weight:bold">TMT Jabatan Struktural</small></label>
                <input type="date" name="tmtstruktural" class="form-control" value="<?= $tmt_jab_struktural?>"  style="height:40px; padding:0px 10px">
            </div>
        </div>
    </div>
</div>
<?php } else {?>

<div class="card shadow mb-4">
        <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
            <h6 class="m-0 font-weight-bold">Update Data Pegawai</h6>
        </div>
        <div class="card-body px-4 py-3">
            <input type="hidden" name="id" value="<?= $id_pegawai?>">
            <div class="row mb-3 px-3">
                <div class="col-6">
                    <label for=""><small style="font-weight:bold">Nama Lengkap :</small></label>
                    <input name="name" type="text" class="form-control form-control-sm" value="<?= $nama_tanpa_gelar_peg?>">
                </div>
                <div class="col-6">
                    <label for=""><small style="font-weight:bold">Nip (Nomor Induk Pegawai) :</small></label>
                    <input name="nip" type="text" class="form-control form-control-sm" value="<?= $nip_peg?>">
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
                    <input name="birthdate" type="date" class="form-control form-control-sm" value="<?= $tgl_lahir_peg?>" disabled>
                </div>
            </div>
            <hr style="mx-2">
            <div class="row mb-3 px-3">
                <div class="col-6">
                    <label for=""><small style="font-weight:bold">Karpeg pegawai :</small></label>
                    <input name="karpeg" type="text" class="form-control form-control-sm" value="<?= $karpeg_peg?>">
                </div>
                <div class="col-6">
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
                <label for=""><small style="font-weight:bold">Gelar Prof :</small></label>
                <?php echo form_dropdown('profgelar', array('' => 'Tidak Ada', 'Prof.' => 'Prof.'), $prof_gelar, array('class' => 'form-control form-control-sm')); ?>
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Gelar Haji :</small></label>
                <?php echo form_dropdown('hajigelar', array('' => 'Tidak Ada', 'H.' => 'H.', 'Hj.' => 'Hj.'), $h_hj_gelar, array('class' => 'form-control form-control-sm')); ?>
            </div>
        </div>
        <div class="row mb-3 px-3">
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Gelar Doktor :</small></label>
                <input type="text" name="doktorgelar" value="<?= $doktor_gelar?>" class="form-control form-control-sm">
            </div>
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Gelar Magister :</small></label>
                <input type="text" name="magistergelar" value="<?= $magister_gelar?>" class="form-control form-control-sm">
            </div>  
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Gelar Strata I :</small></label>
                <input type="text" name="strata1gelar" value="<?= $strata_1_gelar?>" class="form-control form-control-sm">
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