<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Update Data Impassing</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">No SK Impassing :</small></label>
                <input type="text" name="nosk" class="form-control form-control-sm" value="<?= $no_sk_impassing?>">
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Tanggal SK Impassing :</small></label>
                <input type="date" name="skdate" class="form-control form-control-sm" value="<?= $tgl_sk_impassing?>">
            </div>
        </div>
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Diberikan Oleh :</small></label>
                <input type="text" name="givedby" class="form-control form-control-sm" value="<?= $oleh_pejabat_impassing?>">
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Terhitung Impassing (TMT) :</small></label>
                <input type="date" name="imptmt" class="form-control form-control-sm" value="<?= $tmt_impassing?>">
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