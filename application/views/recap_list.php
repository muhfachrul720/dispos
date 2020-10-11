<div class="content-header">
  <div class="container-fluid px-4">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark"><b><?= 'Hasil Rekap Pengajuan' ?></b></h1>
        <p>Data Berikut Merupakan Rekap Pengajuan, Yang telah diajukan Sebelumnya</p>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<?= form_open('riwayat/recap_pengajuan')?>

<div class="container-fluid px-4">
    <div class="row">
      <div class="col-xl-12 stretch-card grid-margin">
        <div class="card shadow mb-4">
          <div class="card-body">
            <div style="margin-bottom: 15px; text-align:right">
                <small style="float:left">Hasil Rekap Pengajuan Tahun : <?= $tahun ?></small>
                <label for="">Tahun :</label>
                <!-- <input type="text" name="tahun" style="border-radius:5px; border:solid 1px gray; margin-left:20px; font-size:12px; padding:5px"> -->
                <select name="tahun" id="">
                  <?php
                    for( $i = date("Y"); $i >= date("Y")-5; $i-- )
                    {
                      ?>
                      <option <?= $i == $tahun ? "selected" : ""  ?> value="<?= $i?>"><?= $i?></option>
                      <?php
                    }
                  ?>
                </select>
                <input type="submit" value="Tampilkan" class="btn btn-sm btn-primary">
            </div>
            <table class="table table-striped table-bordered table-sm text-center" style="width:100%; font-size:12px" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Bulan</th>
                        <th>Total Pengajuan</th>
                        <th>Pengajuan Proses</th>
                        <th>Pengajuan Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($recap as $r){ ?>
                        <tr>
                            <td><?= $r['Bulan']?></td>
                            <td><?= $r['Total']?></td>
                            <td><?= $r['Proses']?></td>
                            <td><?= $r['Selesai']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

          </div>
        </div>
    </div>
</div>
<?= form_close()?>