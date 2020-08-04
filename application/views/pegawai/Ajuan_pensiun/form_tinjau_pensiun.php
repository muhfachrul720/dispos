<!-- <?php // echo($berkas[0]['id_berkas']); die;?> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-body" style="height:100vh;">
                    <div class="row">
                    <?php 
                    for($i=0; $i < count($berkas); $i++){

                        $src = base_url().'upload/berkas_pensiun/pegawai_'.$id_pegawai.'tgl_'.substr(str_replace(':','_',$waktu_pengajuan_pensiun), 2).'/'.$berkas[$i]['nama_berkas'];

                        if(substr($berkas[$i]['nama_berkas'], -3) == 'jpg' || substr($berkas[$i]['nama_berkas'], -3) == 'png'){    
                    ?>
                       <div class="col-3" style="text-align:center; margin-bottom:20px">
                            <img style="width:100%; margin-bottom:10px; border:solid 1px rgba(0,0,0,0.3)" src="<?= $src?>" alt="">
                            <a href="<?= $src ?>" class="btn btn-sm btn-info w-100" style="font-size:11px" download>Download</a>
                       </div>
                    <?php 
                        } else {?>
                         <div class="col-3" style="text-align:center;">
                            <img style="width:80%; margin-bottom:10px" src="<?= base_url()?>assets/images/sample_pdf.png" alt="">
                            <a href="<?= $src ?>" class="btn btn-sm btn-info w-100" style="font-size:11px" download>Download</a>
                        </div>
                    <?php 
                        }
                    };?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
            <!-- <div class="card" style="position:fixed; width:32%"> -->
                <div class="card-body" style="font-size:12px">
                    <h6 class="card-title">Verifikasi Pensiun</h6>
                    <hr>
                    <?= form_open('pegawai/action_tinjau_pensiun')?>
                        <?= form_hidden('id', $id_pengajuan_pensiun)?>
                        <div class="form-group">
                            <label for="">Nama Pegawai</label>
                            <input type="text" class="form-control form-control-sm" style="height:35px" disabled value="<?= $nama_tanpa_gelar_peg?>">
                        </div>

                        <div class="form-group">
                            <label for="">Nip Pegawai</label>
                            <input type="text" class="form-control form-control-sm" style="height:35px" disabled value="<?= $nip_peg?>">
                        </div>

                        <div class="form-group">
                            <label for="">Status Pengajuan</label>
                            <?php echo form_dropdown('status', array('3' => 'Ditangguhkan', '1' => 'Disetujui', '2' => 'Ditolak'), $status_pengajuan, array('class' => 'form-control form-control-sm')); ?>
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea class="form-control form-control-sm" name="ket" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group row" style="text-align:center">
                            <div class="col-lg-6 col-md-12 col-sm-12 py-2">
                                 <input type="submit" class="btn btn-success w-100" value="Verifikasi">
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 py-2">
                                <a href="<?= base_url()?>pegawai/verifikasi_pensiun" type="button" class="btn btn-secondary w-100">Kembali</a>
                            </div>
                        </div>
                    <?= form_close()?>
                </div>
            </div>
        </div>
    </div>

</div>