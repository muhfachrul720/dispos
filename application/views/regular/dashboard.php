<div class="content-header">
  <div class="container-fluid px-4">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="container-fluid px-4">
        
        <div class="row">

            <div class="col-12 col-sm-6 col-md-4">
                <a href="<?= site_url()?>riwayat" class="info-box" style="color:black">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Total Pengajuan (Keseluruhan)</span>
                    <span class="info-box-number">
                        <?= $all ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <a href="<?= site_url()?>riwayat?status=process" class="info-box" style="color:black">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Diproses</span>
                    <span class="info-box-number">
                        <?= $process ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <a href="<?= site_url()?>riwayat?status=done" class="info-box" style="color:black">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Selesai</span>
                    <span class="info-box-number">
                        <?= $done ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </a>
            </div>


            <div class="col-12 col-sm-6 col-md-8">
                <a href="<?= site_url()?>regular/pengajuan" class="info-box" style="color:black">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Didaftarkan</span>
                    <span class="info-box-number">
                        <?= $pengajuan ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </a>
            </div>
            
        </div>

</div>