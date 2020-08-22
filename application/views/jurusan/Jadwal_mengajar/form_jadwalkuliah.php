<div class="container-fluid">

    <?php if($this->session->flashdata('msg') == 1){?>
        <div class="alert alert-success" role="alert">
            Berhasil Membuat Jadwal Kuliah 
        </div>
    <?php } else if($this->session->flashdata('msg') == 2) {?>
        <div class="alert alert-danger" role="alert">
            Gagal Membuat Jadwal Kuliah Pastikan Untuk Memilih Dosen, Mata Kuliah, Dan Menentukan Jam serta Hari
        </div>
    <?php };?>

    <div class="card shadow mb-4 p-5" style="font-size:14px">
        <div class="header">
            <h3 class="mb-3"><?= $title ?></h3>
            <p class="mb-0">Silahkan Untuk Mengisi Form dibawah dengan benar dan lengkap</p>
        </div>
        <hr>
        <div class="body">

            <?= form_open($action)?>

            <?php 
            if(isset($id_jadwal_kuliah)){
                echo form_hidden('id', $id_jadwal_kuliah);
            }
            ?> 

            <div class="row form-group">
                <div class="col-6">
                    <label style="font-weight:bold" for="">Nama Dosen :</label>
                    <select name="dosen" id="" class="form-control form-control-sm" style="height:35px">
                        <option value="<?= $id_pegawai ?>" selected><?= $nama_lengkap_peg ?></option>
                        <?php for($i=0; $i<count($dosen); $i++){?>
                            <option value="<?= $dosen[$i]['id_pegawai']?>"><?= $dosen[$i]['nama_lengkap_peg']?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-6">
                    <label style="font-weight:bold" for="">Nama Mata Kuliah :</label>
                    <select name="matkul" id="" class="form-control">
                        <?php for($i = 0; $i < count($matkul) ; $i++){?>
                            <option value="<?= $matkul[$i]['id_mata_kuliah']?>"><?= $matkul[$i]['nama_mata_kuliah']?></option>
                        <?php };?>
                    </select>
                    <!-- <?php echo cmb_dinamis('matkul', 'tbl_mata_kuliah', 'nama_mata_kuliah', 'id_mata_kuliah', $id_mata_kuliah,'DESC') ?> -->
                </div>
            </div>
            <div class="row form-group">
                <div class="col-4">
                    <label style="font-weight:bold" for="">Hari Pengajaran :</label>
                    <?php echo form_dropdown('date', array('senin' => 'Senin', 'selasa' => 'Selasa', 'rabu' => 'Rabu', 'kamis' => 'Kamis', 'jumat' => 'Jumat', 'sabtu' => 'Sabtu', 'minggu' => 'Minggu'), $hari_jadwal_kuliah, array('class' => 'form-control')); ?>
                    <?php echo form_error('date') ?>
                </div>
                <div class="col-4">
                    <label style="font-weight:bold" for="">Jam Masuk :</label>
                    <input type="time" name="timeIn" class="form-control form-control-sm" value="<?= $jam_masuk_kuliah ?>">
                    <?php echo form_error('timeIn') ?>
                </div>
                <div class="col-4">
                    <label style="font-weight:bold" for="">Jam Keluar :</label>
                    <input type="time" name="timeOut" class="form-control form-control-sm" value="<?= $jam_keluar_kuliah ?>">
                    <?php echo form_error('timeOut') ?>
                </div>
                <!-- <div class="col-4">
                    <label style="font-weight:bold" for="">Ruang Pengajaran :</label>
                    <?php // echo form_dropdown('room', array('Ruang 1' => 'Ruang 1', 'Ruang 2' => 'Ruang 2'), $, array('class' => 'form-control')); ?>
                </div> -->
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <input type="submit" class="btn btn-success" value="Buat Jadwal Kuliah">
                    <a href="<?= base_url()?>jurusan/data_jadwal_mengajar" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="col-6">

                </div>
            </div>
            <?= form_close()?>
            
        </div>
    </div>
</div>