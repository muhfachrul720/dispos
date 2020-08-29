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
                    <h3 class="">Form Pengajuan Pangkat Sesuai Dengan Ijazah </h3>
                    <p>Silahkan Mengupload syarat syarat yang diperlukan dalam mengurus Pensiunan Secara Lengkap dan benar</p>
                    <?php if(isset($aju)) {?> 
                        <div class="alert alert-info alert-sm" role="alert">
                               <small> Keterangan Koreksi : <?= $aju['keterangan_pengajuan_ijazah']?> </small>
                            </div>
                    <?php }?> 
                </div>
            </div>  
            
            <?= form_open_multipart($action)?>

            <?php $checker = array(
                array('<b>Foto Kopi Sah</b> SK Pangkat Terakhir', 'skpangkat'),
                array('<b>Foto Kopi Sah</b> Ijazah dan Transkrip Nilai', 'ijazah'),
                array('<b>Foto Kopi Sah</b> Surat Tanda Lulus Kenaikan Pangkat Penyesuaian Ijazah', 'srtlulus'),
                array('<b>Foto Kopi Sah</b> Surat Ijin Belajar / Tugas Belajar', 'srtbelajar'),
                array('<b>Uraian Tugas Asli</b> Ditandatangani serendah rendahnya Eselon II', 'srttgs'),
                array('<b>SKP, Capaian SKP, dan Penilaian Prestasi Kerja</b> (2 Tahun terakhir <b>sekurang-kurangnya bernilai baik</b>', 'skp'),
            );?>

            <?php if(isset($aju)){ 
                echo form_hidden('time', $aju['waktu_pengajuan_ijazah']);
                echo form_hidden('id', $aju['id_ajuan_ijazah']);
                echo form_hidden('idbrks', $aju['id_berkas_ajuan']);
            }?>
           
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="title" style="text-align:center; ">Formulir Biodata</h5>
                            <hr>
                            <div class="form-group row">
                                <div class="col-6">
                                    <label for=""><small>Nama Pegawai</small></label>
                                    <input type="text" class="form-control form-control-sm" value="<?= $nama_tanpa_gelar_peg?>" disabled> 
                                </div>
                                <div class="col-6">
                                    <label for=""><small>Nip Pegawai</small></label>
                                    <input type="text" class="form-control form-control-sm" value="<?= $nip_peg?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                 <div class="col-3">
                                    <label for=""><small>Masa Kerja</small></label>
                                    <input type="text" class="form-control form-control-sm" value="<?= $thn_masa_kerja_pensiun_peg ?>" disabled>
                                </div>
                                <div class="col-9">
                                    <label for=""><small>Unit Kerja</small></label>
                                    <input type="text" class="form-control form-control-sm" value="<?= $program_studi_uker?>" disabled>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table id="history" style="font-size:12px;" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Jabatan (Fungsional)</th>
                                                    <th>Nama Jabatan (Struktural)</th>
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
                                            var t = $("#history").dataTable({
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
                                                {'data' : 'nama_jabatan_struktur'},
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
                                        $('#history').DataTable();
                                        } );
                                    </script>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="title" style="text-align:center; ">Berkas Pengajuan</h5>
                                    <hr>
                                    <?php for($i = 0; $i < count($checker); $i++){?>
                                    <div class="row mb-3">
                                        <div class="col-7">
                                            <small><?= $checker[$i][0]?></small>
                                        </div>
                                        <div class="col-5">
                                                <?php if($berkas[$i] != null){?>
                                                    <label for="file<?= $i ?>" class="btn btn-sm btn-primary m-auto" style="font-size:12px">Ganti File</label>
                                                    <i id="check<?= $i ?>" class="mdi mdi-checkbox-marked-outline btn btn-success btn-sm w-25"></i>
                                                <?php } else {?>
                                                    <label for="file<?= $i ?>" class="btn btn-sm btn-primary m-auto" style="font-size:12px">Upload File</label>
                                                    <i id="check<?= $i ?>" class="mdi mdi-close btn btn-danger btn-sm w-25"></i>
                                                <?php };?>

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
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-2">
                                    <?php if(isset($aju)) {?>
                                        <input type="submit" class="btn btn-success w-50" value="Koreksi">
                                    <?php } else {?>
                                        <input type="submit" id="submit" class="btn btn-secondary w-50" value="Silahkan Mengisi Form" disabled>
                                    <?php };?>
                                    <button type="button" class="btn btn-secondary" style="width:49%">Kembali</button>
                                </div>
                                <script>
                                     $('.uploadFile').on('change', function(){
                                        var num = 0;
                                        $('.uploadFile').each(function(){
                                            if($(this).get(0).files.length != 0){
                                                num = num + 1;
                                            }
                                        });
                                        
                                        if(num >= 6){
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
                            ajax: {"url": '<?= base_url()?>dashboard_p/json_naikpangkat_ijazah', "type": "POST", data : {'id' : <?= $this->session->userdata('id_pegawai')?>}},
                            columns: [
                                {"data" : 'waktu_pengajuan_ijazah', orderable:false},
                                {"data" : 'waktu_pengajuan_ijazah'},
                                {
                                    "data" : 'status_pengajuan_ijazah',
                                    "render" : function(data, type, row){
                                        if(data == 1){
                                            return "<label class='badge badge-success'>Disetujui</label>";
                                        }else if(data == 2){
                                            return "<label class='badge badge-danger'>Ditolak</label>";
                                        }else if(data == 3){
                                            return "<label class='badge badge-info'>Perlu Dikoreksi</label>";
                                        }
                                        else if(data == null){
                                            return "<label class='badge badge-danger'>Telah Diajukan</label>";
                                        }
                                    }
                                },
                                {"data" : 'keterangan_pengajuan_ijazah'},
                                {"data" : 'username'},
                                {
                                    "data" : 'id_ajuan_ijazah',
                                    "render" : function(data, type, row){
                                        if(row.status_pengajuan_ijazah == 3){
                                            return "<a href='<?= base_url('dashboard_p/ajuan_naikpangkat_ijazah/')?>/"+data+"' class='btn btn-warning btn-sm'>Edit</a>";
                                        }
                                        else if(row.report_pengajuan_ijazah != null) {
                                            return "<a href='<?= base_url()?>upload/report_naikpangkat/ijazah/"+row.report_pengajuan_ijazah+"' class='btn btn-success btn-sm' download>Download SK</a>";
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
