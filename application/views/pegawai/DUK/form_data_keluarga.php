<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Form Data Keluarga</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Nama Istri/Suami :</small></label>
                <input type="text" name="partnername" class="form-control form-control-sm" value="<?= $nama_istri_suami_kel?>">
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Tanggal Nikah :</small></label>                
                <input type="date" name="marrieddate" class="form-control form-control-sm" value="<?= $tgl_nikah_kel?>">
            </div>
        </div>  
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Jumlah Anak :</small></label>                
                <input type="number" class="form-control form-control-sm" readonly min="0" value="<?= $jumlah_anak?>">
            </div>
            <div class="col-6">
                <label for=""></label>
                <a href="<?= base_url()?>dashboard_p/form_data_anak" class="btn btn-success w-100">Tambah Anak</a>
            </div>
        </div>
    </div>
</div>
<div class="row mb-3 px-3" style="text-align:right">
    <div class="col">
        <input type="submit" class="btn btn-success mr-2" value="Update Data">
        <a href="<?= base_url()?>dashboard_p" class="btn btn-secondary">Kembali</a>
    </div>
</div>
</form>

<hr>

<?php for($no=0; $no<count($anak); $no++) {?>
<div class="card shadow mb-4">
    <input type="hidden" name="idanak[]" value="<?=$anak[$no]['id_anak']?>">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Data Anak Ke <?= $no + 1?></h6>
    </div>
    <div class="card-body px-4 py-3" id="childContainer">
        <div class="row mb-3 px-3">
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Nama Anak :</small></label>
                <input type="text" name="partnername" class="form-control form-control-sm" value="<?= $anak[$no]['nama_anak']?>">
            </div>
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Tanggal Lahir Anak :</small></label>
                <input type="date" name="partnername" class="form-control form-control-sm" value="<?= $anak[$no]['tgl_lahir_anak']?>">
            </div>
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Jenis Kelamin Anak :</small></label>
                <?php echo form_dropdown('ruang', array('Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'), $anak[$no]['jk_anak'], array('class' => 'form-control form-control-sm')); ?>
            </div>
        </div>
        <div class="row mb-3 px-3">
            <div class="col-10">
                <label for=""><small style="font-weight:bold">Keterangan :</small></label>
                <textarea class="form-control form-control-sm" name="ket" id="" cols="50" rows="5"><?= $anak[$no]['ket_anak']?></textarea>
            </div>
            <div class="col-2">
                <label for=""><small style="font-weight:bold">Aksi :</small></label>
                <a href="<?= base_url()?>dashboard_p/delete_anak/<?= $anak[$no]['id_anak']?>" class="btn btn-danger mb-2" value="">Hapus Anak</a>
                <a href="<?= base_url()?>dashboard_p/form_data_anak/<?= $anak[$no]['id_anak']?>" class="btn btn-warning mb-2">Edit Data Anak</a>
            </div>
        </div>
    </div>
</div>
<?php };?>
