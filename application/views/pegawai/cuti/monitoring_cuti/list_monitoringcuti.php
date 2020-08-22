<div class="container-fluid">
    <div class="card shadow mb-4 p-5" style="font-size:14px">

        <div class="header">
            <h3 class="mb-3">List Pengajuan Cuti</h3>
            <p class="mb-0">Dibawah Merupakan List Pengajuan Cuti Secara Keseluruhan Baik Yang Disetujui maupun Ditolak</p>
        </div>
        <hr>
        <div class="body">
            <div class="table-responsive">
                <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th width="40px">No</th>
                        <th>Nama Pegawai</th>
                        <th>Nip Pegawai</th>
                        <th>Waktu Pengajuan</th>
                        <th>Jenis Cuti</th>
                        <th>Terhitung Cuti</th>
                        <th>Jumlah Cuti (Hari)</th>
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
                    ajax: {"url": '<?= base_url()?>pegawai/json_mon_ajuan_cuti', "type": "POST"},
                    columns: [
                        {"data" : 'waktu_pengajuan_cuti', orderable:false},
                        {"data" : 'nama_tanpa_gelar_peg'},
                        {"data" : 'nip_peg'},
                        {
                            "data" : 'waktu_pengajuan_cuti',
                            "render" : function(data, type, row){
                                var date = data.split(' ')[0];
                                return dateIndo(date);
                            },
                        },
                        {
                            "data" : 'jenis_pengajuan_cuti',
                            "render" : function(data, type, row){
                                if(data == 1) return 'Cuti Besar';
                                else if(data == 2) return 'Cuti Tahunan';
                                else if(data == 3) return 'Cuti Sakit';
                                else if(data == 4) return 'Cuti Melahirkan';
                                else if(data == 5) return 'Cuti Karena Alasan Penting';
                                else if(data == 6) return 'Cuti Di Luar Tanggungan Negara';

                                return  ;
                            }
                        },
                        {"data" : 'tgl_cuti'},
                        {
                            "data" : 'jml_hari_cuti',
                            "render" : function(data, type, row){
                                return row.jml_thn_cuti+' Tahun '+row.jml_bln_cuti+' Bulan '+row.jml_hari_cuti+' Hari';
                            }
                        },
                        {
                            "data" : 'status_cuti',
                            "render" : function(data, type, row){
                                if(row.status_cuti == 1){
                                    return "<label class='badge badge-success'>Disetujui</label>";
                                }else {
                                    return "<label class='badge badge-danger'>Ditolak</label>";
                                };
                            }
                        }
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