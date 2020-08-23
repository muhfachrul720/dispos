<div class="container-fluid">

    <?php if($this->session->flashdata('msg') == 1){?>
        <div class="alert alert-success" role="alert">
            Gagal Mengupload SK 
        </div>
    <?php };?>

    <div class="card shadow mb-4 p-5" style="font-size:14px">

        <div class="header">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h3>List Pegawai Pensiun</h3>
                    <p class="p-0">Dibawah Merupakan List Pegawai Yang Telah Berstatus Pensiun, Silahkan Mengupload SK Pensiun Apabila Tersedia</p>
                </div>
                <div class="col-6" style="text-align:right;">
                    <a href="<?= base_url()?>cetakexcel/print_excel_pensiun_nonsk" class="btn btn-success">Export Pegawai Non SK</a>
                    <a href="<?= base_url()?>cetakexcel/print_excel_pensiun_all" class="btn btn-success">Export Semua Pegawai</a>
                </div>
            </div>

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
                        <th>Tmt Pensiun</th>
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
                    ajax: {"url": '<?= base_url()?>pegawai/json_reporting_pensiun', "type": "POST", data : {'id' : <?= $this->session->userdata('id_pegawai')?>}},
                    columns: [
                        {"data" : 'idpgw', orderable:false},
                        {"data" : 'nama_tanpa_gelar_peg'},
                        {"data" : 'nip_peg'},
                        {"data" : 'tmt_pensiun_peg'},
                        {
                            "data" : 'laporan_pengajuan_pensiun',
                            "render" : function(data, type, row){
                                if(data == null){
                                    return '<button type="button" class="btn btn-primary" data-book-id="'+row.id_pengajuan_pensiun+'" data-toggle="modal" data-target="#exampleModalCenter">Upload SK Pensiun Kemendikbud</button>'
                                }
                                else {
                                    return '<a href="<?= base_url()?>upload/report_pensiun/'+data+'" class="btn btn-success download">SK Telah di Upload Download Disini</a>'
                                    // return '<p class="mb-1" style="font-size:12px">SK Kemendikbud Upload</p><a class="btn btn-success" href="<?= base_url()?>upload/report_pensiun/'+data+'" download>Download</a>';
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

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Upload SK</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?= form_open_multipart('pegawai/upload_sk');?>
      <div class="modal-body">
        <input type="hidden" name="ajupen" id="key">
        <div style="text-align:center; border:4px dashed rgba(0,0,0,0.3); padding:100px 40px">
            <p>Tekan Dibawah Untuk Mengupload Berkas</p>
            <label for="fileUpload" class="btn btn-primary btn-sm m-0" style="font-size:12px">Upload File</label>
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