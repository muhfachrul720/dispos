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
        <div class="tab-pane show active fade mb-4" style="font-size:14px" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="card border border-top-0">
                <div class="card-body px-5 pt-5 pb-4">
                    <h2>Form Ajukan Pensiun</h2>
                    <p>Silahkan Mengupload Berkas Berkas Persyaratan Untuk Pensiun Secara Lengkap dan benar</p>
                </div>
            </div>

            <?= form_open_multipart('dashboard_p/create_ajuan_pensiun')?>

            <div class="row">
                <div class="col-7">
                    <div class="card border mt-3">
                        <div class="card-body px-5">
                            <div style="text-align:center; border:4px dashed rgba(0,0,0,0.3); padding:283px 40px">
                                <p>Tekan Dibawah Untuk Mengupload Berkas</p>
                                <label for="fileUpload" class="btn btn-primary btn-sm m-0" style="font-size:12px">Upload File</label>
                                <input id="fileUpload" type="file" multiple="" name="images[]" style="display:none" accept="image/jpeg,image/gif,image/png,application/pdf">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card border mt-3">
                        <div class="card-body">
                            <p>Berkas Yang Di Upload :</p>
                            <ul style="text-decoration:none; list-style-position:outside">
                                <li class="px-2">Surat Usul Pimpinan Unit Kerja </li>
                                <li class="px-2">Surat Permohonan PNS ybs </li>
                                <li class="px-2">DPCP (Dfatar Perorangan Calon Penerima Pensiun) </li>
                                <li class="px-2">SK CPNS - SK Pangkat Terakhir (Legalisir) </li>
                                <li class="px-2">Sk Jabatan (Fungsional/Struktural)(Legalisir) </li>
                                <li class="px-2">Kartu Pegawai / KPE (Legalisir) </li>
                                <li class="px-2">Akta/Surat Nikah/Cerai (Legalisir) </li>
                                <li class="px-2">Akta/Surat Kenal Lahir anak < 25 Tahun (Legalisir) </li>
                                <li class="px-2">Kartu Keluarga/Daftar Susunan Keluarga yang Disahkan</li>
                                <li class="px-2">Pas Foto 3x4</li>
                                <li class="px-2">Formulir Permintaan Pembayaran Pensiun (SP4)</li>
                                <li class="px-2">Foto Kopi Buku Rekening</li>
                                <li class="px-2">Penilaian Prestasi 1 Tahun Terakhir (Legalisir)</li>
                                <li class="px-2">Surat Pernyataan Tidak Pernah Dijatuhi Hukuman Disiplin/ Tingkat sedang/ Berat 1 Tahun Terakhir</li>
                                <li class="px-2">Surat Pernyataan Tidak Sedang Menjalani Proses Pidana Atau Pernah Dipidana Penjara Berdasarkan Putusan Pengadilan Yang Telah Berkekuatan Hukum</li>
                                <hr>
                                <li class="px-2">Surat Ahli Waris Yang Sah (Bagi Janda dan Duda)</li>
                                <li class="px-2">Akta / Surat Kematian(Bagi Janda dan Duda)</li>
                                <li class="px-2">Surat Keterangan Janda / Duda / Anak / Orang Tua(Bagi Janda dan Duda)</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col" style="font-weight:bold"><button type="submit" class="btn btn-success w-100">Ajukan</button></div>
                        <div class="col pt-2">Dengan ini Saya setuju mengajukan pensiun</div>
                    </div>
                </div>
            </div>

                <script>
                $('#fileUpload').change(function(){
                    if(this.files.length>18)
                        alert('File Terlalu Banyak')
                });
                // Prevent submission if limit is exceeded.
                $('form').submit(function(){
                    if(this.files.length>18)
                        return false;
                });
                </script>

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
                <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th width="40px">No</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th width="200px">Diverifikasi Oleh</th>
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
                                            return "<label class='badge badge-warning'>Ditangguhkan</label>";
                                        }else {
                                            return "<label class='badge badge-danger'>Ditolak</label>";
                                        }
                                    }
                                },
                                {"data" : 'keterangan_pengajuan_pensiun'},
                                {"data" : 'username'},
                                // {
                                //     "data" : 'id_pengajuan_pensiun',
                                //     "render" : function(data, type, row){
                                //         return '<a href="<?=base_url()?>pegawai/tinjau_pensiun/'+data+'" class="btn btn-sm btn-primary">Tinjau</a>' ;
                                //     }
                                // },
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
