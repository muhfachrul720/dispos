 <!-- Begin Page Content -->
 <div class="col-12">

  <!-- Page Heading -->
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Kelola Menu</h6>
    </div>
    <div class="card-body">
     <div class="card-header">
      <div class="card-header">
        <?php echo anchor(site_url('Kelolamenu/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
        <?php echo anchor(site_url('Kelolamenu/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
        
      </div>
    </div>

    <hr>

    <div class="table-responsive">

      <table class="table table-sm table-bordered table-hover" id="mytable" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
           <th width="30px">No</th>
           <th>Title</th>
           <th>Url</th>
           <th>Icon</th>
           <th>Is Main Menu</th>
           <th>Is Aktif</th>
           <th width="100px">Action</th>
         </tr>
       </thead>
     </table>
   </div>
 </div>
</div>

</div>
<!-- /.container-fluid -->

<!-- Bootstrap core JavaScript-->

<script src="<?php echo base_url(); ?>assets/assets-sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/assets-sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/assets-sbadmin/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>assets/assets-sbadmin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets-sbadmin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>assets/assets-sbadmin/js/demo/datatables-demo.js"></script>

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

    var t = $("#mytable").dataTable({
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
      ajax: {"url": "kelolamenu/json", "type": "POST"},
      columns: [
      {
        "data": "id_menu",
        "orderable": false
      },{"data": "title"},{"data": "url"},{"data": "icon"},{"data": "is_main_menu"},{"data": "is_aktif"},
      {
        "data" : "action",
        "orderable": false,
        "className" : "text-center"
      }
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