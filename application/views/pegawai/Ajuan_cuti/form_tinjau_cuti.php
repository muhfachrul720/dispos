<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-body px-5 py-4" style="font-size:14px">
            <h2>Verifikasi Cuti</h2>
            <p class="m-0">Halaman Untuk Memverifikasi pengajuan Cuti yang diajukan Pegawai</p>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Form Pengajuan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Catatan Cuti</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active mb-4" style="font-size:14px" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-2 my-auto" style="font-weight:bold">Data Pegawai</div>
                        <div class="col pl-5" style="border-left:1px solid gray">
                            <div class="row form-group">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Nama : </div>
                                        <div class="col">
                                            <input type="text" disabled class="form-control form-control-sm" value="<?= $nama_tanpa_gelar_peg?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Nip : </div>
                                        <div class="col">
                                            <input type="text" disabled class="form-control form-control-sm" value="<?= $nip_peg?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Jabatan : </div>
                                        <div class="col">
                                            <input type="text" disabled class="form-control form-control-sm" value="-">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">   
                                        <div class="col-4 pt-1">Masa Kerja : </div>
                                        <div class="col-5">
                                            <input type="text" disabled class="form-control form-control-sm" value="<?= $thn_masa_kerja_pensiun_peg?>">
                                        </div>
                                        <div class="col pt-1">Tahun</div>
                                    </div>
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-2 pt-1">Unit Kerja</div>
                                <div class="col">
                                    <input type="text" disabled class="form-control form-control-sm" value="<?= $program_studi_uker?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-2 my-auto" style="font-weight:bold">Jenis Cuti</div>
                        <div class="col-4 pl-5" style="border-left:1px solid gray">
                            <?php echo form_dropdown('jeniscuti', array(1 => 'Cuti Besar', 2 => 'Cuti Tahunan', 3 => 'Cuti Sakit', 4 => 'Cuti Melahirkan', 5 => 'Cuti Karena Alasan Penting', 6 => 'Cuti Di luar Tanggungan Negara'), $jenis_pengajuan_cuti, array('class' => 'form-control form-control-sm', 'disabled' => 'true')); ?>
                        </div>

                        <div class="col-2 my-auto" style="">Tahun :</div>
                        <div class="col my-auto" style="">
                        <input type="text" disabled class="form-control form-control-sm" value="<?= $tahun_pengajuan_cuti?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-2 my-auto" style="font-weight:bold">Alasan Cuti</div>
                        <div class="col pl-5" style="border-left:1px solid gray">
                            <textarea disabled id="" cols="30" rows="5" class="form-control form-control-sm"><?= $alasan_pengajuan_cuti?></textarea> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-2 my-auto" style="font-weight:bold">Lamanya Cuti</div>
                        <div class="col pl-5" style="border-left:1px solid gray">
                              <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Mulai : </div>
                                        <div class="col">
                                            <input type="date" disabled class="form-control form-control-sm" value="<?= $tgl_cuti?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-4 pt-1">Berakhir : </div>
                                        <div class="col">
                                            <input type="date" disabled class="form-control form-control-sm" value="<?= $lastday?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-2 my-auto" style="font-weight:bold">Alamat Cuti</div>
                        <div class="col pl-5" style="border-left:1px solid gray">
                            <div class="row form-group">
                                <div class="col-4 pt-1">Alamat Selama Menjalankan Cuti : </div>
                                <div class="col">
                                    <textarea class="form-control form-control-sm" disabled id="" cols="30" rows="3"><?= $alamat_pengajuan_cuti?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 pt-1">Telepon Selama Menjalankan Cuti : </div>
                                <div class="col">
                                    <input type="text" disabled class="form-control form-control-sm" value="<?= $telepon_pengajuan_cuti?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-pane fade mb-4" style="background-color:white; font-size:14px" id="contact" role="tabpanel" aria-labelledby="contact-tab">

        <?= form_open('pegawai/action_tinjau_cuti')?>

            <input type="hidden" name="id" value="<?= $id_pengajuan_cuti?>">
            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-2 my-auto" style="font-weight:bold">Kuota Cuti Tahunan</div>
                        <div class="col-4 pl-5" style="border-left:1px solid gray">
                            <?php echo form_dropdown('', array(1 => 'Cuti Besar', 2 => 'Cuti Tahunan', 3 => 'Cuti Sakit', 4 => 'Cuti Melahirkan', 5 => 'Cuti Karena Alasan Penting', 6 => 'Cuti Di luar Tanggungan Negara'), $jenis_pengajuan_cuti, array('class' => 'form-control form-control-sm', 'id' => 'thnTrigger', 'disabled' => 'true')); ?>
                        </div>

                        <script>
                            $(document).ready(function(){
                                var val = $('#thnTrigger').val();
                                $('.optThn').prop("disabled", true);
                                if(val == 2){
                                    $('.optThn').prop("disabled", false);
                                }
                            });
                        </script>

                        <div class="col-1 pt-1">
                            Tahun : 
                        </div>
                        <div class="col-2">
                            <input type="text" disabled class="form-control form-control-sm" value="<?= $tahun_pengajuan_cuti?>">
                        </div>
                        <div class="col-1 pt-1">Kuota :</div>
                        <div class="col-2">
                            <input type="number" name="kuota" min="0" class="form-control form-control-sm optThn">
                            <?php echo form_error('kuota') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-2 my-auto" style="font-weight:bold">Keterangan</div>
                        <div class="col pl-5" style="border-left:1px solid gray">
                            <textarea name="ket" id="" cols="30" rows="5" class="form-control form-control-sm"></textarea> 
                            <?php echo form_error('ket') ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card border mt-3">
                <div class="card-body px-5">
                    <div class="row">
                        <div class="col-2 my-auto" style="font-weight:bold">Verifikasi</div>
                        <div class="col-6 pl-5" style="border-left:1px solid gray">
                            <?php echo form_dropdown('status', array(1 => 'Telah Diperiksa', 2 => 'Ditolak'), '', array('class' => 'form-control form-control-sm')); ?>
                        </div>
                        <div class="col">
                            <button class="btn btn-success btn-sm w-100">Verifikasi</button>
                        </div>
                    </div>
                </div>
            </div>

        <?= form_close()?>

        </div>
    </div>

</div>