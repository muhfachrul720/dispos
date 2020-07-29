<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold">Data Anak</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="row mb-3 px-3">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-12 mb-3">
                        <input type="hidden" name="idanak" value="<?= $id_anak?>">
                        <label for=""><small style="font-weight:bold">Nama Anak :</small></label>
                        <input type="text" name="name" class="form-control form-control-sm" value="<?= $nama_anak?>">
                    </div>
                    <div class="col-12 mb-3">
                        <label for=""><small style="font-weight:bold">Tanggal Lahir Anak :</small></label>
                        <input type="date" name="birthdate" class="form-control form-control-sm" value="<?= $tgl_lahir_anak?>">
                    </div>
                    <div class="col-12 mb-3">
                        <label for=""><small style="font-weight:bold">Jenis Kelamin Anak :</small></label>
                        <?php echo form_dropdown('jkanak', array('Laki-Laki' => 'Laki-Laki', 'Perempuan' => 'Perempuan'), $jk_anak, array('class' => 'form-control form-control-sm')); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <label for=""><small style="font-weight:bold">Keterangan Anak :</small></label>
                <textarea class="form-control form-control-sm" name="ketanak" id="" cols="30" rows="10">
                    <?= $ket_anak?>
                </textarea>
            </div>
        </div>
    </div>
</div>


<div class="row mb-3 px-3" style="text-align:right">
    <div class="col">
        <input type="submit" class="btn btn-success mr-2" value="<?= $button?>Data">
        <a href="<?= base_url()?>dashboard_p" class="btn btn-secondary">Kembali</a>
    </div>
</div>
</form>