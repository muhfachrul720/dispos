<!-- <?php // echo($berkas[0]['id_berkas']); die;?> -->
<?= form_open('pegawai/update_jabatan')?>
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="col-12 mb-3">
                <?= form_hidden('idpeg', $id_pegawai)?>
                <?= form_hidden('check', $check)?>
                <?= form_hidden('idajuan', $ajuan)?>
                    <div class="card">
                        <div class="card-body">
                        <h6 class="card-title">Ubah Jabatan</h6>
                        <hr>
                        <?php if($check == 1){?>
                        <?= form_hidden('jabstruk', $id_kat_jab_struktural)?>
                        <?= form_hidden('tmtstruk', $tmt_jab_struktural)?>

                        <div class="form-group row">
                            <div class="col-6">
                                <label for=""><small>Jabatan Fungsional</small></label>
                                    <?= cmb_dinamis('jabfung', 'tbl_kategori_jabatan_fung', 'nama_kategori_fung', 'id_kategori_jabatan_fung', $id_kategori_jab_fungsional,'DESC') ?>
                            </div>
                            <div class="col-6">
                                <label for=""><small>TMT Jabatan Fungsional</small></label>
                                <input type="date" name="tmtfung" class="form-control form-control-sm" value="<?= date('Y-m-d')?>">
                            </div>
                        </div>

                        <?php } else {?>
                        <?= form_hidden('jabfung', $id_kategori_jab_fungsional)?>
                        <?= form_hidden('tmtfung', $tmt_jab_fungsional)?>

                        <div class="form-group row">
                            <div class="col-12 mb-3">
                                <label for=""><small>Jabatan Struktural</small></label>
                                <?php echo cmb_dinamis('', 'tbl_kategori_jabatan_struktur', 'nama_jabatan_struktur', 'id_kat_jbt_struktur', $usulan, 'DESC', 'disabled') ?>
                            </div>
                            <div class="col-6">
                                <label for=""><small>Jabatan Struktural</small></label>
                                <?= cmb_dinamis('jabstruk', 'tbl_kategori_jabatan_struktur', 'nama_jabatan_struktur', 'id_kat_jbt_struktur', $id_kat_jab_struktural,'DESC') ?>
                            </div>
                            <div class="col-6">
                                <label for=""><small>TMT Jabatan Struktural</small></label>
                                <input type="date" name="tmtstruk" class="form-control form-control-sm" value="<?= date('Y-m-d')?>">
                            </div>
                        </div>
                        <?php }; ?>
                    </div>
                </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Riwayat Jabatan Pegawai</h6>
                            <hr>
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

            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Verifikasi Ubah Jabatan</h6>
                    <hr>
                    <p>Apakah Kenaikan Pangkat Dari Pegawai Tersebut Telah Benar dan Sesuai Dengan Persyaratan Yang Ada Jika Iya Silahkan Menekan Tombol "Naikkan Pangkat" Dibawah Ini </p>
                    <div style="display:flex">
                        <input type="submit" class="btn btn-success mr-2" value="Naik Pangkat Pegawai">
                        <a href="<?= base_url()?>pegawai/mon_naikpangkat_fungsional" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
<?= form_close()?>