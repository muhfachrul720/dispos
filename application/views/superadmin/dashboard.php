<div class="content-header">
  <div class="container-fluid px-4">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content px-4">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <a href="<?= site_url()?>superadmin/user" class="info-box" style="color:black">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Pengguna</span>
                    <span class="info-box-number">
                        <?= $user ?>
                        <small>Orang</small>
                    </span>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <a href="<?= site_url()?>superadmin/userlevel" class="info-box" style="color:black">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-layer-group"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Level Pengguna</span>
                    <span class="info-box-number">
                        <?= $user_level ?>
                        <small>Level</small>
                    </span>
                    </div>
                </a>
            </div>

            
            <div class="col-12 col-sm-6 col-md-3">
                <a href="<?= site_url()?>superadmin/desa/list_kecamatan" class="info-box" style="color:black">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Kecamatan</span>
                    <span class="info-box-number">
                        <?= $kecamatan ?>
                        <small>kecamatan</small>
                    </span>
                    </div>
                
                </a>
            </div>
            
            <div class="col-12 col-sm-6 col-md-3">
                <a href="<?= site_url()?>superadmin/desa/list_desa" class="info-box" style="color:black">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Desa</span>
                    <span class="info-box-number">
                        <?= $desa ?>
                        <small>desa</small>
                    </span>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <a href="<?= site_url()?>superadmin/permohonan/list_jenis_permohonan" class="info-box" style="color:black">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Jenis Permohonan</span>
                    <span class="info-box-number">
                        <?= $jenis_mohon ?>
                        <small>jenis</small>
                    </span>
                    </div>
                </a>
            </div>

            <div class="col-12 col-sm-6 col-md-3">
                <a href="<?= site_url()?>superadmin/permohonan/list_hak_permohonan" class="info-box" style="color:black">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-archive"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Jenis Hak</span>
                    <span class="info-box-number">
                        <?= $hak_mohon ?>
                        <small>hak</small>
                    </span>
                    </div>
                </a>
            </div>


        </div>

    </div>
</section>