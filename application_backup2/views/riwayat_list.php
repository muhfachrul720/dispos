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
            <!--<a href="<?= base_url()?>regular/pengajuan/form_insert" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  &nbsp; Tambahkan Pengajuan</a>-->
            <!--<a href="<?= base_url()?>regular/pengajuan" class="btn btn-success btn-sm"> <i class="fas fa-sync"></i>  &nbsp; Refresh Halaman</a>-->

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
                  <th>Waktu Terakhir Ditinjau</th>
                  <th>Posisi Terakhir</th>
                  <th>Status</th>
                  <th>Detail</th>
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
                          <!-- <td><?= $val['jatuh_tempo']?></td> -->
                          <td><?= $val['rwaktu']?></td>
                          <td><?= $val['posisi_akhir']?></td>
                          <td><?= generate_status($val['rwaktu'], $val['jatuh_tempo'] , $val['id_akhir']) ?></td>
                          <td><a href="<?= base_url()?>riwayat/detail_pengajuan/<?= $val['id']?>" class="btn btn-primary btn-sm">Detail</a></td>
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

