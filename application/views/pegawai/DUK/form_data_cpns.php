<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Update Data CPNS</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">No SK CPNS :</small></label>
                <input type="text" name="nosk" class="form-control form-control-sm" value="<?= $nomor_sk_cpns?>">
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Tanggal SK CPNS :</small></label>
                <input type="date" name="skdate" class="form-control form-control-sm" value="<?= $tgl_sk_cpns?>">
            </div>
        </div>
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Diberikan Oleh :</small></label>
                <input type="text" name="givedby" class="form-control form-control-sm" value="<?= $oleh_pejabat_cpns?>">
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Terhitung CPNS (TMT) :</small></label>
                <input type="date" name="cpnstmt" class="form-control form-control-sm" value="<?= $tmt_cpns?>">
            </div>
        </div>
        <hr>
        <div class="row mb-3 px-3">
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Pangkat CPNS :</small></label>
                <input type="text" readonly class="form-control form-control-sm" value="Akan Ditentukan Oleh System">
            </div>
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Golongan :</small></label>
                <?php echo form_dropdown('cpnsgol', array('1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV',), $golongan_cpns, array('class' => 'form-control form-control-sm')); ?>
            </div>
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Ruang :</small></label>
                <?php echo form_dropdown('cpnsruang', array('a' => 'a', 'b' => 'b', 'c' => 'c', 'd' => 'd', 'e' => 'e'), $ruang_cpns, array('class' => 'form-control form-control-sm')); ?>
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