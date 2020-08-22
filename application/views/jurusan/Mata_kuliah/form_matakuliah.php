<?php
 
?>
<div class="container-fluid">

    <?php if($this->session->flashdata('msg') == 1){?>
        <div class="alert alert-success" role="alert">
            Berhasil Membuat Mata Kuliah 
        </div>
    <?php } else if($this->session->flashdata('msg') == 2) {?>
        <div class="alert alert-danger" role="alert">
            Gagal Membuat Mata Kuliah
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
            if(isset($id_mata_kuliah)){
                echo form_hidden('id', $id_mata_kuliah);
            }
            ?> 

            <div class="row form-group">
                <div class="col-12">
                    <label style="font-weight:bold" for="">Nama Mata Kuliah :</label>
                    <input name="matkul" type="text" class="form-control form-control-sm" style="height:35px" value="<?= $nama_mata_kuliah ?>">
                    <?php echo form_error('matkul') ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-4">
                    <label" style="font-weight:bold" for="">Semester</label>
                    <input name="semester" type="number" min='0' class="form-control form-control-sm" style="height:35px" value="<?= $semester_mata_kuliah ?>">
                    <?php echo form_error('semester') ?>
                </div>
                <div class="col-4">
                    <label style="font-weight:bold" for="">Sks</label>
                    <input name="sks" type="number" min='0' class="form-control form-control-sm" style="height:35px" value="<?= $sks_mata_kuliah ?>">
                    <?php echo form_error('sks') ?>
                </div>
                <div class="col-4">
                    <label style="font-weight:bold" for="">Jurusan</label>
                    <select name="jurusan" id="" class="form-control" readonly>
                        <option value="<?= $jurusan['id_jurusan']?>"><?= $jurusan['nama_jurusan'] ?></option>
                    </select>
                    <!-- <select name="jurusan" id="" class="form-control">
                    <option value="<?=  $id_jurusan ?>" selected><?=  $nama_jurusan ?></option>
                        <?php //for($i = 0; $i < count($jurusan); $i++){?>
                            <option value="<?=  $jurusan[$i]['id_jurusan']?>"><?= $jurusan[$i]['nama_jurusan']?></option>
                        <?php // };?>
                    </select> -->
                    <?php echo form_error('jurusan') ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-6">
                    <input type="submit" class="btn btn-success" value="Buat Mata Kuliah">
                    <a href="<?= base_url()?>jurusan/mata_kuliah" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="col-6">

                </div>
            </div>
            <?= form_close()?>
            
        </div>
    </div>
</div>