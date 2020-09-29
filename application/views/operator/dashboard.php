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

            <div class="col-12 col-sm-6 col-md-12">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Total Pengajuan Berkas</span>
                    <span class="info-box-number">
                        <?= $berkas ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </div>
            </div>


        <?php if(isset($verif_loket)) {?> 
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Yang Dapat Di Edit</span>
                    <span class="info-box-number">
                        <?= $edit ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </div>
            </div>
            <?php };?> 

            <?php if(isset($verif_loket)) {?> 
            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-upload"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Loket Pendaftaran</span>
                    <span class="info-box-number">
                        <?= $verif_loket ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-4">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-upload"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Subseksi</span>
                    <span class="info-box-number">
                        <?= $verif_subseksi ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </div>
            </div>
            <?php };?> 

            <?php if(isset($verif_tanah)) {?> 
            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-upload"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Petugas Pengolah</span>
                    <span class="info-box-number">
                        <?= $verif_pengolah ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </div>
            </div>

            <div class="col-12 col-sm-6 col-md-6">
                <div class="info-box">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-upload"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Pengajuan Kepala Pertanahan</span>
                    <span class="info-box-number">
                        <?= $verif_tanah ?>
                        <small>pengajuan</small>
                    </span>
                    </div>
                </div>
            </div>
            <?php };?> 

        </div>

</div>