<div class="container-fluid">

    <?php if($this->session->flashdata('msg') == 1){?>
        <div class="alert alert-danger" role="alert">
            Berhasil menghapus Data  
        </div>
    <?php }; ?>

    <a href="<?= base_url()?>akademik/form_matkul" class="btn btn-success mb-3" style=""> Tambah Mata Kuliah</a>

    <div class="card shadow mb-4 p-5" style="font-size:14px">
        <div class="header">
            <h3 class="mb-3">List Jadwal Mata Kuliah</h3>
            <p class="mb-0">Dashboard Untuk Mendaftarkan/ Mengedit serta Menghapus Mata Kuliah</p>
        </div>
        <hr>
        <div class="body">
            <div class="table-responsive">
                <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th width="40px">No</th>
                        <th>Nama Mata Kuliah</th>
                        <th>Semester</th>
                        <th>SKS</th>
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
                    ajax: {"url": '<?= base_url()?>akademik/json_mata_kuliah', "type": "POST"},
                    columns: [
                        {"data" : 'id_mata_kuliah', orderable:false},
                        {"data" : 'nama_mata_kuliah'},
                        {"data" : 'semester_mata_kuliah'},
                        {"data" : 'sks_mata_kuliah'},
                        {
                            "data" : 'id_mata_kuliah',
                            "render" : function(data, type, row){
                                return '<a href="<?= base_url()?>akademik/form_matkul/'+data+'" class="btn btn-sm btn-warning mx-2"><i class="mdi mdi-pencil"></i></a><a href="<?= base_url()?>akademik/hapus_matkul/'+data+'" class="btn btn-sm btn-danger"><i class="mdi mdi-delete"></i></a>' ;
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