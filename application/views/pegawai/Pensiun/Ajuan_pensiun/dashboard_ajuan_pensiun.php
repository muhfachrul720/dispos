<!-- <?php // echo $this->session->userdata('id_pegawai'); die;?> -->
<div class="container-fluid">
    <?php if($this->session->flashdata('msg') == 1){?>
        <div class="alert alert-success" role="alert">
            Pengajuan Anda Berhasil Dikirim Silahkan Menunggu Verifikasi Dari Admin
        </div>
    <?php } else if($this->session->flashdata('msg') == 2) {?>
        <div class="alert alert-danger" role="alert">
            Pengajuan Anda Gagal Terkirim Silahkan Melakukan Pengajuan Ulang dan pastikan semua data telah terisi dengan benar
        </div>
    <?php };?>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Form Ajukan Pensiun</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Monitoring</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane show active fade" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card border-top-0 mb-3 pt-3 px-3 pb-1">
                <div class="card-body">
                    <h3 class="">Form Pengajuan Pensiun </h3>
                    <p>Silahkan Mengupload syarat syarat yang diperlukan dalam mengurus Pensiunan Secara Lengkap dan benar</p>
                    <?php if(isset($ajuan)) {?> 
                    <small>Catatan Koreksi</small>
                    <div class="alert alert-info alert-sm mt-2" role="alert">
                        <?= $ajuan['keterangan_pengajuan_pensiun']?>
                    </div>
                <?php }?> 
                </div>
            </div>  
            
            <?= form_open_multipart($action)?>

            <?php if(isset($result)) {?>
                    <?= form_hidden('id', $ajuan['id_berkas_pengajuan_pensiun'])?>
                    <?= form_hidden('time', $ajuan['waktu_pengajuan_pensiun'])?>
                    <?= form_hidden('id_aju', $ajuan['id_pengajuan_pensiun'])?>
            <?php }?>
            
            <?php 
                $checker = array(
                    array('Surat Usul Pimpinan Unit Kerja', 'supuk', isset($result['surat_pimpinan_uker']) ? $result['surat_pimpinan_uker'] : '' ),
                    array('Surat Permohonan PNS Yang Bersangkutan', 'sppyb', isset($result['surat_permohonan_pns']) ? $result['surat_permohonan_pns'] : ''),
                    array('Daftar Perorangan Calon Penerima Pensiun', 'dpcpp', isset($result['dpcp']) ? $result['dpcp'] : ''),
                    array('SK CPNS - SK Pangkat Terakhir (Legalisir)', 'skcpskpt', isset($result['skcpns_skpangkat_akhir']) ? $result['skcpns_skpangkat_akhir'] : ''),
                    array('SK Jabatan (Fungsional/Struktural) (Legalisir)', 'skjbt', isset($result['sk_jabatan']) ? $result['sk_jabatan'] : ''),
                    array('Kartu Pegawai (Karpeg) / KPE (Legalisir)', 'kpe', isset($result['karpeg']) ? $result['karpeg'] : ''),
                    array('Akta / Surat Nikah/ Cerai (Legalisir)', 'askc', isset($result['surat_nikah_cerai']) ? $result['surat_nikah_cerai'] : ''),
                    array('Akta / Surat Kenal Lahir Anak < 25 Tahun (Legalisir)', 'askla25', isset($result['surat_kenal_anak']) ? $result['surat_kenal_anak'] : ''),
                    array('Kartu Keluarga / Daftar Susunan Keluarga Yang Disahkan', 'kkdskys', isset($result['kartu_keluarga']) ? $result['kartu_keluarga'] : ''),
                    array('Pas Foto Berwarna 3x4', 'pfb3x4', isset($result['pas_foto']) ? $result['pas_foto'] : ''),
                    array('Formulir Permintaan Pembayaran Pensiun', 'fppp', isset($result['formulir_permintaan_pembayaran_pensiun']) ? $result['formulir_permintaan_pembayaran_pensiun'] : ''),
                    array('Foto Kopi Buku Rekening', 'fkbr', isset($result['foto_kopi_buku_rekening']) ? $result['foto_kopi_buku_rekening'] : ''),
                    array('Penilaian Prestasi 1 Tahun Terakhir (Legalisir)', 'pp1tr', isset($result['penilaian_prestasi']) ? $result['penilaian_prestasi'] : ''),
                    array('Surat Pernyataan Tidak Pernah dijatuhi Hukuman Disiplin Tingkat Sedang / Berat 1 Tahun Terakhir', 'sptpdhdts', isset($result['surat_pernyataan_tidak_dijatuhi_hukum']) ? $result['surat_pernyataan_tidak_dijatuhi_hukum'] : ''),
                    array('Surat Pernyataan Tidak Sedang Menjalani Proses Pidana atau pernah Dipidana Penjara Berdasarkan Putusan Pengadilan Yang Telah Berkekuatan Hukum ', 'sptsmppapdpbpp', isset($result['surat_pernyataan_tidak_berproses_pidana']) ? $result['surat_pernyataan_tidak_berproses_pidana'] : ''),
                    array('Ahli Waris Yang Sah (Bagi Pensiun Janda / Duda)', 'awys', isset($result['surat_ahli_waris']) ? $result['surat_ahli_waris'] : ''),
                    array('Akta / Surat Kematian (Bagi Pensiun Janda / Duda)', 'ask', isset($result['surat_kematian']) ? $result['surat_kematian'] : ''),
                    array('Surat Keterangan Janda / Duda / Anak / Orang Tua (Bagi Pensiun Janda / Duda)', 'skjdaot', isset($result['surat_keterangan_janda_duda_anak_orangtua']) ? $result['surat_keterangan_janda_duda_anak_orangtua'] : ''),
                );
            ?>
           
            <div class="row">
                <div class="col-7">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="title" style="text-align:center; ">Berkas Pengajuan</h5>
                                    <hr>
                                    <?php for($i = 0; $i < count($checker); $i++){?>
                                    <div class="row mb-3">
                                        <div class="col-9">
                                            <small><?= $checker[$i][0]?></small>
                                        </div>
                                        <div class="col-3">
                                            <?php if($checker[$i][2] != '') { ?>
                                                <label for="file<?= $i ?>" class="btn btn-sm btn-primary m-auto" style="font-size:12px">Edit File</label>
                                                <i id="check<?= $i ?>" class="mdi mdi-checkbox-marked-outline btn btn-success btn-sm w-25"></i>
                                            <?php } else { ?>
                                                <label for="file<?= $i ?>" class="btn btn-sm btn-warning m-auto" style="font-size:12px">Upload File</label>
                                                <i id="check<?= $i ?>" class="mdi mdi-close btn btn-danger btn-sm w-25"></i>
                                            <?php }; ?>

                                            <input type="file" name="<?= $checker[$i][1]?>" class="uploadFile" id="file<?= $i ?>" style="display:none;" accept="application/pdf">
                                        </div>
                                    </div>
                                    <script>
                                        $('#file<?= $i ?>').on('change', function(e){
                                            var check = $('#check<?= $i ?>'); 
                                            check.removeClass('btn-danger').addClass('btn-success');
                                            check.removeClass('mdi-close').addClass('mdi-checkbox-marked-outline');
                                        });
                                    </script>
                                    <?php };?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="card">
                        <div class="card-body px-2 py-3" style="text-align:center">
                            <h5 class="pt-0 pb-3">Tekan Tombol Dibawah Untuk Mengajukan Pengajuan Pensiun</h5>
                                <?php if(isset($ajuan)) {?> 
                                    <input type="submit" class="btn btn-success w-75 mb-2" value="Ajukan Koreksi">
                                <?php } else {?> 
                                    <input type="submit" id="submit" class="btn btn-secondary w-75 mb-2" value="Silahkan Mengisi Form" disabled>
                                <?php }; ?> 
                            <a href="<?= base_url()?>dashboard_p" class="btn btn-secondary" style="width:75%">Kembali</a>
                        </div>
                        <script>
                                $('.uploadFile').on('change', function(){
                                var num = 0;
                                $('.uploadFile').each(function(){
                                    if($(this).get(0).files.length != 0){
                                        num = num + 1;
                                    }
                                });
                                
                                if(num >= 18){
                                    $('#submit').prop('disabled', false);
                                    $('#submit').addClass('btn-success');
                                    $('#submit').removeClass('btn-secondary');
                                    $('#submit').val('Ajukan');
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>

            <?= form_close()?>
        </div>
      
        <div class="tab-pane fade border border-top-0 p-5" style="background-color:white; font-size:14px" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="header mb-3">
                <h3 class="mb-2">Monitoring Pengajuan </h3>
                <p>Melihat Pengajuan Pengajuan yang telah diajukan bersama keterangan apabila di tolak</p>
            </div>
            <hr>
            <div class="body">
                <div class="table-responsive">
                <table id="example" style="font-size:0px; width:100%" class="table table-striped table-bordered table-sm text-center">
                    <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th width="200px">Diverifikasi Oleh</th>
                        <th width="200px">Aksi</th>
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
                            ajax: {"url": '<?= base_url()?>dashboard_p/json_pensiun_individual', "type": "POST", data : {'id' : <?= $this->session->userdata('id_pegawai')?>}},
                            columns: [
                                {"data" : 'waktu_pengajuan_pensiun', orderable:false},
                                {"data" : 'waktu_pengajuan_pensiun'},
                                {
                                    "data" : 'status_pengajuan',
                                    "render" : function(data, type, row){
                                        if(data == 1){
                                            return "<label class='badge badge-success'>Disetujui</label>";
                                        }else if(data == 3){
                                            return "<label class='badge badge-warning'>Dikoreksi</label>";
                                        }else if(data == 4){
                                            return "<label class='badge badge-info'>Telah Dikoreksi</label>";
                                        }
                                        else if(data == null){
                                            return "<label class='badge badge-danger'>Telah Diajukan</label>";
                                        }
                                        else {
                                            return "<label class='badge badge-danger'>Ditolak</label>";
                                        }
                                    }
                                },
                                {"data" : 'keterangan_pengajuan_pensiun'},
                                {"data" : 'username'},
                                {
                                    "data" : 'id_pengajuan_pensiun',
                                    "render" : function(data, type, row){
                                        if(row.status_pengajuan == 3){
                                            return "<a href='<?= base_url('dashboard_p/ajukan_pensiun')?>/"+data+"' class='btn btn-warning btn-sm'>Edit</a>";
                                        }
                                        else if(row.status_pengajuan == 1) {
                                            return "<a href='<?= base_url()?>upload/report_pensiun/"+row.laporan_pengajuan_pensiun+"' class='btn btn-success btn-sm' download>Download SK</a>";
                                        }
                                        else {
                                            return '';
                                        };
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
                        $('#example').DataTable();
                    } );
                </script>

            </div>
        </div>
    </div>
</div>
