<div class="content-header">
  <div class="container-fluid px-4">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="container-fluid px-4">
    <div class="row">
      <div class="col-xl-12 stretch-card grid-margin">
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="<?= base_url()?>superadmin/userlevel/create" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i>  &nbsp; Tambah Pengguna</a>
            <a href="<?= base_url()?>superadmin/userlevel" class="btn btn-success btn-sm"> <i class="fas fa-sync"></i>  &nbsp; Refresh Halaman</a>

            <!-- Alert -->
            <!-- end Alert -->

          </div>
        </div>
      </div>
      <div class="col-xl-12 stretch-card grid-margin">
        <div class="card shadow mb-4">
          <div class="card-header ">
            <h6 class="m-0">Manajamen Data Pengguna</h6>
          </div>
          <div class="card-body">
            <table id="example" class="table table-striped table-bordered table-sm text-center" style="width:100%; font-size:12px">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Level</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
              </table>
         
          </div>
      </div>
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
            ajax: {"url": "userlevel/json", "type": "POST"},
            columns: [
                {"data": "id"},
                {"data": "name"},
                {
                  "data": "id",
                  "render" : function(data, type, row){
                    return '<a href="<?= base_url()?>superadmin/userlevel/update/'+data+'" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a> <a href="<?= base_url()?>superadmin/userlevel/delete/'+data+'" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></a>';
                  }
                },
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

