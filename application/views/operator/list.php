<div class="content-header">
  <div class="container-fluid px-4">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
        <p><?= $subtitle ?></p>
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
                  <th>No Berkas</th>
                  <th>Nama Pemohon</th>
                  <th>Tahun</th>
                  <th>Tanggal Mulai</th>
                  <th>Jatuh Tempo</th>
                  <th>Posisi Akhir</th>
                  <th>Detail</th>
                </tr>
              </thead>

              <tbody>
                <?php $no = 1;
                  foreach ($verif as $key => $val) { 
                        // echo json_encode( $val );die;
                        $color = generate_color(date("Y:m:d H:i:s"), $val['jatuh_tempo'] );
                  ?>
                    <tr style="color:<?= $color ?>" >
                        <td><?= $no ?></td>
                        <td><?= $val['no_berkas']?></td>
                        <td><?= $val['nama_pemilik']?></td>
                        <td><?= $val['tahun']?></td>
                        <td><?= $val['waktu']?></td>
                        <td><?= $val['jatuh_tempo']?></td>
                        <td><?= $val['posisi_akhir']?></td>
                        <td>
                            <a href="<?= base_url()?>operator/verifikasi/form_tinjau/<?= $val['rwid']?>" class="btn btn-primary btn-sm">Tinjau</a>
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

