<div class="container-fluid" style="margin-bottom:30vh">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
          </div>

          <div class="row">

            <div class="col-6">

              <div class="row">
                <div class="col-6">
                  <a href="<?= base_url() ?>pegawai/verifikasi_cuti">
                    <div class="card stretch-card mb-3" style="background-color:#0984e3; color:white">
                      <div class="card-body d-flex flex-wrap justify-content-between">
                        <div>
                          <h4 class="font-weight-semibold mb-1"> Pengajuan Cuti </h4>
                          <small class="mb-4">Pengajuan Cuti Yang belum Ditinjau :</small>
                        </div>
                        <h3 class=" mt-2 font-weight-bold"><?= $countcuti ?></h3>
                      </div>
                    </div>
                  </a>
                </div>

                <div class="col-6">
                  <a href="<?= base_url() ?>pegawai/verifikasi_pensiun">
                  <div class="card stretch-card mb-3" style="background-color:#d63031; color:white">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                      <div>
                        <h4 class="font-weight-semibold mb-1 "> Pengajuan Pensiun </h4>
                        <small class="">Pengajuan Pensiun Yang Belum Ditinjau :</small>
                      </div>
                      <h3 class=" mt-2 font-weight-bold"><?= $countpensi ?></h3>
                    </div>
                  </div>
                  </a>
                </div>

                <div class="col-6">
                  <a href="<?= base_url() ?>pegawai/data_duk">
                  <div class="card stretch-card mb-3" style="background-color:#00d284; color:white">
                    <div class="card-body d-flex flex-wrap justify-content-between">
                      <div>
                        <h4 class="font-weight-semibold mb-1 "> Pegawai Non Aktif </h4>
                        <small class="">Pegawai yang Berstatus Non Aktif :</small>
                      </div>
                      <h3 class=" mt-2 font-weight-bold"><?= $countpegawai ?></h3>
                    </div>
                  </div>
                  </a>
                </div>
              </div>

            </div>

            <div class="col-6"> 
              <div class="col-12">
                <div class="card stretch-card mb-3" style="background-color:#ff5730; color:white">
                  <div class="card-body justify-content-between">
                    <div>
                      <h4 class="font-weight-semibold mb-1 "> Pengajuan  Pangkat </h4>
                      <small class="">Pengajuan Pangkat Yang Belum Ditinjau :</small>
                    </div>
                    <hr>
                    <div class="row" style="font-size:14px; font-weight:bold">
                      <div class="col-8">
                          <div class="form-group">
                            <a href="pegawai/verifikasi_naikpangkat_fungsional" style="color:white"> Ajuan Kenaikan Pangkat Fungsional </a>
                          </div>
                          <div class="form-group">
                            <a href="pegawai/verifikasi_naikpangkat_struktural" style="color:white"> Ajuan Kenaikan Pangkat Struktural </a>
                          </div>
                          <div class="form-group">
                            <a href="pegawai/verifikasi_naikpangkat_reguler" style="color:white"> Ajuan Kenaikan Pangkat Reguler </a>
                          </div>
                          <div class="form-group">
                            <a href="pegawai/verifikasi_naikpangkat_ijazah" style="color:white"> Ajuan Kenaikan Pangkat Penyesuaian Ijazah </a>
                          </div>
                      </div>
                      <div class="col-4" style="text-align:center;">
                          <div class="form-group">
                            <?= $countpgktfung ?>
                          </div>
                          <div class="form-group">
                            <?= $countpgktstruk ?>
                          </div>
                          <div class="form-group">
                            0
                          </div>
                          <div class="form-group">
                            <?= $countpgktijazah ?>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>


</div>