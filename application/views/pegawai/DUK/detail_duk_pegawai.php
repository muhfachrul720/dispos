<div class="container-fluid">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h4 class="h3 mb-0 text-gray-800">Detail DUK Pegawai</h4>
    </div>

    <!-- <?php
        if($days = notif_pensiun($birthdate)){
    ?>
        <div class="alert alert-danger">Harap Segera Mengajukan Pensiun. Sisa Waktu untuk mengajukan Pensiun tersisa : <?= $days?> Hari &nbsp <a href="">Ajukan Pensiunan Sekarang</a> </div>
    <?php
        };
    ?> -->

    <div class="card">
        <div class="card-header">
            <a href="<?= base_url('dashboard_p/form_duk')?>" class="btn btn-sm btn-success">Edit</a>
            <a href="<?= base_url('dashboard_p')?>" class="btn btn-sm btn-info">Kembali</a>
        </div>
        <div class="card-body">
            <table class="table">
                <tr>
                    <th colspan="4">Dasar</th>
                </tr>
                <tr>
                    <td width="20%">Username</td>
                    <td>Hello</td>
                    <td width="20%">Email</td>
                    <td>Hello</td>
                </tr>
            </table>
        </div>
    </div>

</div>