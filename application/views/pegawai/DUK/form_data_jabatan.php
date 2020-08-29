<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold px-3">Update Jabatan Pegawai</h6>
    </div>
    <?= form_open('pegawai/update_jabatan')?>
    <div class="card-body px-4 py-3">
        <input type="hidden" name="idpeg" value="<?= $id_pegawai?>">
        <div class="row mb-3 px-3">
            <div class="col-3">
                <label for=""><small style="font-weight:bold">Nama Pegawai :</small></label>
                <p style="margin:0"><?= $nama_tanpa_gelar_peg?></p>
            </div>
            <div class="col-3">
                <label for=""><small style="font-weight:bold">Nip (Nomor Induk Pegawai) :</small></label>
                <p style="margin:0"><?= $nip_peg?></p>
            </div>
            <div class="col-3">
            </div>
            <div class="col-3">
                <a href="<?= base_url()?>cetakexcel/print_excel_jab/<?= $id_pegawai?>" class="btn btn-success w-100">Export Jabatan Pegawai</a>
            </div>
        </div>
       
        <div class="row mb-3 px-3">
            <div class="col-3">
                <label for=""><small style="font-weight:bold">Jabatan Fungsional</small></label>
                <?= cmb_dinamis('jabfung', 'tbl_kategori_jabatan_fung', 'nama_kategori_fung', 'id_kategori_jabatan_fung', $id_kategori_jab_fungsional,'DESC') ?>
            </div>
            <div class="col-3">
                <label for=""><small style="font-weight:bold">TMT Jabatan Fungsional</small></label>
                <input type="date" name="tmtfung" class="form-control" value="<?= $tmt_jab_fungsional?>" style="height:40px; padding:0px 10px">
            </div>
            <div class="col-3">
                <label for=""><small style="font-weight:bold">Jabatan Struktural</small></label>
                <?= cmb_dinamis('jabstruk', 'tbl_kategori_jabatan_struktur', 'nama_jabatan_struktur', 'id_kat_jbt_struktur', $id_kat_jab_struktural,'DESC') ?>
            </div>
            <div class="col-3">
                <label for=""><small style="font-weight:bold">TMT Jabatan Struktural</small></label>
                <input type="date" name="tmtstruk" class="form-control" value="<?= $tmt_jab_struktural?>"  style="height:40px; padding:0px 10px">
            </div>
        </div>
        <hr>
        <div class="row px-3">
            <div class="col-3">
            </div>
            <div class="col-3">
            </div>
            <div class="col-3">
                <input type="submit" id="submit" class="btn btn-success w-100" value="Update">
            </div>
            <div class="col-3">
                <a href="<?= base_url()?>/pegawai/data_jabatan" class="btn btn-secondary w-100">Kembali</a>
            </div>
        </div>
    </div>
    <?= form_close()?>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
        <h6 class="m-0 font-weight-bold px-3">Riwayat Jabatan</h6>
    </div>
    <div class="card-body px-4 py-3">
        <div class="col-12">
            <div class="table-responsive">
                <table id="history" style="font-size:12px;" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th width="10%">No</th>
                            <th>Nama Jabatan (Fungsional)</th>
                            <th>Nama Jabatan (Struktural)</th>
                        </tr>
                    </thead>
                </table>
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
                    var t = $("#history").dataTable({
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
                        ajax: {"url": '<?= base_url()?>pegawai/json_jab_bypegawai ', "type": "POST", data : { id : <?= $id_pegawai ?>}},
                        columns: [
                        {'data' : 'id_jab'},
                        {'data' : 'nama_kategori_fung'},
                        {'data' : 'nama_jabatan_struktur'},
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
                $('#history').DataTable();
                } );
            </script>
        </div>
    </div>
</div>
