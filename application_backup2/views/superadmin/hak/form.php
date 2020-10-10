
<div class="content-header">
  <div class="container-fluid px-4">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid px-4">
    <?= form_open($action)?>
    <?= form_hidden('id', $id) ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p><small>Form Untuk Menambahkan Jenis Hak</small></p>
                    
                    <div class="form-group row">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Jenis Hak</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm mt-1" required id="inputPassword3" placeholder="Masukkan Jenis Hak ... " name="name" value="<?= $nama ?>">
                        <small><?php echo form_error('name') ?></small>
                        </div>
                    </div>

                </div>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </div>
    <?= form_close()?>
</div>