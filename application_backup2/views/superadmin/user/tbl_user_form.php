
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
    <?= form_open_multipart($action)?>
    <?= form_hidden('id_users', $id_users)?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm mt-1" required id="inputEmail3" placeholder="Username" name="username" value="<?= $username ?>">
                      <small><?php echo form_error('username') ?></small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control form-control-sm mt-1" id="inputPassword3" placeholder="Password" name="password" value="">
                      <small><?php echo form_error('password') ?></small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control form-control-sm mt-1" required id="inputPassword3" placeholder="Email" name="email" value="<?= $email?>">
                      <small><?php echo form_error('email') ?></small>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Hak Akses</label>
                    <div class="col-sm-10">
                        <?php echo cmb_dinamis('id_user_level', 'tbl_user_level', 'name', 'id', $level,'DESC') ?>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Foto Profil</label>
                    <div class="col-sm-10">
                        <input type="file" name="images">
                    </div>
                  </div>
                </div>
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </div>
    <?= form_close()?>
</div>