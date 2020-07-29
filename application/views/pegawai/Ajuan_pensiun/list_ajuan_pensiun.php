<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Ajuan Pensiun</h1>
    </div>

    <!-- Pertimbangan Pengajuan -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0 text-gray-800" style="font-weight:bold">List Ajuan Pensiun</h6>
    </div>
    <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
             
                <table id="example" style="font-size:15px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                  <thead>
                    <tr>
                        <th width="5px">No</th>
                        <th>Tulisan</th>
                        <th>Keterangan</th>
                        <th width="200px">Status</th>
                        <th width="105px">Aksi</th>
                    </tr>
                  </thead>
                </table>
           
            </div>
        </div>
    </div>

    <hr>

    <!-- Pengajuan Ditolak -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0 text-gray-800" style="font-weight:bold">List Ajuan Pensiun Ditolak</h6>
    </div>
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
             
                <table id="example0" style="font-size:15px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                  <thead>
                    <tr>
                        <th width="5px">No</th>
                        <th>Tulisan</th>
                        <th>Keterangan</th>
                        <th width="200px">Status</th>
                    </tr>
                  </thead>
                </table>
           
            </div>
        </div>
    </div>

    <!-- Pengajuan Diterima -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h6 class="mb-0 text-gray-800" style="font-weight:bold">List Ajuan Pensiun Diterima</h6>
    </div>
    <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
             
                <table id="example1" style="font-size:15px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                  <thead>
                    <tr>
                        <th width="5px">No</th>
                        <th>Tulisan</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                  </thead>
                </table>
           
            </div>
        </div>
    </div>

    <script type="text/javascript">
            var url = ['<?= base_url()?>pegawai/json_verifpensi_tolak', '<?= base_url()?>pegawai/json_verifpensi_terima'];

            console.log(url[0]);
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
                    ajax: {"url": '<?= base_url()?>pegawai/json_verifpensi_netral', "type": "POST"},
                    columns: [
                        {"data" : 'id'},
                        {"data" : 'ajuan_pensiun_tulisan'},
                        {"data" : 'ajuan_pensiun_keterangan'},
                        {
                            "data" : 'ajuan_pensiun_status',
                            "render" : function(data, type, row){
                                    return '<span style="font-size:13px" class="w-100 badge badge-secondary">Dipertimbangkan</span>';
                            }
                        },
                        {
                            "data" : 'id',
                            "render" : function(data, type, row){
                                return '<a href="<?=base_url()?>pegawai/tinjau_pensiun/'+data+'" class="btn btn-sm btn-primary">Tinjau</a>' ;
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


                // Looping for Datatables
                for(var i = 0; i <= 1; i++){
                    var t = $("#example"+i).dataTable({
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
                    ajax: {"url": url[i], "type": "POST"},
                    columns: [
                        {"data" : 'id'},
                        {"data" : 'ajuan_pensiun_tulisan'},
                        {"data" : 'ajuan_pensiun_keterangan'},
                        {
                            "data" : 'ajuan_pensiun_status',
                            "render" : function(data, type, row){
                                if(data == 1){
                                    return '<span style="font-size:13px" class="w-100 badge badge-success">Diterima</span>';
                                }
                                else if(data == 2){
                                    return '<span style="font-size:13px" class="w-100 badge badge-danger">Ditolak</span>';
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
                }
            });
        </script>

        <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</div>