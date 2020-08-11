<div class="container-fluid" style="margin-bottom:30vh">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
          </div>

          <div class="row">

            <div class="col-3">
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
              </div>
            </a>

            <div class="col-3">
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

            <div class="col-3">
              <a href="<?= base_url() ?>">
              <div class="card stretch-card mb-3" style="background-color:#ff5730; color:white">
                <div class="card-body d-flex flex-wrap justify-content-between">
                  <div>
                    <h4 class="font-weight-semibold mb-1 "> Pengajuan  Pangkat </h4>
                    <small class="">Pengajuan Pangkat Yang Belum Ditinjau :</small>
                  </div>
                  <h3 class=" mt-2 font-weight-bold"><?= $countnaikpangkat ?></h3>
                </div>
              </div>
              </a>
            </div>

            <div class="col-3">
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