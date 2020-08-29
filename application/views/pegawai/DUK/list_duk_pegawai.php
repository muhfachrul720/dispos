<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Induk Pegawai</h1>
    <a href="<?= base_url()?>cetakexcel/print_excel_jab" class="btn btn-success">Export Semua Pegawai</a>
</div>

<div class="card shadow mb-4">
    <div class="card-body">
        <p class="mb-0">Keterangan : </p>
        <small>Status Yang Pegawai Yang Masih Kosong Menandakan bahwa Pegawai Belum Aktif, Untuk mengaktifkan Status Pegawai Silahkan untuk menekan Tombol <span class="btn btn-warning btn-sm"></span> <br> TMT Pensiun Akan Diatur Oleh Sistem </small>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
        List Data Induk Pegawai
    </div>
    <div class="card-body">
        <div class="table-responsive">
        
        <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
            <thead>
            <tr>
                <th width="">No</th>
                <th>Nama Pegawai</th>
                <th>Status Pegawai</th>
                <th>TMT Pensiun Pegawai</th>
                <th>Tanggal Meninggal Dunia</th>
                <th width="100px">Aksi</th>
            </tr>
            </thead>
        </table>
    
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
                    ajax: {"url": "<?= base_url()?>pegawai/json_duk", "type": "POST", data : {'id' : <?= $this->session->userdata('id_users')?>}},
                    columns: [
                        {"data": "id_peg"},
                        {"data": "nama_tanpa_gelar_peg"},
                        {"data": "status_kepegawaian_peg"},
                        {"data": "tmt_pensiun_peg"},
                        {"data": "tgl_meninggal_dunia_peg"},
                        {
                            "data": "id_peg",
                            "render" : function(data, type, row){
                                return '<a href="<?=base_url()?>pegawai/form_data_pegawai/'+data+'" class="btn btn-sm btn-warning">Aktifasi</a>';
                            },
                        },
                    ],
                    order: [[2, 'asc']],
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