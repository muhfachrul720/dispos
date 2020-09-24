<div class="content-header">
  <div class="container-fluid px-4 mt-3">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1 class="m-0 text-dark"><b><?= $title ?></b></h1>
        <p>Pada Menu Ini user dapat mengganti atau mengupdate Profile dirinya masing </p>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-8">
            <?= form_open_multipart('Profile/update_profile')?>

            <div class="card">
                <div class="card-body">
                    <h6 style="font-weight:bold; text-align:center">Data Diri</h6>
                    <hr class="mt-2">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label> <?= form_error('name')?>
                        <input type="text" name="name" class="form-control form-control-sm" placeholder="Silahkan Memasukkan Nama Lengkap" value="<?= $profile->nama_lengkap?>">
                    </div>
                    <div class="form-group">
                        <label for="">Foto Profil</label> 
                        <div><label for="fileUp" class="btn btn-primary btn-sm">Upload Foto</label></div>
                        <input type="file" name="images" style="display:none" id="fileUp" placeholder="Silahkan Memasukkan Nama Lengkap" accept="image/*">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <h6 style="font-weight:bold; text-align:center">Konfirmasi</h6>
                    <hr class="mt-2">
                    <input type="submit" class="btn btn-success btn-sm w-100" value="Ubah Profile">
                </div>
            </div>

            <?= form_close()?>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div style="height:360px; position:relative; overflow:hidden; border:solid 1px rgba(0,0,0,0.2)">
                                <img src="<?= base_url()?>upload/foto_profil/<?= $this->session->userdata('images') ?>" alt="" style="width:330px; position:absolute; left:50%; top:50%; transform:translate(-50%, -50%);">
                            </div>
                        </div>
                        <div class="col-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>