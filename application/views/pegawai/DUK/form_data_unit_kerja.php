<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Update Data PMK</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Program Studi :</small></label>
                <input type="text" name="progstu" class="form-control form-control-sm" value="<?= $program_studi_uker?>">
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Homebase :</small></label>
                <input type="text" name="hmbs" class="form-control form-control-sm" value="<?= $homebase_uker?>">
            </div>
        </div>
        <div class="row mb-3 px-3">
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Full Fakultas :</small></label>
                <input type="text" name="fkfull" class="form-control form-control-sm" value="<?= $full_fakultas_uker?>">
            </div>
            <div class="col-6">
                <label for=""><small style="font-weight:bold">Singkat Fakultas :</small></label>
                <input type="text" name="fkpart" class="form-control form-control-sm" value="<?= $singkat_fakultas_uker?>">
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