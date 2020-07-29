<div class="container-fluid">
    
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h3 mb-0 text-gray-800">Ajuan Pensiunan</h4>
    </div>

    <!-- Alert -->
    <?php if($status == 2){?>
    <div class="alert alert-danger" role="alert">
        Persetujuanmu  Ditolak, Silahkan untuk mengajukan kembali pensiunan Keterangan penolakan dapat diliat lebih jelas dibawah
    </div>
    <?php } else if($status == 1) {?>
    <div class="alert alert-success" role="alert">
        Persetujuanmu  Diterima, Silahkan untuk melanjutkan proses Pensiunan anda
    </div>
    <?php } else if($this->session->flashdata('Message')){;?>
    <div class="alert alert-success" role="alert">
        <?= $this->session->flashdata('Message')?>
    </div>
    <?php };?>


    <!-- Button Ajuan -->
    <div class="card">
        <div class="card-body py-3 px-3">
            <a href="<?= base_url('dashboard_p/form_ajuan_pensiun')?>" class="btn btn-sm btn-primary" style="color:white">Ajukan Pensiunan</a>
        </div>
    </div>

    <!-- History Ajuan -->
    <hr>
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0 text-gray-800">Riwayat Pengajuan</h4>
    </div>
    <div class="card p-4">
        <div class="table-responsive">  
            <table id="example" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                <thead>
                    <tr>    
                    <th width="30px">No</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <!-- <th width="100px">Aksi</!-->
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
                    ajax: {"url": "<?= base_url()?>dashboard_p/json_pensiun", "type": "POST", data : {'id' : <?= $this->session->userdata('id_users')?>}},
                    columns: [
                        {"data": "ajuan_pensiun_time"},
                        {"data": "ajuan_pensiun_keterangan"},
                        {
                            "data": "ajuan_pensiun_status", 
                            "render" : function(data, type, row){
                                if(data == 1) {
                                    return '<span class="badge badge-success">Diterima</span>';
                                }
                                else if(data == 2) {
                                    return '<span class="badge badge-danger">Ditolak</span>';
                                }
                                else {
                                    return '<span class="badge badge-secondary">Dipertimbangkan</span>';
                                }
                            }
                        },
                        
                        // {
                        //     "data" : "action",
                        //     "orderable": false,
                        //     "className" : "text-center"
                        // }
                    ],
                    order: [[0, 'desc']],
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
