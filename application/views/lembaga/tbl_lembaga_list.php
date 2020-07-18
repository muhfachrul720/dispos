<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

<div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Kelola Data Lembaga</h6>
  </div>
  <div class="card-body">
      <div class="card-header">
        <div class="card-header">
          <?php echo anchor(site_url('lembaga/create'), '<i class="fa fa-wp-forms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?>
          <?php echo anchor(site_url('lembaga/excel'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-success btn-sm"'); ?>
      </div>
  </div>
  <hr>

<div class="float-right">
    <form action="<?php echo site_url('lembaga/index'); ?>" class="form-inline" method="get">
        <div class="input-group">
            <input type="text" class="form-control" name="q" value="<?php echo $q; ?>">
            <span class="input-group-btn">
                <?php 
                if ($q <> '')
                {
                    ?>
                    <a href="<?php echo site_url('lembaga'); ?>" class="btn btn-default">Reset</a>
                    <?php
                }
                ?>
                <button class="btn btn-primary" type="submit">Search</button>
            </span>
        </div>
    </form>
</div>

<div class="row" style="margin-bottom: 10px">
    <div class="col-md-4 text-center">
        <div style="margin-top: 8px" id="message">
            <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
        </div>
    </div>
</div>

<div class="table-responsive">

    <table id="example" class="table table-striped table-bordered table-sm text-center" style="width:100%">
        <tr>
            <th>No</th>
            <th>Nama Lembaga</th>
            <th>Keterangan</th>
            <th>Action</th>
            </tr><?php
            foreach ($lembaga_data as $lembaga)
            {
                ?>
                <tr>
                   <td width="10px"><?php echo ++$start ?></td>
                   <td><?php echo $lembaga->nama_lembaga ?></td>
                   <td><?php echo $lembaga->keterangan ?></td>
                   <td style="text-align:center" width="200px">
                    <?php 
                   
                    echo anchor(site_url('lembaga/update/'.$lembaga->id_lembaga),'<i class="far fa-edit" aria-hidden="true"></i>','class="btn btn-warning btn-sm"'); 
                    echo '  '; 
                    echo anchor(site_url('lembaga/delete/'.$lembaga->id_lembaga),'<i class="far fa-trash-alt" aria-hidden="true"></i>','class="btn btn-danger btn-sm" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6 text-right">
            <?php echo $pagination ?>
        </div>
    </div>
</div>
</div>
</div>

<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
                   