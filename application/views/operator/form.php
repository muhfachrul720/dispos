<div class="content-header">
  <div class="container-fluid px-4 mt-3">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
        <p>Silahkan Menambahkan Pengajuan</p>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="container-fluid px-4">

    <?= form_open_multipart('regular/pengajuan/insert')?>
    <div class="row">
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">No Hak</label> &nbsp; <?= form_error('hak')?>
                            <input type="text" name="hak" id="" class="form-control form-control-sm" placeholder="Masukkan Nomor..">
                        </div>
                        <div class="col-6">
                            <label for="">No Berkas</label> &nbsp; <?= form_error('berkas')?>
                            <input type="text" name="berkas" id="" class="form-control form-control-sm" placeholder="Masukkan Nomor..">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pemilik</label>  &nbsp; <?= form_error('owner')?>
                        <input type="text" name="owner" id="" class="form-control form-control-sm" placeholder="Masukkan Pemilik..">
                    </div>
                    <div class="form-group">
                        <label for="">Desa Kecamatan</label>  &nbsp; <?= form_error('camat')?>
                        <?= cmb_dinamis('camat', 'tbl_desa', 'nama', 'id', '', 'DESC') ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Jenis Permohonan</label>  &nbsp; <?= form_error('jenismohon')?>
                            <?= cmb_dinamis('jenismohon', 'tbl_jenis_permohonan', 'nama', 'id', '', 'DESC') ?>
                            <!-- <select name="jenismohon" id="" class="form-control form-control-sm">
                                <option value="1">Permohonan 1</option>
                            </select> -->
                        </div>
                        <div class="col-6">
                            <label for="">Jenis Hak</label>  &nbsp; <?= form_error('jenishak')?>
                            <?= cmb_dinamis('jenishak', 'tbl_jenis_hak', 'nama', 'id', '', 'DESC') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5">
                            <label for="">Waktu</label>  &nbsp; <?= form_error('date')?>
                            <input type="date" name="date" id="" class="form-control form-control-sm timeSet" placeholder="Masukkan Nomor.." value="<?= date('Y-m-d') ?>" readonly>
                        </div>
                        <div class="col-5">
                            <label for="">.</label>  &nbsp; <?= form_error('time')?>
                            <input type="time" name="time" id="" class="form-control form-control-sm timeSet" placeholder="Masukkan Nomor.." value="<?= date('h:m:s')?>" readonly>
                        </div>
                        <div class="col-2">
                            <label for="">.</label>
                            <br>
                            <button class="btn btn-info btn-sm w-100" id="timeSet">Atur Waktu</button>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Peninjau Berkas</label>  &nbsp; <?= form_error('jenishak')?>
                        <select name="peninjau" id="" class="form-control form-control-sm">
                            <?php foreach($peninjau as $p) {?>
                                <option value="<?= $p['usid'] ?>"><?= $p['username'].' / '.$p['lvname']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <label for="fileUp" class="file_upload" style="width:100%; padding:50px 0px; border:dashed 4px #318cb8; text-align:center; cursor:pointer">
                        <i class="fas fa-file" style="font-size:38px; color:#318cb8;"></i>
                        <br> <small>Upload File</small>
                    </label>
                    <input type="file" id="fileUp" name="fileUp" style="display:none" accept="application/pdf">
                    <span class="btn btn-danger btn-sm w-100 mt-3"><i class="fas fa-times"></i></span>
                    <!--  <i class="fas fa-check"></i> -->

                </div>
            </div>

            <p><small>Silahkan Untuk Menekan tombol Dibawah Apabila Telah Mengisi dan Mengupload File Secara Keseluruhan</small></p>

            <div class="card">
                <div class="card-body">
                    <input type="submit" class="btn btn-sm btn-success w-100" value="Ajukan Permohonan">
                </div>
            </div>

        </div>
    </div>
    <?= form_close()?>
</div>

<script>
    $('#timeSet').on('click', function(){
        $('.timeSet').attr('readonly', false);
    });

    $('#fileUp').on('change', function(){
        var base = $(this).next();
        base.removeClass('btn-danger').addClass('btn-success');
        base.find('i').removeClass('fa-times').addClass('fa-check');
    });
</script>