<?= form_open('pegawai/update_datapanghir')?>
<?= form_hidden('idpeg', $id_pegawai)?>
<div class="row">
    <div class="col-9">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
                <h6 class="m-0 font-weight-bold px-3">Update Data Pangkat Golongan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <label for=""><small><b>Nama Pegawai</b></small></label>
                        <p><?= $nama_tanpa_gelar_peg ?></p>
                    </div>
                    <div class="col-4">
                        <label for=""><small><b>Nip Pegawai</b></small></label>
                        <p><?= $nip_peg ?></p>
                    </div>
                </div>
                <hr class="mt-1">
                <div class="row mb-3">
                    <div class="col-6">
                        <label for=""><small><b>No SK Pangkat Akhir</b></small></label>
                        <input type="text" name="nosk" class="form-control form-control-sm" value="<?= $no_sk_pangkat_terakhir?>">
                        <?php echo form_error('nosk') ?>
                    </div>
                    <div class="col-6">
                        <label for=""><small><b>Tanggal SK</b></small></label>
                        <input type="date" name="tglsk" id="" class="form-control form-control-sm" value="<?= $tgl_sk_pangkat_terakhir?>">
                        <?php echo form_error('tglsk') ?>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <label for=""><small><b>Diberikan Oleh</b></small></label>
                        <input type="text" name="giveby" id="" class="form-control form-control-sm" value="<?= $oleh_pejabat_pangkat_terakhir ?>">
                        <?php echo form_error('giveby') ?>
                    </div>
                    <div class="col-6">
                        <label for=""><small><b>TMT Pangkat Golongan</b></small></label>
                        <input type="date" name="tmt" id="" class="form-control form-control-sm" value="<?= $tmt_pangkat_terakhir?>">
                        <?php echo form_error('tmt') ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label for=""><small><b>Pangkat</b></small></label>
                        <input type="text" readonly class="form-control form-control-sm" value="Akan Ditentukan Oleh System">
                    </div>
                    <div class="col-4">
                        <label for=""><small><b>Golongan</b></small></label>
                        <?php echo form_dropdown('gol', array('1' => 'I', '2' => 'II', '3' => 'III', '4' => 'IV',), $golongan, array('class' => 'form-control form-control-sm')); ?>
                    </div>
                    <div class="col-4">
                        <label for=""><small><b>Ruang</b></small></label>
                        <?php echo form_dropdown('ruang', array('a' => 'a', 'b' => 'b', 'c' => 'c', 'd' => 'd', 'e' => 'e'), $ruang, array('class' => 'form-control form-control-sm')); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-3">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
                <h6 class="m-0 font-weight-bold px-3">Aksi</h6>
            </div>
            <div class="card-body pt-2">
                <small>Silahkan Menekan Tombol Apabila Telah Mengisi Pangkat</small>
                <hr>
                <div class="row mt-2">
                    <div class="col-12 mb-3">
                        <input type="submit" class="btn btn-success w-100" value="Ganti Jabatan">
                    </div>
                    <div class="col-12">
                        <a href="<?= base_url()?>pegawai/data_panghir" class="btn btn-secondary w-100">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="background-color:#4e73df; color:white; font-weight:bold">
                <h6 class="m-0 font-weight-bold px-3">Riwayat Pangkat Golongan</h6>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                
                <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th width="">No</th>
                        <th>Pangkat Terakhir</th>
                        <th>TMT Pangkat Terakhir</th>
                        <th>No SK</th>
                        <th>Tgl SK</th>
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
                                ajax: {"url": "<?= base_url()?>pegawai/json_panghir_bypegawai", "type": "POST", data : { id : <?= $id_pegawai ?>}},
                                columns: [
                                    {"data": "id_pangkat_terakhir"},
                                    {"data": "pangkat_terakhir"},
                                    {"data": "tmt_pangkat_terakhir"},
                                    {"data": "no_sk_pangkat_terakhir"},
                                    {"data": "tgl_sk_pangkat_terakhir"},
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
        </div>
    </div>
</div>
<?= form_close()?>