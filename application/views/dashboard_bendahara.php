<!-- Hitung Perencanaan Anggaran -->
<?php 
    // nilai awal harus 0 ;) 
    $nilai_total_perencanaan = 0;
    foreach($total_perencanaan_anggaran as $item=>$value)
      {
        // simpan nilai harga ke variabel $harga_total
        $nilai_total_perencanaan +=$value['nilai_uang_kegiatan'];
      }
 ?>

 <!-- Hitung Realisasi Anggaran -->
<?php 
    // nilai awal harus 0 ;) 
    $nilai_total_realisasi = 0;
    foreach($total_realisasi_anggaran as $item=>$value)
      {
        // simpan nilai harga ke variabel $harga_total
        $nilai_total_realisasi +=$value['nilai_uang_kegiatan'];
      }
 ?>


  <!-- Waktu Sekarang -->
             <?php
             $tgl=gmdate("Y-m-d H:i:s", time()+60*60*8);
             ?>
            

              
            <!-- Menghitung selisih waktu -->
            <?php
              $awal  = date_create($data_alarm['batas_waktu_periode']); //Batas W

              // print_r($awal);
              // die;
              $akhir = date_create(); // waktu sekarang
              $diff  = date_diff( $awal, $akhir );

              
              // Output: Selisih waktu: 28 tahun, 5 bulan, 9 hari, 13 jam, 7 menit, 7 detik

              // echo 'Total selisih hari : ' . $diff->days;
              // Output: Total selisih hari: 
            ?>
            

<div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
          </div>

      <?php if (($diff->days)== 0):?> 
        <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Perencanaan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalkan_realisasi; ?> Kegiatan</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Realisasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalkan_perencanaan; ?> Kegiatan </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas  fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Perencanaan Anggaran</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo rupiah($nilai_total_perencanaan); ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Realisasi Anggaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rupiah($nilai_total_realisasi); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      
      <?php elseif ($diff->days <= 15): ?>
        <div class="card">
          <div class="card-body">
            <div class="row no-gutters">
              <div class="col-2 col-sm-4 align-self-center">
                <img style="width: 90%" src="<?php echo base_url() ?>assets/alarm/alarm.gif">
              </div>
              <div class="col-10 col-md-8 align-self-center mt-1">
                <div class="shadow p-3 mb-5 bg-white rounded">
                  <span class="mr-2 font-weight-bold btn btn-danger text-white">
                    PERINGATAN !!!<br>
                    Sisa 
                    <?php  
                    echo 'Selisih waktu: ';
                // echo $diff->y . ' tahun, ';
                // echo $diff->m . ' bulan, ';
                    echo $diff->d . ' hari, ';
                    echo $diff->h . ' jam, ';
                    echo $diff->i . ' menit, ';
                    echo $diff->s . ' detik. ';
                    ?>
                    <br>
                    Anggaran belum terserap, segera tindak lanjuti realisasi kegiatan triwulan !
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <hr>

          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Perencanaan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalkan_realisasi; ?> Kegiatan</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Realisasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalkan_perencanaan; ?> Kegiatan </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas  fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Perencanaan Anggaran</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo rupiah($nilai_total_perencanaan); ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Realisasi Anggaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rupiah($nilai_total_realisasi); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

         
          

        </div>
      <?php elseif ($diff->days > 15):?> 
        <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Perencanaan</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalkan_realisasi; ?> Kegiatan</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Realisasi</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $totalkan_perencanaan; ?> Kegiatan </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas  fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Perencanaan Anggaran</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo rupiah($nilai_total_perencanaan); ?></div>
                        </div>
                        
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Realisasi Anggaran</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo rupiah($nilai_total_realisasi); ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

         
          

        </div>

      <?php endif ?> 

        
        