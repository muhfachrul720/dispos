<div class="content-header">
  <div class="container-fluid px-4">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
        <p>Menu Untuk mengelola Data Jenis Permohonan</p>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="container-fluid px-4">
    <div class="row">
      <div class="col-xl-12 stretch-card grid-margin">
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="<?= base_url()?>superadmin/permohonan/form_permohonan" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  &nbsp; Tambahkan Data</a>
            <a href="" class="btn btn-success btn-sm"> <i class="fas fa-sync"></i>  &nbsp; Refresh Halaman</a>

            <?php if($alert = $this->session->flashdata('msg') != null) { ?>
                <script>
                  $(document).ready(function(){
                    $(document).Toasts('create', {
                      class: 'bg-success', 
                      body: 'Permohonan Berhasil Ditinjau'
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
                  <th>Jenis Permohonan</th>
                  <th>Aksi</th>
                </tr>
              </thead>

              <tbody>
                <?php $no = 1;
                  foreach ($desa as $key => $val) { ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $val['nama']?></td>
                        <td>
                            <a href="<?= base_url()?>superadmin/permohonan/tinjau_jenis/<?= $val['id'] ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> <a href="<?= base_url()?>superadmin/permohonan/delete_jenis/<?= $val['id']?>" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                  <?php $no++;
                  } ?>    
              </tbody>

              </table>
          </div>
      </div>
  </div>
</div>
        
<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>
</div>

