<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Update Data Tugas Tambahan Dosen</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Klasifikasi Jabatan :</small></label>
                <?php echo cmb_dinamis('klafjab', 'tbl_kategori_klasifikasi_jabatan', 'nama_klasifikasi_jabatan', 'id_klasifikasi', $klasifikasi_jbt,'DESC') ?>
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Tugas Tambahan :</small></label>
                <?php echo cmb_dinamis('tgstbh', 'tbl_kategori_tugastambahan', 'nama_kategori_tugastambahan', 'id_kategori_tugastambahan', $tugas_tambahan,'DESC') ?>
            </div>
        </div>  
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Nomor SK :</small></label>
                <input type="text" name="nosk" class="form-control form-control-sm" value="<?= $nomor_sk?>">
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Terhitung Tugas (TMT) :</small></label>
                <input type="date" class="form-control form-control-sm" name="tmttgs" value="<?= $tmt_jab?>">
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