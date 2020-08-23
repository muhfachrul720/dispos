<div class="container-fluid">

    <?php if($this->session->flashdata('msg') == 1){?>
        <div class="alert alert-success" role="alert">
            Pengajuan Anda Berhasil Dikirim Silahkan Menunggu Verifikasi Dari Admin
        </div>
    <?php } else if($this->session->flashdata('msg') == 2) {?>
        <div class="alert alert-danger" role="alert">
            Pengajuan Anda Gagal Terkirim Silahkan Melakukan Pengajuan Ulang dan pastikan semua data telah terisi dengan benar
        </div>
    <?php };?>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Form Ajukan Cuti</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Monitoring</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active mb-4" style="font-size:12px" id="home" role="tabpanel" aria-labelledby="home-tab">

            <div class="card border border-top-0">
                <div class="card-body px-5 pt-5 pb-4">
                    <h2>Form Ajukan Cuti</h2>
                    <p>Silahkan Mengisi Form dengan lengkap dengan data yang benar <br> Keterangan N = Tahun Ini , N-1 = Tahun Sebelumnya, dan N-2 = 2 Tahun Sebelumnya</p>
                </div>
            </div>

            <?= form_open('dashboard_p/create_ajuan_cuti')?>

            <div class="row mt-3">
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
                                        <input type="text" name="name" value="<?= $nama_tanpa_gelar_peg?>" style="background-color: #b2bec3" readonly>
                                        <?php echo form_error('name') ?>
                                    </td>
                                    <td class="px-2">Nip</td>
                                    <td>
                                        <input type="text" name="nip" value="<?= $nip_peg?>" style="background-color: #b2bec3" readonly>
                                        <?php echo form_error('nip') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2">Jabatan</td>
                                    <td><input type="text" name="" value="<?= $nama_kategori_fung?> / <?= $nama_jabatan_struktur ?>" style="background-color: #b2bec3" readonly></td>
                                    <td class="px-2">Masa Kerja</td>
                                    <td>
                                        <input type="text" name="maker" value="<?= $thn_masa_kerja_pensiun_peg?>" style="background-color: #b2bec3" readonly>
                                        <?php echo form_error('maker') ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-2">Unit Kerja</td>
                                    <td colspan="3">
                                        <input type="text" name="uker" style="width:100%; background-color:#b2bec3" value="<?= $program_studi_uker?>" readonly>
                                        <?php echo form_error('uker') ?>
                                    </td>
                                </tr>
                            </table>

                            <!-- Jenis Cuti -->
                            <table border="" class="mt-3">
                                <tr>
                                    <th colspan="4" width="100%">II. <span style="margin-left:20px">JENIS CUTI YANG DIAMBIL **</span></th>
                                </tr>
                                <tr>
                                    <td class="px-2">1. Cuti Tahunan</td>
                                    <td style="text-align:center;"><input type="radio" name="jeniscuti" id="" class="mt-1" value="2"></td>
                                    <td class="px-2">2. Cuti Besar</td>
                                    <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="1"></td>
                                </tr>
                                <tr>
                                    <td class="px-2">3. Cuti Sakit</td>
                                    <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="3"></td>
                                    <td class="px-2">4. Cuti Melahirkan</td>
                                    <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="4"></td>
                                </tr>
                                <tr>
                                    <td class="px-2">5. Cuti Karena Alasan Penting</td>
                                    <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="5"></td>
                                    <td class="px-2">6. Cuti Di Luar Tanggungan Negara</td>
                                    <td style="text-align:center"><input type="radio" name="jeniscuti" id="" class="mt-1" value="6"></td>
                                </tr>
                            </table>              

                            <!-- Alasan Cuti -->
                            <table border="" class="mt-3">
                                <tr>
                                    <th width="100%">III. <span style="margin-left:20px">ALASAN CUTI</span></th>
                                </tr>
                                <tr>
                                    <td>
                                        <textarea name="alasancuti" id="" cols="30" rows="3" class="w-100" style="border:solid 2px #bef202; padding:5px" placeholder="Masukkan Alasan....."></textarea>
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
                                    <td style="overflow:hidden">
                                        <input type="date" name="startdate" style="border:solid 2px #bef202; padding:6px 0px">
                                        <?php echo form_error('startdate') ?>
                                    </td>
                                    <td class="px-2">S/d</td>
                                    <td style="overflow:hidden">
                                        <input type="date" name="enddate" style="border:solid 2px #bef202; padding:6px 0px">
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
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tahun</td>
                                    <td>Sisa</td>
                                    <td>Keterangan</td>
                                    <td>3. Cuti Sakit</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>N-2</td>
                                    <td></td>
                                    <td></td>
                                    <td>4. Cuti Melahirkan</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>N-1</td>
                                    <td></td>
                                    <td></td>
                                    <td>5. Cuti Karena Alasan Penting</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>N</td>
                                    <td></td>
                                    <td></td>
                                    <td>6. Cuti Diluar Tanggungan Negara</td>
                                    <td></td>
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
                                        <textarea name="addresscuti" id="" cols="20" rows="5" style="border:solid 2px #bef202; padding:5px" class="w-100" placeholder="Masukkan Alamat"></textarea>
                                        <?php echo form_error('addresscuti') ?>
                                    </td>
                                    <td>
                                        <textarea name="phonecuti" id="" cols="20" rows="5"  style="border:solid 2px #bef202; padding:5px" class="w-100" placeholder="Masukkan Telepon"></textarea>
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
                        <div class="card-body">
                            <div style="text-align:center">
                                <p>Dengan Ini Saya Mengajukan Cuti</p>
                                <input type="submit" value="Ajukan Cuti" class="btn btn-success mr-2 w-50">
                                <a href="<?= base_url()?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?= form_close()?>

        </div>

        <div class="tab-pane fade border border-top-0 p-5" style="background-color:white; font-size:14px" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <div class="header mb-3">
                <h3 class="mb-2">Monitoring Pengajuan </h3>
                <p>Melihat Pengajuan Pengajuan yang telah diajukan bersama keterangan apabila di tolak</p>
            </div>
            <hr>
            <div class="body">
                <div class="table-responsive">
                <table id="example" style="font-size:12px; width:100%" class="table table-striped table-bordered table-sm text-center" style="width:100%">
                    <thead>
                    <tr>
                        <th width="40px">No</th>
                        <th>Waktu</th>
                        <th>Keterangan</th>
                        <th>Diverifikasi Oleh</th>
                        <th>Status</th>
                        <th>Download</th>
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
                            ajax: {"url": '<?= base_url()?>dashboard_p/json_cuti_individual', "type": "POST", data : {'id' : <?= $this->session->userdata('id_pegawai')?>}},
                            columns: [
                                {"data" : 'waktu_pengajuan_cuti', orderable:false},
                                {"data" : 'waktu_pengajuan_cuti'},
                                {"data" : 'keterangan_pengajuan_cuti'},
                                {"data" : 'username'},
                                {
                                    "data" : 'status_cuti',
                                    "render" : function(data, type, row){
                                        if(data == 1){
                                            return '<span style="font-size:12px" class="badge badge-success">Telah Diperiksa</span>';
                                        }else if(data == 2) {
                                            return '<span style="font-size:12px" class="badge badge-danger">Ditolak</span>';
                                        }else {
                                            return '<span style="font-size:12px" class="badge badge-primary">Submit Pengajuan</span>';
                                        };
                                    }
                                },
                                {
                                    "data" : 'report_pengajuan_cuti',
                                    "render" : function(data, type, row){
                                        if(data != null ){
                                            return '<a href="<?= base_url()?>upload/report_cuti/'+data+'" style="font-size:12px" class="btn btn-sm btn-info">Download Persetujuan</a>';
                                        }else {
                                            return '';
                                        };
                                    }
                                },
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
        </div>
    </div>

</div>
