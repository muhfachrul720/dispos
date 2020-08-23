<div class="container-fluid">
    <div class="card shadow mb-4 p-5" style="font-size:14px">

        <div class="header">
            <div class="row justify-content-between">
                <div class="col-6">
                    <h3 class>List Pengajuan Cuti (Terverifikasi)</h3>
                    <p class="p-0">Dibawah Merupakan List Nama Nama Pegawai Yang Mengambil Cuti, Silahkan Mengupload Surat Persetujuan Cuti</p>
                </div>
                <div class="col-6" style="text-align:right">
                    <a href="<?= base_url()?>cetakexcel/print_excel_cuti_nonsk" class="btn btn-success">Export Pegawai Non SK</a>
                    <a href="<?= base_url()?>cetakexcel/print_excel_cuti_all" class="btn btn-success">Export Semua Pegawai</a>
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
                        <th>Nip Pegawai</th>
                        <th>Jenis Cuti</th>
                        <th>Terhitung Cuti</th>
                        <th>Jumlah Cuti (Hari)</th>
                        <th>Download</th>
                        <th>Persetujuan</th>
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
                    ajax: {"url": '<?= base_url()?>pegawai/json_mon_cuti', "type": "POST"},
                    columns: [
                        {"data" : 'waktu_pengajuan_cuti', orderable:true},
                        {"data" : 'nama_tanpa_gelar_peg'},
                        {"data" : 'nip_peg'},
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
                        {
                            "data" : 'tgl_cuti',
                            "render" : function(data, type, row){
                                var date = data.split(' ')[0];
                                return dateIndo(date);
                            }
                        },
                        {
                            "data" : 'jml_hari_cuti',
                            "render" : function(data, type, row){
                                return row.jml_thn_cuti+' Tahun '+row.jml_bln_cuti+' Bulan '+row.jml_hari_cuti+' Hari';
                            }
                        },
                        {
                            "data" : 'id_pengajuan_cuti',
                            "render" : function(data, type, row){
                                if(row.status_cuti == 1){
                                    return '<a href="<?= base_url()?>pegawai/print_form_cuti/'+data+'" style="font-size:12px" class="btn btn-sm btn-info" target="_blank">Download Formulir</a>';
                                }else {
                                    return '';
                                };
                            }
                        },
                        {
                            "data" : 'report_pengajuan_cuti',
                            "render" : function(data, type, row){
                                if(data == null){
                                    return '<button type="button" class="btn btn-primary p-1" data-book-id="'+row.id_pengajuan_cuti+'" data-toggle="modal" data-target="#exampleModalCenter">Upload Persetujuan</button>'
                                }
                                else {
                                    return '<a href="<?= base_url()?>upload/report_cuti/'+data+'" class="btn btn-success p-1" download>Download Persetujuan</a>'
                                }
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

        <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Upload Persetujuan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?= form_open_multipart('pegawai/upload_surat_cuti');?>
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
            <input type="submit" value="Upload Persetujuan" class="btn btn-primary">
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