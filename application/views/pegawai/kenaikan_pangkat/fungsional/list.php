<div class="container-fluid">
    <div class="card shadow mb-4 p-5" style="font-size:14px">

        <div class="header">
            <h3 class="mb-3">List Ajuan Kenaikan Pangkat Jabatan Fungsional</h3>
            <p class="mb-0">List List Ajuan Pegawai yang perlu ditinjau</p>
        </div>
        <hr>
        <div class="body">
            <div class="table-responsive">
                <table id="example" style="font-size:0px; width:100%" class="table table-striped table-bordered table-sm text-center">
                    <thead>
                    <tr>
                        <th width="10px">No</th>
                        <th>Nama Pegawai</th>
                        <th>Nip Pegawai</th>
                        <th>Waktu</th>
                        <th>Status</th>
                        <th>Keterangan</th>
                        <th width="200px">Aksi</th>
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
                    ajax: {"url": '<?= base_url()?>pegawai/json_naikpangkat_fungsional', "type": "POST", data : {'id' : <?= $this->session->userdata('id_pegawai')?>}},
                    columns: [
                        {"data" : 'waktu_pengajuan_fungsional', orderable:false},
                        {"data" : 'nama_tanpa_gelar_peg'},
                        {"data" : 'nip_peg'},
                        {"data" : 'waktu_pengajuan_fungsional'},
                        {
                            "data" : 'status_pengajuan_fungsional',
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
                        {"data" : 'keterangan_pengajuan_fungsional'},
                        {
                            "data" : 'id_ajuan_fungsional',
                            "render" : function(data, type, row){
                               return '<a href="<?= base_url()?>pegawai/tinjau_naikpangkat_fungsional/'+data+'" class="btn btn-primary btn-sm w-50"><i class="mdi mdi-pencil" style="font-size:14px"></i> &nbsp Tinjau</a>';
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