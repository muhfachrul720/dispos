<div class="content-header">
  <div class="container-fluid px-4">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
        <p>Data Berikut Merupakan Riwayat Perjalanan Permohonan</p>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="container-fluid px-4">
    <div class="row">
      <div class="col-xl-12 stretch-card grid-margin">
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="" class="btn btn-success btn-sm"> <i class="fas fa-sync"></i>  &nbsp; Refresh Halaman</a>
            <!-- Alert -->
            <!-- end Alert -->
          </div>
        </div>
      </div>
      <div class="col-xl-12 stretch-card grid-margin">
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-sm text-center" style="width:100%; font-size:12px" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Nama Pemohon</th>
                          <th>Tahun</th>
                          <th>Tanggal</th>
                          <th>Jatuh Tempo</th>
                          <th>Posisi Terakhir</th>
                          <th>Status</th>
                          <th>Detail</th>
                      </tr>
                  </thead>

                  <tbody>
                      <?php $no = 1;
                      foreach ($riwayat as $key => $val) { ?>
                          <tr>
                              <td><?= $no ?></td>
                              <td><?= $val['nama_pemilik']?></td>
                              <td><?= $val['tahun']?></td>
                              <td><?= $val['rwaktu']?></td>
                              <td><?= $val['jatuh_tempo']?></td>
                              <td><?= $val['posisi_akhir']?></td>
                              <td><?= generate_status($val['rwaktu'], $val['jatuh_tempo']) ?></td>
                              <td><a href="<?= base_url()?>riwayat/detail_pengajuan/<?= $val['id']?>" class="btn btn-primary btn-sm">Detail</a></td>
                          </tr>
                      <?php $no++;
                      } ?>
                  </tbody>
                </table>
            </div>
          </div>
      </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>
        
<!-- <script type="text/javascript">
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
            ajax: {"url": "<?= base_url()?>riwayat/riwayat_json", "type": "POST"},
            columns: [
                {"data": "rwid"},
                {"data": "nama_lengkap"},
                {"data": "tahun"},
                {"data": "rwaktu"},
                {"data": "jatuh_tempo"},
                {"data": "posisi_akhir"},
                {
                    "data": "rwaktu",
                    "render" : function(data, type, row){
                    return '<a href="<?= base_url()?>riwayat/detail_pengajuan/'+data+'" class="btn btn-primary btn-sm">Detail</a>';
                  }
                },
                {
                    "data": "id",
                    "render" : function(data, type, row){
                    return '<a href="<?= base_url()?>riwayat/detail_pengajuan/'+data+'" class="btn btn-primary btn-sm">Detail</a>';
                  }
                },
            ],
            order: [[0, 'desc']],
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
</script> -->
</div>

