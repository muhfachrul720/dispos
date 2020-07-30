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
        <div class="tab-pane fade show active border border-top-0 p-5" style="background-color:white; font-size:14px" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="header mb-5">
                <h3 class="mb-2">Ajukan Pensiun </h3>
                <p>Silahkan Mengisi Form Dibawah Untuk Mengajukan Pensiun, Pastikan untuk mengisi secara Keseluruhan dengan data yang benar</p>
            </div>
            <?= form_open('dashboard_p/create_ajuan_pensiun')?>
            <div class="body">
                <?= form_hidden('idpeg', $this->session->userdata('id_pegawai'))?>

                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Surat Pengantar PPK :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Surat Permohonan Pensiun :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Fotokopi Surat Keterangan SK CPNS :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Fotokopi Sah Surat Keputusan Pangkat Terakhir :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Fotokopi Sah Surat Nikah :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Fotokopi Sah Surat Keputusan Akte Kelahiran :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Surat Keterangan Kematian :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Surat Keterangan Janda/Duda :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Fotokopi Sah Daftar Keluarga :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        Pas Foto :
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <input type="file" class="">
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        Error
                    </div>
                </div>
            </div>
            <hr class="mt-5">
            <div class="footer">
                <input type="submit" class="btn btn-success" value="Ajukan">
                <span class="ml-4">Dengan ini saya mengajukan Pensiun</span>
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
                                {"data" : 'status_pengajuan'},
                                {"data" : 'keterangan_pengajuan_pensiun'},
                                {"data" : 'full_name'},
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
