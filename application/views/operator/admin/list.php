<div class="content-header">
  <div class="container-fluid px-4">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
        <p>Data Berikut Merupakan Kumpulan Pengajuan Berkas, Yang telah diajukan Sebelumnya</p>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="container-fluid px-4">
    <div class="row">
      <div class="col-xl-12 stretch-card grid-margin">
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="" class="btn btn-success btn-sm"> <i class="fas fa-sync"></i>  &nbsp; Refresh Halaman</a>

            <?php if($alert = $this->session->flashdata('msg') != null) { ?>
                <script>
                  $(document).ready(function(){
                    $(document).Toasts('create', {
                      class: 'bg-success', 
                      title: 'Pengajuan Permohonan',
                      body: 'Permohonan Berhasil Dibuat'
                    });
                  });
                </script>
            <?php };?>

            <!-- Alert -->
            <!-- end Alert -->
          </div>
        </div>
      </div>
      <div class="col-xl-12 stretch-card grid-margin">
        <div class="card shadow mb-4">
          <div class="card-body">
          <table class="table table-striped table-bordered table-sm text-center" style="width:100%; font-size:12px" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>No Berkas</th>
                  <th>Nama Pemohon</th>
                  <th>Waktu Pengajuan</th>
                  <th>Posisi Terakhir</th>
                  <th>Detail</th>
                  <th>Aksi</th>
                  <?php if($this->session->userdata('user_level') == 9) {?>
                    <th>Izin Edit</th>
                  <?php };?>
                </tr>
              </thead>

              <tbody>
                <?php $no = 1;
                  foreach ($riwayat as $key => $val) { ?>
                      <tr>
                          <td><?= $no ?></td>
                          <td><?= $val['no_berkas']?></td>
                          <td><?= $val['nama_pemilik']?></td>
                          <td><?= $val['waktu']?></td>
                          <td><?= $val['posisi_akhir']?></td>
                          <td><a href="<?= base_url()?>riwayat/detail_pengajuan/<?= $val['id']?>" class="btn btn-primary btn-sm">Detail</a></td>
                          <td>
                              <a href="<?=base_url()?>operator/admin/pengajuan/form_edit/<?= $val['brid']?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                              <?php if($this->session->userdata('user_level') == 9 || $this->session->userdata('user_level') == 8) {?>
                                <button type="button" class="btn btn-danger btn-sm delete" data-toggle="modal" data-target="#modal-sm" value="<?= $val['brid']?>">
                                  <i class="fas fa-trash-alt"></i>
                                </button>
                                    <!-- <a href="<?=base_url()?>operator/admin/pengajuan/delete/<?= $val['brid']?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a> -->
                              <?php };?>
                          </td>
                          <?php if($this->session->userdata('user_level') == 9 || $this->session->userdata('user_level') == 8) {?>
                          <td>
                            <div class="icheck-primary d-inline">
                                <?php if($val['permit'] != 0) {?>
                                    <input type="checkbox" class="permission" id="checkboxPrimary<?= $no ?>" value="<?= $val['brid'] ?>" checked>
                                <?php } else {?>
                                    <input type="checkbox" class="permission" id="checkboxPrimary<?= $no ?>" value="<?= $val['brid'] ?>">
                                <?php }; ?>
                                <label for="checkboxPrimary<?= $no ?>"></label>
                            </div>
                          </td>
                          <?php };?>
                      </tr>
                  <?php $no++;
                  } ?>    
              </tbody>

              </table>
          </div>
      </div>
  </div>
</div>

<div class="modal fade" id="modal-sm">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-body">
        Yakin Ingin Menghapus Pengajuan ?
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <?= form_open('operator/admin/pengajuan/delete')?>
          <input type="hidden" value="" id="hiddenID" name="id">
          <input type="submit" class="btn btn-primary" value="Hapus">
        <?= form_close()?>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
        
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
} );

$('.delete').on('click', function(){
  var id = $(this).val();
  $('#hiddenID').val(id);
})

$('.permission').on('change', function(){

    var id = $(this).val();
    var permit = 'FALSE';

    if($(this).prop("checked") == true){
        permit = "TRUE";
    }

    $.ajax({
        url : '<?= base_url()?>operator/admin/pengajuan/update_permit',
        type : 'POST',
        data : {id : id, permit : permit},
        success : function(data){

        }
    })

}); 
</script>
</div>

