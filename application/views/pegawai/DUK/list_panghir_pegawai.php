<div class="container-fluid">
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pangkat Golongan Pegawai</h1>
</div>

<?php if($this->session->flashdata('msg') == 1){?>
    <div class="alert alert-success" role="alert">
        Berhasil Mengganti Pangkat Golongan
    </div>
<?php } else if($this->session->flashdata('msg') == 2) {?>
    <div class="alert alert-danger" role="alert">
        Gagal Mengganti Pangkat Golongan
    </div>
<?php };?>

<div class="card shadow mb-4">
    <div class="card-body">
        <p class="mb-0">Keterangan : </p>
        <small>Menu ini untuk Mengganti Pangkat Golongan Dari Pegawai Silahkan Mengganti Pangkat Golongan Pegawai dengan cara Menekan Tombol &nbsp; <span class="btn btn-warning">Ganti Pangkat Golongan</span></small>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header" style="background-color:#4e73df; color:white;font-weight:bold">
        List Data Pangkat Terakhir Pegawai
    </div>
    <div class="card-body">
        <div class="table-responsive">
        
        <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
            <thead>
            <tr>
                <th width="">No</th>
                <th>Nama Pegawai</th>
                <th>Nip Peg</th>
                <th>Pangkat Terakhir</th>
                <th>TMT Pangkat Terakhir</th>
                <th>No SK</th>
                <th>Tgl SK</th>
                <th width="140px">Aksi</th>
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
                    ajax: {"url": "<?= base_url()?>pegawai/json_panghir", "type": "POST"},
                    columns: [
                        {"data": "id_pangkat_terakhir"},
                        {"data": "nama_tanpa_gelar_peg"},
                        {"data": "nip_peg"},
                        {"data": "pangkat_terakhir"},
                        {"data": "tmt_pangkat_terakhir"},
                        {"data": "no_sk_pangkat_terakhir"},
                        {"data": "tgl_sk_pangkat_terakhir"},
                        {
                            "data": "id_peg",
                            "render" : function(data, type, row){
                                return '<a href="<?=base_url()?>pegawai/form_data_panghir/'+data+'" class="btn btn-warning">Ganti Pangkat Golongan</a>';
                            },
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