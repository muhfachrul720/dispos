<div class="container-fluid">

    <div class="card mb-4">
        <div class="card-body px-5 py-4" style="font-size:14px">
            <h2>Verifikasi Cuti</h2>
            <p class="m-0">Halaman Untuk Memverifikasi pengajuan Cuti yang diajukan Pegawai</p>
        </div>
    </div>

    <?= form_open('pegawai/action_tinjau_cuti')?>

    <input type="hidden" name="id" value="<?= $id_pengajuan_cuti?>">

        <div class="row mt-3" style="font-size:12px">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <div style="float:right">
                        ANAK LAMPIRAN 1.b <br>
                        PERATURAN BADAN KEPEGAWAIAN NEGARA REPUBLIK INDONESIA <br>
                        NOMOR 24 TAHUN 2017 <br>
                        TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL <br>
                        <br>
                        Kendari, <span style="margin:20px"><?= date('Y-m-h')?></span>
                        <br>
                        <span style="margin-left:20px">Kepada</span> 
                        <br>
                        Yth 
                        <br>
                        <span style="margin-left:20px">di.</span> 
                        <br>
                        <span style="margin-left:40px"><u>Kendari</u></span>
                        </div>

                        <h4 style="margin-top:200px; text-align:center; font-size:16px; font-family:'Times New Roman'; font-weight:100">
                        FORMULIR PERMINTAAN DAN PEMBERIAN CUTI
                        </h4>

                        <!-- Data Pegawai -->
                        <table border="1" class="mt-3">
                            <tr>
                                <th colspan="4">I. <span style="margin-left:20px">DATA PEGAWAI</span></th>
                            </tr>
                            <tr>
                                <td class="px-2">Nama</td>
                                <td>
                                    <input type="text" name="name" value="<?= $nama_tanpa_gelar_peg?>" readonly>
                                    <?php echo form_error('name') ?>
                                </td>
                                <td class="px-2">Nip</td>
                                <td>
                                    <input type="text" name="nip" value="<?= $nip_peg?>" readonly>
                                    <?php echo form_error('nip') ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-2">Jabatan</td>
                                <td><input type="text" name="" value="<?= $nama_kategori_fung?> / <?= $nama_jabatan_struktur ?>" readonly></td></td>
                                <td class="px-2">Masa Kerja</td>
                                <td>
                                    <input type="text" name="maker" value="<?= $thn_masa_kerja_pensiun_peg?>" readonly>
                                    <?php echo form_error('maker') ?>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-2">Unit Kerja</td>
                                <td colspan="3">
                                    <input type="text" name="uker" style="width:100%" value="<?= $program_studi_uker?>" readonly>
                                    <?php echo form_error('uker') ?>
                                </td>
                            </tr>
                        </table>

                        <!-- Jenis Cuti -->
                        <table border="" class="mt-3">
                            <script>
                                $(document).ready(function(){
                                    $("input[type=radio]").each(function(){
                                        var val = $(this).val();

                                        if(<?= $jenis_pengajuan_cuti?> == val){
                                            $(this).prop("checked", true);
                                        }
                                        
                                    });
                                });
                            </script>
                            <tr>
                                <th colspan="4" width="100%">II. <span style="margin-left:20px">JENIS CUTI YANG DIAMBIL **</span></th>
                            </tr>
                            <tr>
                                <td class="px-2">1. Cuti Tahunan</td>
                                <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="2" disabled></td>
                                <td class="px-2">2. Cuti Besar</td>
                                <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="1" disabled></td>
                            </tr>
                            <tr>
                                <td class="px-2">3. Cuti Sakit</td>
                                <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="3" disabled></td>
                                <td class="px-2">4. Cuti Melahirkan</td>
                                <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="4" disabled></td>
                            </tr>
                            <tr>
                                <td class="px-2">5. Cuti Karena Alasan Penting</td>
                                <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="5" disabled></td>
                                <td class="px-2">6. Cuti Di Luar Tanggungan Negara</td>
                                <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="6" disabled></td>
                            </tr>
                        </table>              

                        <!-- Alasan Cuti -->
                        <table border="" class="mt-3">
                            <tr>
                                <th width="100%">III. <span style="margin-left:20px">ALASAN CUTI</span></th>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="alasancuti" id="" cols="30" rows="3" class="w-100" placeholder="Masukkan Alasan....." readonly><?= $alasan_pengajuan_cuti ?></textarea>
                                    <?= form_error('alasancuti')?>
                                </td>
                            </tr>
                        </table>

                        <!-- Lamanya Cuti -->
                        <table border="" class="mt-3">
                            <tr>
                                <th colspan="6" width="100%">IV. <span style="margin-left:20px">LAMANYA CUTI</span></th>
                            </tr>
                            <tr>
                                <td class="px-2">Selama</td>
                                <td>Akan Dihitung Oleh Sistem</td>
                                <td class="px-2">Mulai Tanggal</td>
                                <td>
                                    <input type="date" name="startdate" style="border:none" value="<?= $tgl_cuti ?>" readonly>
                                    <?php echo form_error('startdate') ?>
                                </td>
                                <td class="px-2">S/d</td>
                                <td>
                                    <input type="date" name="enddate" style="border:none" value="<?= $lastday?>" readonly> 
                                    <?php echo form_error('enddate') ?>
                                </td>
                            </tr>
                        </table>

                        <!-- Catatan Cuti -->
                        <table border="" class="mt-3">
                            <tr>
                                <th colspan="5" width="100%">V. <span style="margin-left:20px">CATATAN CUTI ***</span></th>
                            </tr>
                            <tr>
                                <td colspan="3">1. Cuti Tahunan</td>
                                <td>2. Cuti Besar</td>
                                <td><input type="text" name="ket[]" class="w-100"></td>
                            </tr>
                            <tr>
                                <td>Tahun</td>
                                <td>Sisa</td>
                                <td>Keterangan</td>
                                <td>3. Cuti Sakit</td>
                                <td><input type="text" name="ket[]" class="w-100"></td>
                            </tr>
                            <tr>
                                <td>N-2</td>
                                <td><input type="number" min="0" name="kuota_n-2" class="w-100"></td>
                                <td>Hari</td>
                                <td>4. Cuti Melahirkan</td>
                                <td><input type="text" name="ket[]" class="w-100"></td>
                            </tr>
                            <tr>
                                <td>N-1</td>
                                <td><input type="number" min="0" name="kuota_n-1" class="w-100"></td>
                                <td>Hari </td>
                                <td>5. Cuti Karena Alasan Penting</td>
                                <td><input type="text" name="ket[]" class="w-100"></td>
                            </tr>
                            <tr>
                                <td>N</td>
                                <td><input type="number" min="0" name="kuota_n" class="w-100"></td>
                                <td>Hari</td>
                                <td>6. Cuti Diluar Tanggungan Negara</td>
                                <td><input type="text" name="ket[]" class="w-100"></td>
                            </tr>
                        </table>

                        <!-- Alamat Selama Menjalankan -->
                        <table border="" class="mt-3">
                            <tr>
                                <th colspan="3" width="100%">VI. <span style="margin-left:20px">ALAMAT SELAMA MENJALANKAN CUTI</span></th>
                            </tr>
                            <tr style="text-align:center">
                                <td>Alamat Lengkap</td>
                                <td>Telepon</td>
                                <td rowspan="2">
                                    Hormat Saya
                                    <br><br><br><br>
                                    <?= $nama_tanpa_gelar_peg?>
                                    <br>
                                    Nip <?= $nip_peg?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <textarea name="addresscuti" id="" cols="20" rows="5" class="w-100" placeholder="Masukkan Alamat" readonly><?= $alamat_pengajuan_cuti?></textarea>
                                    <?php echo form_error('addresscuti') ?>
                                </td>
                                <td>
                                    <textarea name="phonecuti" id="" cols="20" rows="5" class="w-100" placeholder="Masukkan Telepon" readonly><?= $telepon_pengajuan_cuti ?></textarea>
                                    <?php echo form_error('phonecuti') ?>
                                </td>
                            </tr>
                        </table>

                        <!-- Pertimbangan Atasan -->
                        <table border="" class="mt-3">
                            <tr>
                                <th colspan="4" width="100%">VII. <span style="margin-left:20px">PERTIMBANGAN ATASAN LANGSUNG **</span></th>
                            </tr>
                            <tr style="text-align:center">
                                <td>DISETUJUI</td>
                                <td>PERUBAHAN ****</td>
                                <td>DITANGGUHKAN ****</td>
                                <td>TIDAK DISETUJUI ****</td>
                            </tr>
                            <tr>
                                <td height="20px"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="text-align:center">
                                <td colspan="3" style="border-left:solid 1px white; border-bottom:solid 1px white"></td>
                                <td>
                                    <br><br><br>
                                    (................................)
                                    <br>
                                    NIP : ...................................
                                </td>
                            </tr>
                        </table>

                        <!-- Keputusan Pejabat -->
                        <table border="" class="mt-3">
                            <tr>
                                <th colspan="4" width="100%">VIII. <span style="margin-left:20px">KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **</span></th>
                            </tr>
                            <tr style="text-align:center">
                                <td>DISETUJUI</td>
                                <td>PERUBAHAN ****</td>
                                <td>DITANGGUHKAN ****</td>
                                <td>TIDAK DISETUJUI ****</td>
                            </tr>
                            <tr>
                                <td height="20px"></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="text-align:center">
                                <td colspan="3" style="border-left:solid 1px white; border-bottom:solid 1px white"></td>
                                <td>
                                    <br><br><br>
                                    (................................)
                                    <br>
                                    NIP : ...................................
                                </td>
                            </tr>
                        </table>

                        <div class="desc-bottom">
                            <b>Catatan :</b> <br>
                            * : Coret yang Tidak Perlu <br>
                            ** : Pilih Salah satu dengan memberikan tanda Centang <br>
                            *** : Diisi Oleh Pejabat yang menangani bidang kepegawaian sebelum PNS Mengajukan Cuti <br>
                            **** : Diberi Tanda Centang dan Alasannya <br>
                            N : Cuti tahun berjalan <br>
                            N-1 : Sisa Cuti 1 Tahun sebelumnya <br>
                            N-2 : Sisa Cuti 2 Tahun sebelumnya <br>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body px-5">
                        <div class="row form-group">
                            <label for="">Status Pengajuan :</label>
                            <?php echo form_dropdown('status', array(1 => 'Telah Diperiksa', 2 => 'Ditolak'), '', array('class' => 'form-control form-control-sm')); ?>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 p-0" style="">
                                <input type="submit" value="Verifikasi Cuti" class="btn btn-success mr-2" style="width:50%">
                                <a href="<?= base_url()?>" class="btn btn-secondary" style="width:45.5%">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?= form_close()?>

</div>