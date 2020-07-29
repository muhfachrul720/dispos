<div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Data Induk Pegawai</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
             
                <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                  <thead>
                    <tr>
                      <th width="5px">No</th>
                      <th>Nama Pegawai</th>
                      <th width="5">Status Pegawai</th>
                      <th>TMT Pensiun Pegawai</th>
                      <th>Gaji Pokok Pegawai</th>
                      <th>Tanggal Meninggal Dunia</th>
                      <th width="15px">Aksi</th>
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
                        {"data": "id_users"},
                        {"data": "nama_tanpa_gelar_peg"},
                        {"data": "status_kepegawaian_peg"},
                        {"data": "tmt_pensiun_peg"},
                        {"data": "gaji_pokok_peg"},
                        {"data": "tgl_meninggal_dunia_peg"},
                        {
                            "data": "id_peg",
                            "render" : function(data, type, row){
                                return '<a href="<?=base_url()?>pegawai/form_data_pegawai/'+data+'" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>';
                            },
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