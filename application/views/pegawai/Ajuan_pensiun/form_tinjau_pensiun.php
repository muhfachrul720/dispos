<!-- <?php // echo($berkas[0]['id_berkas']); die;?> -->
<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-body py-2">
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <?php 
                                    $src = base_url().'upload/berkas_pensiun/pegawai_'.$id_pegawai.'tgl_'.substr(str_replace(':','_',$waktu_pengajuan_pensiun), 2).'/'; 
                                ?> 
                                <thead>
                                <tr>
                                    <th width="10%">Icon</th>
                                    <th width="60%">Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Surat Pimpinan Unit Kerja</td>
                                        <?php if($berkas['surat_pimpinan_uker'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['surat_pimpinan_uker'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Surat Permohonan PNS Yang Bersangkutan</td>
                                        <?php if($berkas['surat_permohonan_pns'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['surat_permohonan_pns'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">DPCP (Daftar Perorangan Calon Penerima Pensiun</td>
                                        <?php if($berkas['dpcp'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['dpcp'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">SK CPNS - SK Pangkat Terakhir</td>
                                        <?php if($berkas['skcpns_skpangkat_akhir'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['skcpns_skpangkat_akhir'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">SK Jabatan (Fungsional / Struktural) (Legalisir)</td>
                                        <?php if($berkas['sk_jabatan'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['sk_jabatan'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Kartu Pegawai / KPE (Legalisir)</td>
                                        <?php if($berkas['karpeg'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['karpeg'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Akta / Surat Nikah / Cerai (Legalisir)</td>
                                        <?php if($berkas['surat_nikah_cerai'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['surat_nikah_cerai'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Akta / Surat Kenal Lahir Anak < 25 tahun (Legalisir)</td>
                                        <?php if($berkas['surat_kenal_anak'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['surat_kenal_anak'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>
                                    
                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Kartu Keluarga / Daftar Susunan Keluarga Yang Disahkan</td>
                                        <?php if($berkas['kartu_keluarga'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['kartu_keluarga'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Pas Foto Berwarna 3 x 4 </td>
                                        <?php if($berkas['pas_foto'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['pas_foto'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Formulir Permintaan Pembayaran Pensiun (SP4)</td>
                                        <?php if($berkas['formulir_permintaan_pembayaran_pensiun'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['formulir_permintaan_pembayaran_pensiun'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Foto Kopi Buku Rekening</td>
                                        <?php if($berkas['foto_kopi_buku_rekening'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['foto_kopi_buku_rekening'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Penilaian Prestasi 1 tahun Terakhir (Legalisir)</td>
                                        <?php if($berkas['penilaian_prestasi'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['penilaian_prestasi'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Surat Pernyataan Tidak Pernah Dijatuhi Hukuman Disiplin Tingkat Sedang / Besar tahun terakhir</td>
                                        <?php if($berkas['surat_pernyataan_tidak_dijatuhi_hukum'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['surat_pernyataan_tidak_dijatuhi_hukum'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-all">Surat Pernyataan Tidak Sedang Menjalani Proses Pidana Atau Pernah Dipidana Penjara Berdasarkan Putusan Pengadilan Yang telah Berkekuatan Hukum</td>
                                        <?php if($berkas['surat_pernyataan_tidak_dijatuhi_hukum'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['surat_pernyataan_tidak_dijatuhi_hukum'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Akta / Surat Kematian</td>
                                        <?php if($berkas['surat_kematian'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['surat_kematian'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Surat Keterangan Janda / Duda / Anak / Orang Tua</td>
                                        <?php if($berkas['surat_keterangan_janda_duda_anak_orangtua'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['surat_keterangan_janda_duda_anak_orangtua'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                    <tr>
                                        <td><i class="mdi mdi-file"></i></td>
                                        <td style="word-wrap:break-word">Surat Ahli Waris Yang Sah</td>
                                        <?php if($berkas['surat_ahli_waris'] == '') {?>
                                            <td><small>File Belum Diupload</small></td>
                                        <?php } else {?>
                                            <td>
                                                <a href="<?= $src.$berkas['surat_ahli_waris'] ?>" class="btn btn-sm btn-info" style="font-size:12px">Lihat File</a>
                                                <a href="" class="btn btn-sm btn-info" style="font-size:12px" download>Download</a>
                                            </td>
                                        <?php }?>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
            <!-- <div class="card" style="position:fixed; width:32%"> -->
                <div class="card-body" style="font-size:12px">
                    <h6 class="card-title">Verifikasi Pensiun</h6>
                    <hr>
                    <?= form_open_multipart('pegawai/action_tinjau_pensiun')?>
                        <?= form_hidden('id', $id_pengajuan_pensiun)?>
                        <?= form_hidden('idpeg', $id_pegawai)?>
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
                            <?php echo form_dropdown('status', array('3' => 'Perlu Dikoreksi', '1' => 'Disetujui', '2' => 'Ditolak'), $status_pengajuan, array('class' => 'form-control form-control-sm')); ?>
                        </div>

                        <div class="form-group">
                            <label for="">Keterangan</label>
                            <textarea class="form-control form-control-sm" name="ket" id="" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="">Laporan</label><br>
                            <input class="" type="file" name="report">
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