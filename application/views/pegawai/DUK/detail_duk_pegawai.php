<?php if(isset($status_kepegawaian_peg) == null){?>
    <div class="container-fluid">
        <h2 style="text-align:center; margin-top:25vh">Anda Belum <br> Berstatus Aktif Sebagai Pegawai <br> Silahkan Menghubungi Admin Untuk Mengaktifkan Akun Anda</h2>
    </div>
<?php } else if($status_kepegawaian_peg != null && $tmt_pensiun_peg == null){ ?>
    <div class="container-fluid">
        <div class="card">
            <div class="card-body pb-2" style="text-align:center;">
                <h4>Silahkan Mengisi Tanggal Lahir Untuk Melanjutkan</h4>
                <p class="mb-4" style="color:red">Pengisian Tanggal Lahir Harus Sesuai Karena Berhubungan dengan TMT Pensiun</p>
                
                <?= form_open('dashboard_p/create_tmt_pensiun')?>

                    <input type="hidden" name="tmtmasuk" value="<?= $tmt_masuk_peg?>">
                    <input type="hidden" name="dosen" value="<?= $id_kat_jab_struktural?>">
                    <input type="hidden" name="prof" value="<?= $id_kategori_jab_fungsional?>">
                    
                    <div class="form-group row justify-content-center">
                        <div class="col-4">
                            <input type="date" name="umur" class="form-control form-control-sm" style="text-align:center">
                        </div>
                        <div class="col-4">
                            <input type="submit" value="Lanjutkan" class="btn btn-primary w-100" style="padding:13px 0;">
                        </div>
                    </div>

                <?= form_close()?>
            </div>
        </div>
    </div>
<?php }else {?>
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="h3 mb-0 text-gray-800">Detail DUK Pegawai</h4>
            <div>
            <div class="dropdown mx-2" style="float:left">
                <button class="btn btn-sm btn-danger dropdown-toggle" type="button" id="dropdownMenuOutlineButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"> Update Data DUK Pegawai </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOutlineButton3">
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_pegawai">Update Data Pegawai</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_cpns">Update Data CPNS</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_pmk">Update Data Penyesuaian Masa Kerja</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_kgb">Update Data KGB</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_uker">Update Data Unit Kerja</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_impassing">Update Data Impassing</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_panghir">Update Data Pangkat Terakhir</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_peter">Update Data Pendidikan Terakhir</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_tgs_tambahan">Update Data Tugas Tambahan Dosen</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_diklat">Update Data Diklat Pelatihan</a>
                    <a class="dropdown-item" href="<?=base_url()?>dashboard_p/form_data_keluarga">Update Data Keluarga</a>
                </div>
            </div>
            <button style="float:left" class="btn btn-success btn-sm">Export Excel</button>
            </div>
        </div>

        <?php
            if(notif_pensiun($tmt_pensiun_peg) != null && $status_kepegawaian_peg != 'Pensiun'){
        ?>
            <div class="alert alert-danger">Harap Segera Mengajukan Pensiun. Sisa Waktu untuk mengajukan Pensiun tersisa : <?= notif_pensiun($tmt_pensiun_peg) ?> Hari &nbsp <a href="">Ajukan Pensiunan Sekarang</a> </div>
        <?php
            } else if($status_kepegawaian_peg == 'Pensiun' && $sk_kemendikbud['laporan_pengajuan_pensiun'] == null) {
        ?>
            <div class="alert alert-success">Terimakasih Data Pengajuan Pensiun Anda Telah Masuk, Silahkan Menunggu Surat Resmi Dari Kemendikbud</div>
        <?php
            } else if ($status_kepegawaian_peg == 'Pensiun' && $sk_kemendikbud['laporan_pengajuan_pensiun'] != null){;
        ?>
            <div class="alert alert-success">SK Anda Telah Diupload, Silahkan Mendownload SK Pensiun Anda dengan Menekan <a href="<?= base_url()?>upload/report_pensiun/<?= $sk_kemendikbud['laporan_pengajuan_pensiun'] ?>" download>Tombol ini</a></div>
        <?php
            };
        ?>

        <?php 
            if(notif_kenaikanpangkat($tmt_jab_fungsional) != false){
                echo '<div class="alert alert-info"><small>Anda Dapat Mengajukan Kenaikan Pangkat Untuk Jabatan Fungsional Silahkan Mengajukan Pengajuan<a href="'.base_url('dashboard_p/ajuan_naikpangkat_fungsional').'"> &nbsp Ajukan Kenaikan Pangkat Sekarang</a></small></div>';
            }
        ?>
    
        <?php 
            if(notif_kenaikanpangkat($tmt_jab_struktural == null ? $tmt_jab_fungsional : $tmt_jab_struktural) != false){
                echo '<div class="alert alert-info"><small>Anda Dapat Mengajukan Kenaikan Pangkat Untuk Jabatan Struktural Silahkan Mengajukan Pengajuan<a href="'.base_url('dashboard_p/ajuan_naikpangkat_struktural').'"> &nbsp Ajukan Kenaikan Pangkat Sekarang</a></small></div>';
            }
        ?>

        <?php 
            if(notif_kenaikanreguler($tmt_pangkat_terakhir) != false){
                echo '<div class="alert alert-info"><small>Anda Dapat Mengajukan Kenaikan Pangkat Golongan Silahkan Mengajukan Kenaikan Pangkat Golongan/Reguler<a href="'.base_url('dashboard_p/ajuan_naikpangkat_reguler').'"> &nbsp Ajukan Kenaikan Pangkat Sekarang</a></small></div>';
            }
        ?>

        <!-- Data Pegawai -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Pegawai
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">NIP :</small></label>
                        <p style="margin-bottom:10px;"><?= $nip_peg?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">NIDN :</small></label>
                        <p style="margin-bottom:10px;"><?= $nidn_peg?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Status Pegawai :</small></label>
                        <p style="margin-bottom:10px;"><?= $status_kepegawaian_peg?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-7 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Nama Lengkap</small></label>
                        <p style="margin-bottom:10px;"><?= $nama_lengkap_peg?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Jenis Kelamin</small></label>
                        <p style="margin-bottom:10px;"><?= $jk_peg?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-7 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tempat & Tanggal Lahir</small></label>
                        <p style="margin-bottom:10px;"><?= $tempat_lahir_peg?>, <?=$kabupaten_lahir_peg?>, <?= $tgl_lahir_peg?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Terhitung Pensiun (TMT)</small></label>
                        <p style="margin-bottom:10px;"><?= $tmt_pensiun_peg?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Sertifikat Dosen</small></label>
                        <p style="margin-bottom:10px;"><?= $sertifikat_dosen_peg?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Agama</small></label>
                        <p style="margin-bottom:10px;"><?= $agama_peg?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">NIDN Dosen</small></label>
                        <p style="margin-bottom:10px;"><?= $nidn_peg?></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Data CPNS -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data CPNS Pegawai
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">No SK CPNS :</small></label>
                        <p style="margin-bottom:10px;"><?= $nomor_sk_cpns?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tanggal SK CPNS :</small></label>
                        <p style="margin-bottom:10px;"><?= $tgl_sk_cpns?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Terhitung CPNS (TMT) :</small></label>
                        <p style="margin-bottom:10px;"><?= $tmt_cpns?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-5 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Diberikan Oleh :</small></label>
                        <p style="margin-bottom:10px;"><?= $oleh_pejabat_cpns?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Pangkat CPNS :</small></label>
                        <p style="margin-bottom:10px;"><?= $pangkat_cpns?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data PMK -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Penyesuaian Masa Kerja Pegawai
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Nomor Penyesuaian Masa Kerja :</small></label>
                        <p style="margin-bottom:10px;"><?= $no_pmk?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tanggal Penyesuaian Masa Kerja :</small></label>
                        <p style="margin-bottom:10px;"><?= $tgl_pmk?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Terhitung Penyesuaian Masa Kerja (TMT) :</small></label>
                        <p style="margin-bottom:10px;"><?= $tmt_pmk?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-5 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Diberikan Oleh :</small></label>
                        <p style="margin-bottom:10px;"><?= $oleh_pejabat_pmk?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Unit Kerja -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Unit Kerja
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom"> 
                        <label for=""><small style="font-weight:bold">Program Studi :</small></label>
                        <p style="margin-bottom:10px;"><?= $program_studi_uker?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Home Base :</small></label>
                        <p style="margin-bottom:10px;"><?= $homebase_uker?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Full Fakultas :</small></label>
                        <p style="margin-bottom:10px;"><?= $full_fakultas_uker?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-5 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Singkat Fakultas :</small></label>
                        <p style="margin-bottom:10px;"><?= $singkat_fakultas_uker?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data KGB -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data KGB Pegawai
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">No SK KBG :</small></label>
                        <p style="margin-bottom:10px;"><?= $no_sk_kgb?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Terakhir KGB :</small></label>
                        <p style="margin-bottom:10px;"><?= $terakhir_kgb?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tahun KGB :</small></label>
                        <p style="margin-bottom:10px;"><?= $thn_kgb?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-5 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Diberikan Oleh :</small></label>
                        <p style="margin-bottom:10px;"><?= $oleh_pejabat_kgb?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Impassing -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Impassing Pegawai
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">No SK Impassing :</small></label>
                        <p style="margin-bottom:10px;"><?= $no_sk_impassing?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tanggal SK Impassing :</small></label>
                        <p style="margin-bottom:10px;"><?= $tgl_sk_impassing?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Terhitung Impassing (TMT)</small></label>
                        <p style="margin-bottom:10px;"><?= $tmt_impassing?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-5 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Diberikan Oleh :</small></label>
                        <p style="margin-bottom:10px;"><?= $oleh_pejabat_impassing?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Pangkat Akhir -->
        <!-- <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Pangkat Terakhir
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">No SK Pangkat Terakhir :</small></label>
                        <p style="margin-bottom:10px;"><?= $no_sk_pangkat_terakhir?></p>
                    </div>
                    <div class="col-2 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tanggal SK :</small></label>
                        <p style="margin-bottom:10px;"><?= $tgl_sk_pangkat_terakhir?></p>
                    </div>
                    <div class="col-5 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Terhitung Pangkat Terakhir (TMT)</small></label>
                        <p style="margin-bottom:10px;"><?= $tmt_pangkat_terakhir?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-6 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Diberikan Oleh :</small></label>
                        <p style="margin-bottom:10px;"><?= $oleh_pejabat_pangkat_terakhir?></p>
                    </div>
                    <div class="col-2 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tahun Pangkat Terakhir </small></label>
                        <p style="margin-bottom:10px;"><?= $thn_pangkat_terakhir?></p>
                    </div>
                    <div class="col-2 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Bulan Pangkat Terakhir </small></label>
                        <p style="margin-bottom:10px;"><?= $bln_pangkat_terakhir?></p>
                    </div>
                </div>
            </div>
        </div> -->
        <div class="card shadow mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Pangkat Akhir
            </div>
            <div class="card-body">
                <div class="table-responsive">
                
                <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th width="">No</th>
                        <th>Pangkat Terakhir</th>
                        <th>TMT Pangkat Terakhir</th>
                        <th>No SK</th>
                        <th>Tgl SK</th>
                    </tr>
                    </thead>
                </table>
            
                </div>

                <script type="text/javascript">
                        $(document).ready(function() {
                            $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                            {
                                return {
                                    "iStart": oSettings._iDisplayStart,
                                    "iEnd": oSettings.fnDisplayEnd(),
                                    "iLength": oSettings._iDisplayLength,
                                    "iTotal": oSettings.fnRecordsTotal(),
                                    "iFilteredTotal": oSettings.fnRecordsDisplay(),
                                    "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                                    "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                                };
                            };

                            var t = $("#example").dataTable({
                                initComplete: function() {
                                    var api = this.api();
                                    $('#mytable_filter input')
                                            .off('.DT')
                                            .on('keyup.DT', function(e) {
                                                if (e.keyCode == 13) {
                                                    api.search(this.value).draw();
                                        }
                                    });
                                },
                                oLanguage: {
                                    sProcessing: "loading..."
                                },
                                processing: true,
                                serverSide: true,
                                ajax: {"url": "<?= base_url()?>pegawai/json_panghir_bypegawai", "type": "POST", data : { id : <?= $id_pegawai ?>}},
                                columns: [
                                    {"data": "id_pangkat_terakhir"},
                                    {"data": "pangkat_terakhir"},
                                    {"data": "tmt_pangkat_terakhir"},
                                    {"data": "no_sk_pangkat_terakhir"},
                                    {"data": "tgl_sk_pangkat_terakhir"},
                                ],
                                order: [[0, 'asc']],
                                rowCallback: function(row, data, iDisplayIndex) {
                                    var info = this.fnPagingInfo();
                                    var page = info.iPage;
                                    var length = info.iLength;
                                    var index = page * length + (iDisplayIndex + 1);
                                    $('td:eq(0)', row).html(index);
                                }
                            });
                        });
                </script>

                <script>
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>

            </div>
        </div>
       

        <!-- Pendidikan Terakhir -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Pendidikan Terakhir
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Bidang Keilmuan :</small></label>
                        <p style="margin-bottom:10px;"><?= $bidang_ilmu_peter?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Jenjang Pendidikan :</small></label>
                        <p style="margin-bottom:10px;"><?= $strata_peter?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tahun Lulus Pendidikan :</small></label>
                        <p style="margin-bottom:10px;"><?= $thn_lulus_peter?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-5 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Universitas :</small></label>
                        <p style="margin-bottom:10px;"><?= $univ_peter?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jabatan Fungsional -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Jabatan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table id="job_fungsi" style="font-size:15px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                <thead>
                    <tr>
                        <th width="5px">No</th>
                        <th>Nama Jabatan (Fungsional)</th>
                        <th>TMT Jabatan (Fungsional)</th>
                        <th>Nama Jabatan (Struktural)</th>
                        <th>TMT Jabatan (Struktural)</th>
                    </tr>
                </thead>
                </table>
                </div>

                <script type="text/javascript">
                $(document).ready(function() {
                    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                    {
                        return {
                            "iStart": oSettings._iDisplayStart,
                            "iEnd": oSettings.fnDisplayEnd(),
                            "iLength": oSettings._iDisplayLength,
                            "iTotal": oSettings.fnRecordsTotal(),
                            "iFilteredTotal": oSettings.fnRecordsDisplay(),
                            "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                            "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                        };
                    };
                    
                    // Netral
                    var t = $("#job_fungsi").dataTable({
                        initComplete: function() {
                            var api = this.api();
                            $('#mytable_filter input')
                                    .off('.DT')
                                    .on('keyup.DT', function(e) {
                                        if (e.keyCode == 13) {
                                            api.search(this.value).draw();
                                }
                            });
                        },
                        oLanguage: {
                            sProcessing: "loading..."
                        },
                        processing: true,
                        serverSide: true,
                        ajax: {"url": '<?= base_url()?>dashboard_p/json_jabatan', "type": "POST"},
                        columns: [
                        {'data' : 'id_jab'},
                        {'data' : 'nama_kategori_fung'},
                        {
                            'data' : 'tmt_jab_fungsional',
                            "render" : function(data, type, row){
                               return dateIndo(data);
                            },
                        },
                        {'data' : 'nama_jabatan_struktur'},
                        {
                            'data' : 'tmt_jab_struktural',
                            'render' : function(data, type, row){
                                return dateIndo(data);
                            }
                        },
                        ],
                        order: [[0, 'asc']],
                        rowCallback: function(row, data, iDisplayIndex) {
                            var info = this.fnPagingInfo();
                            var page = info.iPage;
                            var length = info.iLength;
                            var index = page * length + (iDisplayIndex + 1);
                            $('td:eq(0)', row).html(index);
                        }
                        }); 

                });
            </script>
            <script>
                $(document).ready(function() {
                $('#jobfungsi').DataTable();
                } );
            </script>

            </div>
        </div>

        <!-- Jabatan Tgs Tambahan -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Tugas Tambahan
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-12 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tugas Tambahan :</small></label>
                        <p style="margin-bottom:10px;"><?= $tugas_tambahan?></p>
                    </div>
                </div>
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Klasifikasi Tugas :</small></label>
                        <p style="margin-bottom:10px;"><?= $klasifikasi_jbt?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">No SK :</small></label>
                        <p style="margin-bottom:10px;"><?= $nomor_sk?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Terhitung Tugas Tambahan :</small></label>
                        <p style="margin-bottom:10px;"><?= $tmt_jab?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jabatan Diklat Pelatihan -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Diklat Pelatihan
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-5 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Latihan Jabatan Diklat :</small></label>
                        <p style="margin-bottom:10px;"><?= $latihan_jabatan_diklat?></p>
                    </div>
                    <div class="col-5 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Waktu Diklat :</small></label>
                        <p style="margin-bottom:10px;"><?= $time_diklat?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Keluarga -->
        <div class="card mb-4">
            <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
                Data Keluarga
            </div>
            <div class="card-body">
                <div class="row mb-3 px-3 justify-content-between">
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Nama Istri / Suami :</small></label>
                        <p style="margin-bottom:10px;"><?= $nama_istri_suami_kel?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Tanggal Menikah :</small></label>
                        <p style="margin-bottom:10px;"><?= $tgl_nikah_kel?></p>
                    </div>
                    <div class="col-3 p-0 border-bottom">
                        <label for=""><small style="font-weight:bold">Jumlah Anak :</small></label>
                        <p style="margin-bottom:10px;"><?= $jumlah_anak?></p>
                    </div>
                </div>
            </div>
        </div>


    </div>
<?php ;}?>