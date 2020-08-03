<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Update Data PMK</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Jabatan Latihan Diklat :</small></label>
                <input type="text" name="jabdik" class="form-control form-control-sm" value="<?= $latihan_jabatan_diklat?>">
            </div>
            <div class="col-4">
                <label for=""><small style="font-weight:bold">Tanggal Diklat :</small></label>
                <input type="date" class="form-control form-control-sm" name="datedik" value="<?= $date?>">
            </div>
             <div class="col-4">
                <label for=""><small style="font-weight:bold">Waktu Diklat :</small></label>
                <input type="time" class="form-control form-control-sm" name="timedik" value="<?= $time?>">
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