<div class="card border-top-0 mb-3 pt-3 px-3 pb-1">
                <div class="card-body">
                    <h3 class="">Tinjau Pengajuan Kenaikan Pangkat Penyesuaian ijazah </h3>
                    <p>Halaman Untuk Meninjau Pengajuan Pengajuan Kenaikan Pangkat Jabatan</p>
                </div>
            </div>  
            
            <?= form_open_multipart($action)?>

            <?php $checker = array(
                array('<b>Foto Kopi Sah</b> SK Pangkat Terakhir', 'skpangkat'),
                array('<b>Foto Kopi Sah</b> ijazah dan Transkrip Nilai', 'ijazah'),
                array('<b>Foto Kopi Sah</b> Surat Tanda Lulus Kenaikan Pangkat Penyesuaian ijazah', 'srtlulus'),
                array('<b>Foto Kopi Sah</b> Surat Ijin Belajar / Tugas Belajar', 'srtbelajar'),
                array('<b>Uraian Tugas Asli</b> Ditandatangani serendah rendahnya Eselon II', 'srttgs'),
                array('<b>SKP, Capaian SKP, dan Penilaian Prestasi Kerja</b> (2 Tahun terakhir <b>sekurang-kurangnya bernilai baik</b>', 'skp'),
            );?>
           
            <div class="row">
                <div class="col-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="title" style="text-align:center; ">Formulir Biodata</h5>
                            <hr>
                            <div class="form-group row">
                                <?=  form_hidden('id', $id_ajuan_ijazah); ?> 
                                <div class="col-6">
                                    <label for=""><small>Nama Pegawai</small></label>
                                    <input type="text" class="form-control form-control-sm" value="<?= $nama_tanpa_gelar_peg?>" disabled> 
                                </div>
                                <div class="col-6">
                                    <label for=""><small>Nip Pegawai</small></label>
                                    <input type="text" class="form-control form-control-sm" value="<?= $nip_peg?>" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                 <div class="col-3">
                                    <label for=""><small>Masa Kerja</small></label>
                                    <input type="text" class="form-control form-control-sm" value="<?= $thn_masa_kerja_pensiun_peg ?>" disabled>
                                </div>
                                <div class="col-9">
                                    <label for=""><small>Unit Kerja</small></label>
                                    <input type="text" class="form-control form-control-sm" value="<?= $program_studi_uker?>" disabled>
                                </div>
                            </div>
                            <hr>

                            <div class="form-group row">
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
                    </div>
                </div>

                <div class="col-5">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="title" style="text-align:center; ">Berkas Pengajuan</h5>
                                    <hr>
                                    <?php 
                                        for($i = 0; $i < count($checker); $i++){
                                        $path = base_url().'upload/berkas_naikpangkat/ijazah/pegawai_'.$id_pegawai.'tgl_'.substr(str_replace(':','_',$waktu_pengajuan_ijazah), 2);
                                    ?>
                                    <div class="row mb-3">
                                        <div class="col-7">
                                            <small><?= $checker[$i][0]?></small>
                                        </div>
                                        <div class="col-5">
                                            <?php if($berkas[$i] != null){?>
                                                <a href="<?= $path.'/'.$berkas[$i] ?>" class="btn btn-sm btn-info m-auto" style="font-size:12px">Lihat File</a>
                                                <i id="check<?= $i ?>" class="mdi mdi-checkbox-marked-outline btn btn-success btn-sm w-25"></i>
                                            <?php } else {?>
                                                <span class="btn btn-sm btn-danger m-auto" style="font-size:12px">Tidak Ada</span>
                                                <i id="check<?= $i ?>" class="mdi mdi-close btn btn-danger btn-sm w-25"></i>
                                            <?php };?>
                                        </div>
                                    </div>
                                    <?php };?>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <label for=""><small>Status Pengajuan </small></label>
                                            <?php echo form_dropdown('status', array('1' => 'Disetujui', '2' => 'Ditolak', '3' => 'Perlu Dikoreksi'), $status_pengajuan_ijazah, array('class' => 'form-control form-control-sm')); ?>
                                        </div>
                                        <div class="col-12 mb-2">
                                            <label for=""><small>Keterangan</small></label>
                                            <?= form_error('keterangan') ?>
                                            <textarea name="keterangan" id="" cols="30" rows="4" class="form-control form-control-sm"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" id="submit" class="btn btn-success" style="width:49%" value="Verifikasi">
                                            <a href="<?= base_url()?>/pegawai/verifikasi_naikpangkat_ijazah" class="btn btn-secondary" style="width:49%">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>

            <?= form_close()?>