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

    <?= form_open_multipart('operator/verifikasi/tinjau_action')?>
    <?= form_hidden('idbrk', $id)?>
    <?= form_hidden('idrw', $idriwayat)?>
    
    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">No Hak</label> &nbsp; <?= form_error('hak')?>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan Nomor.." value="<?= $no_hak ?>" disabled>
                        </div>
                        <div class="col-6">
                            <label for="">No Berkas</label> &nbsp; <?= form_error('berkas')?>
                            <input type="text" class="form-control form-control-sm" placeholder="Masukkan Nomor.." value="<?= $no_berkas ?>" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Pemilik</label>  &nbsp; <?= form_error('owner')?>
                        <input type="text" class="form-control form-control-sm" placeholder="Masukkan Pemilik.." value="<?= $nama_pemilik ?>" disabled>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Desa</label>  &nbsp; <?= form_error('camat')?>
                            <?= cmb_dinamis('', 'tbl_desa', 'nama', 'id', $desa, 'DESC', 'disabled', 'camat') ?>
                        </div>
                        <div class="col-6">
                            <label for="">Kecamatan</label>  &nbsp; <?= form_error('camat')?>
                            <select name="camat" id="optCamat" class="form-control form-control-sm" disabled>
                                <option value="<?= $idcmt ?>"><?= $kecamatan ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-6">
                            <label for="">Jenis Permohonan</label>  &nbsp; <?= form_error('jenismohon')?>
                            <?= cmb_dinamis('jenismohon', 'tbl_jenis_permohonan', 'nama', 'id', $jenis_permohonan, 'DESC', 'disabled') ?>
                        </div>
                        <div class="col-6">
                            <label for="">Jenis Hak</label>  &nbsp; <?= form_error('jenishak')?>
                            <?= cmb_dinamis('jenishak', 'tbl_hak_permohonan', 'nama', 'id', $jenis_hak, 'DESC', 'disabled') ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-4">
                            <label for="">Waktu</label>  &nbsp; <?= form_error('date')?>
                            <input type="date" name="date" id="" class="form-control form-control-sm timeSet" placeholder="Masukkan Nomor.." value="<?= date('Y-m-d') ?>" value="<?= explode(' ', $waktu)[0] ?>" disabled>
                        </div>
                        <div class="col-4">
                            <label for="">.</label>  &nbsp; <?= form_error('time')?>
                            <input type="time" name="time" id="" class="form-control form-control-sm timeSet" placeholder="Masukkan Nomor.." value="<?= date('h:m:s')?>" value="<?= explode(' ', $waktu)[1] ?>" disabled>
                        </div>
                        <div class="col-4">
                            <label for="">Jatuh Tempo</label>  &nbsp; <?= form_error('time')?>
                            <input type="text" value="<?= $jatuh_tempo ?>" class="form-control form-control-sm" disabled>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="">Peninjau Berkas</label>
                        <select name="peninjau" id="" class="form-control form-control-sm">
                            <?php foreach($peninjau as $p) {?>
                                <option value="<?= $p['usid'] ?>"><?= $p['username'].' / '.$p['lvname']?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                <table class="table table-striped table-bordered table-sm text-center" style="width:100%; font-size:12px" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Pemohon</th>
                          <th>Tahun</th>
                          <th>Tanggal</th>
                          <th>Jatuh Tempo</th>
                          <th>Posisi Terakhir</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php $no = 1;
                      foreach ($riwayat as $key => $val) { ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= $val['nama_lengkap']?></td>
                              <td><?= $val['tahun']?></td>
                              <td><?= $val['rwaktu']?></td>
                              <td><?= $val['jatuh_tempo']?></td>
                              <td><?= $val['posisi_akhir']?></td>
                          </tr>
                      <?php $no++;
                      } ?>
                  </tbody>
                </table>

                <script type="text/javascript">
                $(document).ready(function() {
                    $('#dataTable').DataTable({searching:false});
                });
                </script>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <textarea name="ket" id="" cols="30" rows="6" class="form-control form-control-sm" placeholder="Keterangan"></textarea>
                        </div>
                        <div class="col-6">
                            <?= form_dropdown('status', array('1' => 'Disetujui', '2' => 'Ditolak'), '', array('class' => 'form-control form-control-sm')); ?>
                            <hr>
                            <small>Sebelum Menekan Tombol Verifikasi Pastikan Berkas, dan Pilihan Persetujuan Telah Benar </small>
                            <input type="submit" class="btn btn-sm btn-success w-100 mt-3" value="Verifikasi">
                        </div>
                    </div>
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
                    html += '<option value='+data[i].id+'>'+data[i].kecamatan+'</option>';
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