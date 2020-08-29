<div class="container-fluid">
    <div class="card shadow mb-4 p-5" style="font-size:14px">
        <div class="header">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h3 class="mb-3">List Ajuan Kenaikan Pangkat Jabatan ijazah (Terverifikasi)</h3>
                    <p class="mb-0">List Pengajuan Kenaikan Jabatan Yang telah disetujui </p>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a href="<?= base_url()?>cetakexcel/print_excel_ijazah_nonsk" class="btn btn-success">Export Pegawai Non SK</a>
                    <a href="<?= base_url()?>cetakexcel/print_excel_ijazah_all" class="btn btn-success">Export Semua Pegawai</a>
                </div>
            </div>
        </div>
        <hr>
        <div class="body">
            <div class="table-responsive">
                <table id="example" style="font-size:0px; width:100%" class="table table-striped table-bordered table-sm text-center naikpangkat">
                    <thead>
                    <tr>
                        <th width="0px">No</th>
                        <th>Nama Pegawai</th>
                        <th>Nip Pegawai</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                </table>
            </div>
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
                    ajax: {"url": '<?= base_url()?>pegawai/json_mon_naikpangkat_ijazah', "type": "POST", data : {'id' : <?= $this->session->userdata('id_pegawai')?>}},
                    columns: [
                        {"data" : 'waktu_pengajuan_ijazah', orderable:false},
                        {"data" : 'nama_tanpa_gelar_peg'},
                        {"data" : 'nip_peg'},
                        {
                            "data" : 'waktu_pengajuan_ijazah',
                            "render" : function(data, type, row){
                                var date = data.split(' ')[0];
                                return dateIndo(date);
                            },
                        },
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
                        {
                            "data" : 'report_pengajuan_ijazah',
                            "render" : function(data, type, row){
                                if(data == null){
                                    return '<button type="button" class="btn btn-primary" data-book-id="'+row.id_ajuan_ijazah+'" data-toggle="modal" data-target="#exampleModalCenter">Upload Surat</button>'
                                }
                                else {
                                    return '<a href="<?= base_url()?>upload/report_naikpangkat/ijazah/'+data+'" class="btn btn-success py-2" style="font-size:12px !important" download>Download Surat</a>';
                                }
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Upload Surat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?= form_open_multipart('pegawai/upload_feedback_ijazah');?>
                <div class="modal-body">
                    <input type="hidden" name="idaju" id="key">
                    <div style="text-align:center; border:4px dashed rgba(0,0,0,0.3); padding:100px 40px">
                        <p>Tekan Dibawah Untuk Mengupload Berkas</p>
                        <label for="fileUpload" class="btn btn-primary btn-sm m-0" style="font-size:12px">Upload Surat</label>
                        <input id="fileUpload" type="file" name="sk" style="display:none" accept="application/pdf">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" value="Upload SK" class="btn btn-primary">
                </div>
            <?= form_close()?>
            </div>
        </div>
    </div>
    
    <script>

    $('#exampleModalCenter').on('show.bs.modal', function(e) {
        var bookId = $(e.relatedTarget).data('book-id');

        $('#key').val(bookId);
    });

    </script>

</div>