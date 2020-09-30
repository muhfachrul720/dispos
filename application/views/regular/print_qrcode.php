<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuata Leon</title>
</head>
<body>

    <small>Dokumen Berkas <?= $no_berkas ?></small>
    <br>

    <hr>

    <section>
        <p>Dibawah Merupakan Detail Dari Berkas</p>
    </section>

    <section>
        <table width="100%">
            <tr>
                <td>No Hak</td>
                <td><?= $no_hak?></td>
            </tr>
            <tr>
                <td>No Berkas</td>
                <td><?= $no_berkas?></td>
            </tr>
            <tr>
                <td>Nama Pemilik</td>
                <td><?= $nama_pemilik?></td>
            </tr>
            <tr>
                <td>Kecamatan</td>
                <td><?= $kecamatan?></td>
            </tr>
            <tr>
                <td>Desa</td>
                <td><?= $desa?></td>
            </tr>
            <tr>
                <td>Jenis Permohonan</td>
                <td><?= $jenis?></td>
            </tr>
            <tr>
                <td>Jenis Hak</td>
                <td><?= $hak?></td>
            </tr>
            <tr>
                <td>Waktu Pengajuan</td>
                <td><?= $waktu?></td>
            </tr>
            <tr>
                <td>Jatuh Tempo</td>
                <td><?= $jatuh_tempo?></td>
            </tr>
        </table>
    </section>

    <!-- <section>
        <p>No Hak : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:400px"><?= $no_hak?></span></p>
        <p>No Berkas : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:400px"><?= $no_berkas?></span></p>
        <p>Nama Pemilik : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:400px"><?= $nama_pemilik?></span></p>
        <p>Kecamatan : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:400px"><?= $kecamatan?></span></p>
        <p>Desa : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:400px"><?= $nama?></span></p>
        <p>Jenis Permohonan : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:400px"><?= $jenis?></span></p>
        <p>Jenis Hak : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:400px"><?= $hak?></span></p>
        <p>Waktu Pengajuan : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:400px"><?= $waktu?></span></p>
        <p>Jatuh Tempo : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="margin-left:400px"><?= $jatuh_tempo?></span></p>
    </section> -->

    <br>
    <hr>
    
    <p>QR Code : </p>
    <img src="<?= base_url() ?>/upload/qrcode/<?= $no_berkas ?>.png" alt="">

</body>
</html>