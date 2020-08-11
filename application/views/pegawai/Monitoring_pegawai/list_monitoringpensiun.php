<div class="container-fluid">
    <div class="card shadow mb-4 p-5" style="font-size:14px">

        <div class="header">
            <h3 class="mb-3">Monitoring Ajuan Pensiun</h3>
            <p class="mb-0">List Ajuan Pensiun Pegawai yang telah ditinjau</p>
        </div>
        <hr>
        <div class="body">
            <div class="table-responsive">
                <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th width="40px">No</th>
                        <th>Nama Pegawai</th>
                        <th>Nip</th>
                        <th>Waktu</th>
                        <th>Status</th>
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
                    ajax: {"url": '<?= base_url()?>pegawai/json_mon_pensiun', "type": "POST", data : {'id' : <?= $this->session->userdata('id_pegawai')?>}},
                    columns: [
                        {"data" : 'waktu_pengajuan_pensiun', orderable:false},
                        {"data" : 'nama_tanpa_gelar_peg'},
                        {"data" : 'nip_full_peg'},
                        {"data" : 'waktu_pengajuan_pensiun'},
                        {
                            "data" : 'status_pengajuan',
                            "render" : function(data, type, row){
                                if(data == 1){
                                    return '<label class="badge badge-success">Telah Diperiksa</label>' ;
                                }
                                else if(data == 2){
                                    return '<label class="badge badge-danger">Ditolak</label>' ;
                                }
                                else {
                                    return '<label class="badge badge-warning">Akan Dikoreksi</label>' ;
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
</div>