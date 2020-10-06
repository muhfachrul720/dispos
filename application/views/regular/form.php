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
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Kecamatan</label>  &nbsp; <?= form_error('camat')?>
                            <?= cmb_dinamis('', 'tbl_kecamatan', 'kecamatan', 'id', '', 'DESC', null, 'camat') ?>
                        </div>
                        <div class="col-6">
                            <label for="">Desa</label>  &nbsp; <?= form_error('camat')?>
                            <select name="camat" id="optCamat" class="form-control form-control-sm" disabled>
                                <option value="0">Silahkan Memilih Kecamatan Terlebih Dahulu</option>
                            </select>
                        </div>
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
                            <?= cmb_dinamis('jenishak', 'tbl_hak_permohonan', 'nama', 'id', '', 'DESC') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-5">
                            <label for="">Waktu</label>  &nbsp; <?= form_error('date')?>
                            <input type="date" name="date" id="" class="form-control form-control-sm timeSet" placeholder="Masukkan Nomor.." value="<?= date('Y-m-d') ?>" readonly>
                        </div>
                        <div class="col-5">
                            <label for="">.</label>  &nbsp; <?= form_error('time')?>
                            <input type="time" name="time" id="" class="form-control form-control-sm timeSet" placeholder="Masukkan Nomor.." value="<?= date('H:i:s')?>" readonly>
                        </div>
                        <div class="col-2">
                            <label for="">.</label>
                            <br>
                            <button class="btn btn-info btn-sm w-100" id="timeSet" type="button"> Atur Waktu</button>
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

    $('#camat').on('change', function(){
        var id = $(this).val();
        $.ajax({
            url : '<?=base_url()?>regular/pengajuan/get_kecamatan',
            type : "POST",
            data : {id : id},
            dataType : 'json',
            success : function(data){
                var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id+'>'+data[i].nama+'</option>';
                }
                $('#optCamat').html(html);
                $('#optCamat').prop('disabled', false);
            }
        });
        return false;
        // console.log(id);
    });

    // $('#fileUp').on('change', function(){
    //     var base = $(this).next();
    //     base.removeClass('btn-danger').addClass('btn-success');
    //     base.find('i').removeClass('fa-times').addClass('fa-check');
    // });
</script>