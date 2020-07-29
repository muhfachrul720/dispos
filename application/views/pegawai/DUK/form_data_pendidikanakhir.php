<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Update Data Pendidikan</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Bidang Ilmu :</small></label>
                <input type="text" name="bidilmu" class="form-control form-control-sm" value="<?= $bidang_ilmu_peter?>">
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Jenjang Pendidikan :</small></label>
                <?php echo form_dropdown('studylevel', array('S-3' => 'Strata 3', 'S-2' => 'Strata 2', 'S-1' => 'Strata 1', 'Spesialis' => 'Spesialis', 'D-4' => 'Diploma 4', 'D-3' => 'Diploma 3', 'D-2' => 'Diploma 2', 'D-1' => 'Diploma 1', 'SLTA' => 'SLTA', 'SLTP' => 'SLTP', 'SD' => 'SD'),  $strata_peter, array('class' => 'form-control form-control-sm')); ?>
                <!-- <input type="date" name="studylevel" class="form-control form-control-sm" value="<?= $strata_peter?>"> -->
            </div>
        </div>
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Tahun Lulus Pendidikan  :</small></label>
                <input type="text" name="yearpass" class="form-control form-control-sm yearpicker" value="<?= $thn_lulus_peter?>">
                <script>
                    $('.yearpicker').yearpicker();
                </script>
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Universitas :</small></label>
                <input type="text" name="school" class="form-control form-control-sm" value="<?= $univ_peter?>">
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