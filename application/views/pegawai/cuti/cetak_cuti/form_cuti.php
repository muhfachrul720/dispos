<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pengajuan Cuti <?= $nama_tanpa_gelar_peg ?></title>
</head>
<style>
    *{
        margin:0px;
    }
    body {
        font-size:10px;
    }

    td {
        padding: 3px 3px;
    }
</style>
<body>
    <script>
        function myFunction() {
            window.print();
        }
    </script>

    <div style="margin-left:383px; padding-top:0">
    ANAK LAMPIRAN 1.b <br>
    PERATURAN BADAN KEPEGAWAIAN NEGARA REPUBLIK INDONESIA <br>
    NOMOR 24 TAHUN 2017 <br>
    TENTANG TATA CARA PEMBERIAN CUTI PEGAWAI NEGERI SIPIL <br>
    <br>
    Kendari, &nbsp;&nbsp;&nbsp;&nbsp; <?= date('Y-m-h')?>
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp; Kepada 
    <br>
    Yth 
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp; di. 
    <br>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<u>Kendari</u>
    </div>

    <h4 style="text-align:center; font-size:12px; font-family:'Times New Roman'; font-weight:100">
        FORMULIR PERMINTAAN DAN PEMBERIAN CUTI
    </h4>

    <!-- Data Pegawai -->
    <table border="1" style="border-collapse:collapse; font-size:10px; margin-bottom:12px" width="100%">
        <tr>
            <td colspan="4" style="font-weight:bold">I. &nbsp;&nbsp;&nbsp;DATA PEGAWAI</td>
        </tr>
        <tr>
            <td width="20%">Nama</td>
            <td width="30%">
                <?= $nama_tanpa_gelar_peg ?>
            </td>
            <td>Nip</td>
            <td>
                <?= $nip_peg ?>
            </td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>
                <?= $nama_kategori_fung ?> / <?= $nama_jabatan_struktur?>
            </td>
            <td>Masa Kerja</td>
            <td>
                <?= $thn_masa_kerja_pensiun_peg?>
            </td>
        </tr>
        <tr>
            <td class="px-2">Unit Kerja</td>
            <td colspan="3">
               <?= $program_studi_uker ?>
            </td>
        </tr>
    </table>

    <!-- Jenis Cuti -->
    <table border="1" style="border-collapse:collapse; font-size:10px; margin-bottom:12px" width="100%">
        <tr>
            <td colspan="4" width="100%" style="font-weight:bold">II. &nbsp;&nbsp;&nbsp;JENIS CUTI YANG DIAMBIL **</td>
        </tr>
        <tr>
            <td width="30%">1. Cuti Tahunan</td>
            <td style="text-align:center; font-weight:bold;"><?= $jenis[2]?></td>
            <td width="30%">2. Cuti Besar</td>
            <td style="text-align:center; font-weight:bold;"><?= $jenis[1]?></td>
        </tr>
        <tr>
            <td>3. Cuti Sakit</td>
            <td style="text-align:center; font-weight:bold;"><?= $jenis[3]?></td>
            <td>4. Cuti Melahirkan</td>
            <td style="text-align:center; font-weight:bold;"><?= $jenis[4]?></td>
        </tr>
        <tr>
            <td>5. Cuti Karena Alasan Penting</td>
            <td style="text-align:center; font-weight:bold;"><?= $jenis[5]?></td>
            <td>6. Cuti Di Luar Tanggungan Negara</td>
            <td style="text-align:center; font-weight:bold;"><?= $jenis[6]?></td>
        </tr>
    </table>     

    <!-- Alasan -->
    <table border="1" style="border-collapse:collapse; font-size:10px; margin-bottom:12px" width="100%">
        <tr>
            <td colspan="4" width="100%" style="font-weight:bold">III. &nbsp;&nbsp;&nbsp;ALASAN CUTI</td> 
        </tr>
        <tr>
            <td style="height:30px">
               <?= $alasan_pengajuan_cuti ?>
            </td>
        </tr>
    </table>

    <!-- Lamanya Cuti -->
    <table border="1" style="border-collapse:collapse; font-size:10px; margin-bottom:12px" width="100%">
        <tr>
            <td colspan="6" width="100%" style="font-weight:bold">IV. &nbsp;&nbsp;&nbsp;LAMANYA CUTI</td> 
        </tr>
        <tr>
            <td>Selama</td>
            <td><?= $jml_hari_cuti ?>&nbsp; Hari</td>
            <td>Mulai Tanggal</td>
            <td>
                <?= $tgl_cuti ?>
            </td>
            <td>S/d</td>
            <td>
                <?= $lastday ?>
            </td>
        </tr>
    </table>

    <!-- Catatan Cuti -->
    <table border="1" style="border-collapse:collapse; font-size:10px; margin-bottom:12px" width="100%">
        <tr>
            <td colspan="6" width="100%" style="font-weight:bold">V. &nbsp;&nbsp;&nbsp;CATATAN CUTI</td> 
        </tr>
        <tr>
            <td colspan="3" width="20%">1. Cuti Tahunan</td>
            <td width="30%">2. Cuti Besar</td>
            <td width="30%"><?= $ket['cutibesar']?></td>
        </tr>
        <tr>
            <td width="10%">Tahun</td>
            <td>Sisa</td>
            <td width="15%">Keterangan</td>
            <td>3. Cuti Sakit</td>
            <td><?= $ket['cutisakit']?></td>
        </tr>
        <tr>
            <td>N-2</td>
            <td><?= $Kuota_cuti_thn_2?></td>
            <td>Hari</td>
            <td>4. Cuti Melahirkan</td>
            <td><?= $ket['cutimelahirkan']?></td>
        </tr>
        <tr>
            <td>N-1</td>
            <td><?= $Kuota_cuti_thn_1?></td>
            <td>Hari </td>
            <td>5. Cuti Karena Alasan Penting</td>
            <td><?= $ket['cutialasan']?></td>
        </tr>
        <tr>
            <td>N</td>
            <td><?= $Kuota_cuti_thn_n?></td>
            <td>Hari</td>
            <td>6. Cuti Diluar Tanggungan Negara</td>
            <td><?= $ket['cutinegara']?></td>
        </tr>
    </table>

    <!-- Alamat Selama Menjalankan Cuti -->
    <table border="1" style="border-collapse:collapse; font-size:9px; margin-bottom:12px" width="100%">
        <tr>
            <td colspan="6" width="100%" style="font-weight:bold">VI. &nbsp;&nbsp;&nbsp;ALAMAT SELAMA MENJALANKAN CUTI</td> 
        </tr>
        <tr>
            <td style="text-align:center" width="40%">Alamat Lengkap</td>
            <td style="text-align:center" width="20%">Telepon</td>
            <td rowspan="2" style="text-align:center; font-size:9px">
                Hormat Saya
                <br><br><br>
                <?= $nama_tanpa_gelar_peg?>
                <br>
                Nip <?= $nip_peg?>
            </td>
        </tr>
        <tr>
            <td>
               <?= $alamat_pengajuan_cuti?>
            </td>
            <td style="text-align:center">
                <?= $telepon_pengajuan_cuti?>
            </td>
        </tr>
    </table>

    <!-- Pertimbangan -->
    <table border="1" style="border-collapse:collapse; font-size:10px; margin-bottom:12px" width="100%">
        <tr>
            <td colspan="6" width="100%" style="font-weight:bold">VII. &nbsp;&nbsp;&nbsp; PERTIMBANGAN ATASAN LANGSUNG ***</td> 
        </tr>
        <tr>
            <td style="text-align:center" width="20%">DISETUJUI</td>
            <td style="text-align:center" width="20%">PERUBAHAN ****</td>
            <td style="text-align:center" width="20%">DITANGGUHKAN ****</td>
            <td style="text-align:center" width="40%">TIDAK DISETUJUI ****</td>
        </tr>
        <tr>
            <td height="12px"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="text-align:center">
            <td colspan="3" style="border-left:solid 1px white; border-bottom:solid 1px white"></td>
            <td style="text-align:center">
                <br><br>
                (................................)
                <br>
                NIP : ...................................
            </td>
        </tr>
    </table>

    <!-- Keputusan -->
    <table border="1" style="border-collapse:collapse; font-size:10px; margin-bottom:12px" width="100%">
        <tr>
            <td colspan="6" width="100%" style="font-weight:bold">VIII. &nbsp;&nbsp;&nbsp; KEPUTUSAN PEJABAT YANG BERWENANG MEMBERIKAN CUTI **</td> 
        </tr>
        <tr>
            <td style="text-align:center" width="20%">DISETUJUI</td>
            <td style="text-align:center" width="20%">PERUBAHAN ****</td>
            <td style="text-align:center" width="20%">DITANGGUHKAN ****</td>
            <td style="text-align:center" width="40%">TIDAK DISETUJUI ****</td>
        </tr>
        <tr>
            <td height="12px"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr style="text-align:center">
            <td colspan="3" style="border-left:solid 1px white; border-bottom:solid 1px white"></td>
            <td style="text-align:center">
                <br><br>
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

</body>
</html>